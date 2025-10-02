<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;

class FileUploadController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    /**
     * Menampilkan dashboard dengan user yang login
     */
    public function index()
    {
        return view('profile.dashboard', ['user' => auth()->user()]);
    }

    /**
     * Upload Abstract ke Firebase Storage
     */
    public function storeAbstract(Request $request)
    {
        $request->validate([
            'abstract' => 'required|mimes:pdf,doc,docx|max:2048', // 2 MB max
        ]);

        $user = auth()->user();

        // Hapus file lama jika ada
        if ($user->abstract_path) {
            $this->firebase->deleteFile($user->abstract_path);
        }

        // Upload file baru ke Firebase Storage
        $filePath = $this->firebase->uploadFile(
            $request->file('abstract'),
            'uploads/abstracts'
        );

        // Update user data di Firestore
        $user->abstract_path = $filePath;
        $user->save();

        // Get file URL
        $fileUrl = $this->firebase->getFileUrl($filePath);

        return back()
            ->with('success', 'Abstract berhasil diupload!')
            ->with('file_url', $fileUrl);
    }

    /**
     * Upload Full Paper ke Firebase Storage
     */
    public function storeFullPaper(Request $request)
    {
        $request->validate([
            'fullpaper' => 'required|mimes:pdf,doc,docx|max:5120', // 5 MB max
        ]);

        $user = auth()->user();

        // Hapus file lama jika ada
        if ($user->fullpaper_path) {
            $this->firebase->deleteFile($user->fullpaper_path);
        }

        // Upload file baru ke Firebase Storage
        $filePath = $this->firebase->uploadFile(
            $request->file('fullpaper'),
            'uploads/fullpapers'
        );

        // Update user data di Firestore
        $user->fullpaper_path = $filePath;
        $user->save();

        // Get file URL
        $fileUrl = $this->firebase->getFileUrl($filePath);

        return back()
            ->with('success', 'Full paper berhasil diupload!')
            ->with('file_url', $fileUrl);
    }
}