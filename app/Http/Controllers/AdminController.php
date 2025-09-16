<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function destroy(User $user)
    {
        if ($user->role !== 'admin') {
            $user->delete();
        }
        return redirect()->route('admin.dashboard')->with('status', 'User deleted!');
    }
    
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
