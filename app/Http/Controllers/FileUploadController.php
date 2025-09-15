<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    // Menampilkan dashboard dengan user yang login
    public function index()
    {
        return view('profile.dashboard', ['user' => auth()->user()]);
    }

    /**
     * Upload Abstract
     */
    public function storeAbstract(Request $request)
    {
        $request->validate([
            'abstract' => 'required|mimes:pdf,doc,docx|max:2048', // 2 MB max
        ]);

        $fileName = time() . '_abstract.' . $request->file('abstract')->extension();

        // Simpan ke folder /public/uploads/abstracts
        $request->file('abstract')->move(public_path('uploads/abstracts'), $fileName);

        return back()->with('success', 'Abstract berhasil diupload!')
                     ->with('file', 'abstracts/' . $fileName);
    }

    /**
     * Upload Full Paper
     */
    public function storeFullPaper(Request $request)
    {
        $request->validate([
            'fullpaper' => 'required|mimes:pdf,doc,docx|max:5120', // 5 MB max
        ]);

        $fileName = time() . '_fullpaper.' . $request->file('fullpaper')->extension();

        // Simpan ke folder /public/uploads/fullpapers
        $request->file('fullpaper')->move(public_path('uploads/fullpapers'), $fileName);

        return back()->with('success', 'Full paper berhasil diupload!')
                     ->with('file', 'fullpapers/' . $fileName);
    }
}
