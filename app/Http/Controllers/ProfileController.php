<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Services\FirebaseService;

class ProfileController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    
    /**
     * Update profile photo
     */
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = $request->user();

        // Hapus foto lama jika ada
        if ($user->profile_photo_path) {
            $this->firebase->deleteFile($user->profile_photo_path);
        }

        // Upload foto baru ke Firebase Storage
        $filePath = $this->firebase->uploadFile(
            $request->file('profile_photo'),
            'profile-photos'
        );

        // Update user di Firestore
        $user->profile_photo_path = $filePath;
        $user->save();

        return back()->with('status', 'Profile photo updated successfully!');
    }

    /**
     * Delete profile photo
     */
    public function deletePhoto(Request $request)
    {
        $user = $request->user();

        if ($user->profile_photo_path) {
            $this->firebase->deleteFile($user->profile_photo_path);
            $user->profile_photo_path = null;
            $user->save();
        }

        return back()->with('status', 'Profile photo removed successfully!');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // If email changed, we might want to handle email verification
        // For now, we'll just update it
        $user->update($updateData);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // Delete user from Firestore (includes all files)
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}