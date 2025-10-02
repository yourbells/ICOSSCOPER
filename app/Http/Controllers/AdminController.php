<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil semua data user dari Firebase
        $users = User::all();

        // Kirim data ke view
        return view('admin.dashboard', compact('users'));
    }
    
    public function destroyUser(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot delete admin user');
        }
        
        $user->delete();
        return back()->with('success', 'User deleted successfully');
    }
}