<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Firebase Credentials
    |--------------------------------------------------------------------------
    |
    | Path to the Firebase service account credentials JSON file.
    |
    */
    'credentials' => [
        'file' => env('FIREBASE_CREDENTIALS', storage_path('app/firebase/firebase-credentials.json')),
    ],

    /*
    |--------------------------------------------------------------------------
    | Firebase Project ID
    |--------------------------------------------------------------------------
    */
    'project_id' => env('FIREBASE_PROJECT_ID', 'icosscoper'),

    /*
    |--------------------------------------------------------------------------
    | Firebase Database URL (for Realtime Database)
    |--------------------------------------------------------------------------
    */
    'database_url' => env('FIREBASE_DATABASE_URL', 'https://icosscoper-default-rtdb.firebaseio.com'),

    /*
    |--------------------------------------------------------------------------
    | Firebase Storage Bucket
    |--------------------------------------------------------------------------
    */
    'storage_bucket' => env('FIREBASE_STORAGE_BUCKET', 'icosscoper.appspot.com'),
];