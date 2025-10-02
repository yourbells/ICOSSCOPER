<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Firebase\Contract\Storage;
use Google\Cloud\Firestore\FirestoreClient;

class FirebaseService
{
    protected $firestore;
    protected $storage;
    protected $auth;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(config('firebase.credentials.file'))
            ->withProjectId(config('firebase.project_id'));

        $this->firestore = $factory->createFirestore();
        $this->storage = $factory->createStorage();
        $this->auth = $factory->createAuth();
    }

    /**
     * Get Firestore Database
     */
    public function firestore(): FirestoreClient
    {
        return $this->firestore->database();
    }

    /**
     * Get Storage
     */
    public function storage(): Storage
    {
        return $this->storage;
    }

    /**
     * Get Auth
     */
    public function auth()
    {
        return $this->auth;
    }

    /**
     * Get a collection reference
     */
    public function collection(string $name)
    {
        return $this->firestore()->collection($name);
    }

    /**
     * Get a document reference
     */
    public function document(string $collection, string $id)
    {
        return $this->collection($collection)->document($id);
    }

    /**
     * Create a document
     */
    public function create(string $collection, array $data, ?string $id = null)
    {
        if ($id) {
            $this->collection($collection)->document($id)->set($data);
            return $id;
        }
        
        $docRef = $this->collection($collection)->add($data);
        return $docRef->id();
    }

    /**
     * Update a document
     */
    public function update(string $collection, string $id, array $data)
    {
        $this->document($collection, $id)->update($data);
    }

    /**
     * Delete a document
     */
    public function delete(string $collection, string $id)
    {
        $this->document($collection, $id)->delete();
    }

    /**
     * Get a document by ID
     */
    public function get(string $collection, string $id)
    {
        $snapshot = $this->document($collection, $id)->snapshot();
        
        if ($snapshot->exists()) {
            return array_merge(['id' => $snapshot->id()], $snapshot->data());
        }
        
        return null;
    }

    /**
     * Get all documents from a collection
     */
    public function getAll(string $collection)
    {
        $documents = $this->collection($collection)->documents();
        $results = [];
        
        foreach ($documents as $document) {
            if ($document->exists()) {
                $results[] = array_merge(['id' => $document->id()], $document->data());
            }
        }
        
        return $results;
    }

    /**
     * Query documents with where clause
     */
    public function where(string $collection, string $field, string $operator, $value)
    {
        $query = $this->collection($collection)->where($field, $operator, $value);
        $documents = $query->documents();
        $results = [];
        
        foreach ($documents as $document) {
            if ($document->exists()) {
                $results[] = array_merge(['id' => $document->id()], $document->data());
            }
        }
        
        return $results;
    }

    /**
     * Find one document by field
     */
    public function findOneBy(string $collection, string $field, $value)
    {
        $results = $this->where($collection, $field, '=', $value);
        return !empty($results) ? $results[0] : null;
    }

    /**
     * Upload file to Firebase Storage
     */
    public function uploadFile($file, string $path)
    {
        $bucket = $this->storage->getBucket();
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $path . '/' . $fileName;
        
        $bucket->upload(
            fopen($file->getRealPath(), 'r'),
            [
                'name' => $filePath,
                'predefinedAcl' => 'publicRead'
            ]
        );
        
        return $filePath;
    }

    /**
     * Delete file from Firebase Storage
     */
    public function deleteFile(string $path)
    {
        $bucket = $this->storage->getBucket();
        $object = $bucket->object($path);
        
        if ($object->exists()) {
            $object->delete();
        }
    }

    /**
     * Get file URL from Firebase Storage
     */
    public function getFileUrl(string $path)
    {
        $bucket = $this->storage->getBucket();
        $object = $bucket->object($path);
        
        if ($object->exists()) {
            return sprintf(
                'https://storage.googleapis.com/%s/%s',
                $bucket->name(),
                $path
            );
        }
        
        return null;
    }
}