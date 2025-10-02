<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Services\FirebaseService;
use Illuminate\Support\Str;

class MigrateToFirebase extends Command
{
    protected $signature = 'firebase:migrate {--force : Force migration without confirmation}';
    protected $description = 'Migrate data from SQL database to Firebase';

    protected $firebase;

    public function handle()
    {
        $this->firebase = app(FirebaseService::class);

        $this->info('=================================');
        $this->info('  MIGRATE DATA TO FIREBASE');
        $this->info('=================================');
        $this->newLine();

        if (!$this->option('force')) {
            if (!$this->confirm('This will migrate all data from SQL to Firebase. Continue?')) {
                $this->info('Migration cancelled.');
                return 0;
            }
        }

        try {
            // Migrate Users
            $this->migrateUsers();

            $this->newLine();
            $this->info('✓ Migration completed successfully!');
            return 0;

        } catch (\Exception $e) {
            $this->error('✗ Migration failed!');
            $this->error('Error: ' . $e->getMessage());
            return 1;
        }
    }

    protected function migrateUsers()
    {
        $this->info('Migrating users...');

        // Get all users from SQL database
        $users = DB::table('users')->get();

        if ($users->isEmpty()) {
            $this->warn('No users found in SQL database.');
            return;
        }

        $this->info('Found ' . $users->count() . ' users to migrate.');

        $bar = $this->output->createProgressBar($users->count());
        $bar->start();

        $migrated = 0;
        $skipped = 0;

        foreach ($users as $user) {
            try {
                // Check if user already exists in Firebase
                $existingUser = $this->firebase->get('users', $user->uuid);

                if ($existingUser) {
                    $skipped++;
                    $bar->advance();
                    continue;
                }

                // Prepare user data
                $userData = [
                    'uuid' => $user->uuid,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'role' => $user->role ?? 'partisipant',
                    'created_at' => $user->created_at ?? now()->toDateTimeString(),
                    'updated_at' => $user->updated_at ?? now()->toDateTimeString(),
                ];

                // Add optional fields if they exist
                if (isset($user->profile_photo_path)) {
                    $userData['profile_photo_path'] = $user->profile_photo_path;
                }
                if (isset($user->abstract_path)) {
                    $userData['abstract_path'] = $user->abstract_path;
                }
                if (isset($user->fullpaper_path)) {
                    $userData['fullpaper_path'] = $user->fullpaper_path;
                }
                if (isset($user->remember_token)) {
                    $userData['remember_token'] = $user->remember_token;
                }

                // Create user in Firebase
                $this->firebase->create('users', $userData, $user->uuid);

                $migrated++;
                $bar->advance();

            } catch (\Exception $e) {
                $this->newLine();
                $this->error('Failed to migrate user: ' . $user->email);
                $this->error('Error: ' . $e->getMessage());
                $bar->advance();
            }
        }

        $bar->finish();
        $this->newLine(2);

        $this->info("✓ Migrated: $migrated users");
        if ($skipped > 0) {
            $this->warn("⊘ Skipped: $skipped users (already exist)");
        }
    }
}