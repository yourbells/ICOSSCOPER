<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FirebaseService;
use App\Models\User;

class TestFirebase extends Command
{
    protected $signature = 'firebase:test';
    protected $description = 'Test Firebase connection and operations';

    public function handle()
    {
        $this->info('Testing Firebase Connection...');
        $this->newLine();

        try {
            $firebase = app(FirebaseService::class);
            
            // Test 1: Firestore Connection
            $this->info('1. Testing Firestore connection...');
            $db = $firebase->firestore();
            $this->info('✓ Firestore connected successfully!');
            $this->newLine();

            // Test 2: Get all users
            $this->info('2. Testing get all users...');
            $users = User::all();
            $this->info('✓ Found ' . $users->count() . ' users');
            $this->newLine();

            // Test 3: Display users
            if ($users->count() > 0) {
                $this->info('Users list:');
                $this->table(
                    ['UUID', 'Name', 'Email', 'Role'],
                    $users->map(function($user) {
                        return [
                            substr($user->uuid, 0, 8) . '...',
                            $user->name,
                            $user->email,
                            $user->role
                        ];
                    })->toArray()
                );
                $this->newLine();
            }

            // Test 4: Firebase Storage
            $this->info('3. Testing Firebase Storage connection...');
            $storage = $firebase->storage();
            $bucket = $storage->getBucket();
            $this->info('✓ Storage connected successfully!');
            $this->info('   Bucket: ' . $bucket->name());
            $this->newLine();

            $this->info('✓ All Firebase tests passed!');
            return 0;

        } catch (\Exception $e) {
            $this->error('✗ Firebase connection failed!');
            $this->error('Error: ' . $e->getMessage());
            $this->newLine();
            $this->warn('Please check:');
            $this->warn('1. Firebase credentials file exists at: ' . config('firebase.credentials.file'));
            $this->warn('2. Firebase project ID is correct: ' . config('firebase.project_id'));
            $this->warn('3. Firebase service account has proper permissions');
            return 1;
        }
    }
}