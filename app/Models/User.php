<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Services\FirebaseService;

class User implements Authenticatable
{
    use AuthenticatableTrait;

    protected $firebaseService;
    protected $collection = 'users';

    // Properti user
    public $id;
    public $uuid;
    public $name;
    public $email;
    public $password;
    public $role;
    public $profile_photo_path;
    public $abstract_path;
    public $fullpaper_path;
    public $remember_token;
    public $created_at;
    public $updated_at;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'role',
        'profile_photo_path',
        'abstract_path',
        'fullpaper_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function __construct(array $attributes = [])
    {
        $this->firebaseService = app(FirebaseService::class);
        $this->fill($attributes);
    }

    /**
     * Fill the model with attributes
     */
    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        return $this;
    }

    /**
     * Get all users from Firestore
     */
    public static function all()
    {
        $firebase = app(FirebaseService::class);
        $users = $firebase->getAll('users');
        
        return collect($users)->map(function ($userData) {
            return new self($userData);
        });
    }

    /**
     * Find user by UUID
     */
    public static function find($uuid)
    {
        $firebase = app(FirebaseService::class);
        $userData = $firebase->get('users', $uuid);
        
        return $userData ? new self($userData) : null;
    }

    /**
     * Find user by email
     */
    public static function where(string $field, $value)
    {
        $firebase = app(FirebaseService::class);
        $results = $firebase->where('users', $field, '=', $value);
        
        return collect($results)->map(function ($userData) {
            return new self($userData);
        });
    }

    /**
     * Find one user by field
     */
    public static function findBy(string $field, $value)
    {
        $firebase = app(FirebaseService::class);
        $userData = $firebase->findOneBy('users', $field, $value);
        
        return $userData ? new self($userData) : null;
    }

    /**
     * Create new user in Firestore
     */
    public static function create(array $data)
    {
        $firebase = app(FirebaseService::class);
        
        // Generate UUID if not provided
        if (!isset($data['uuid'])) {
            $data['uuid'] = (string) Str::uuid();
        }

        // Set default role
        if (!isset($data['role'])) {
            $data['role'] = 'partisipant';
        }

        // Hash password if provided and not already hashed
        if (isset($data['password']) && !Str::startsWith($data['password'], '$2y$')) {
            $data['password'] = Hash::make($data['password']);
        }

        // Add timestamps
        $data['created_at'] = now()->toDateTimeString();
        $data['updated_at'] = now()->toDateTimeString();

        // Save to Firestore using UUID as document ID
        $uuid = $data['uuid'];
        $firebase->create('users', $data, $uuid);

        return new self($data);
    }

    /**
     * Update user in Firestore
     */
    public function update(array $data)
    {
        $firebase = app(FirebaseService::class);
        
        // Update password if provided
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        // Update timestamp
        $data['updated_at'] = now()->toDateTimeString();

        // Update in Firestore
        $firebase->update('users', $this->uuid, $data);

        // Update local instance
        $this->fill($data);

        return $this;
    }

    /**
     * Save current user state to Firestore
     */
    public function save()
    {
        $firebase = app(FirebaseService::class);
        
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'updated_at' => now()->toDateTimeString(),
        ];

        if ($this->password) {
            $data['password'] = $this->password;
        }

        if ($this->profile_photo_path) {
            $data['profile_photo_path'] = $this->profile_photo_path;
        }

        if ($this->abstract_path) {
            $data['abstract_path'] = $this->abstract_path;
        }

        if ($this->fullpaper_path) {
            $data['fullpaper_path'] = $this->fullpaper_path;
        }

        $firebase->update('users', $this->uuid, $data);

        return true;
    }

    /**
     * Delete user from Firestore
     */
    public function delete()
    {
        $firebase = app(FirebaseService::class);
        
        // Delete user files from storage if they exist
        if ($this->profile_photo_path) {
            $firebase->deleteFile($this->profile_photo_path);
        }
        if ($this->abstract_path) {
            $firebase->deleteFile($this->abstract_path);
        }
        if ($this->fullpaper_path) {
            $firebase->deleteFile($this->fullpaper_path);
        }

        // Delete user document
        $firebase->delete('users', $this->uuid);

        return true;
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Get the unique identifier for the user (required by Authenticatable)
     */
    public function getAuthIdentifierName()
    {
        return 'uuid';
    }

    /**
     * Get the unique identifier for the user (required by Authenticatable)
     */
    public function getAuthIdentifier()
    {
        return $this->uuid;
    }

    /**
     * Get the password for the user (required by Authenticatable)
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session (required by Authenticatable)
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session (required by Authenticatable)
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token (required by Authenticatable)
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get route key name for route model binding
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * Get profile photo URL
     */
    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo_path) {
            $firebase = app(FirebaseService::class);
            return $firebase->getFileUrl($this->profile_photo_path);
        }
        return asset('images/default-avatar.jpg');
    }
}