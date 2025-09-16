@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8">
    <h1 class="text-3xl font-bold mb-6 text-sky-700">Admin Dashboard</h1>
    <div class="overflow-x-auto bg-white rounded-xl shadow-lg p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-pink-200 to-blue-100">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">#</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Name</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Role</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Abstract</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Fullpaper</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($users as $user)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded-lg text-xs font-semibold
                            @if($user->role === 'admin') bg-red-200 text-red-700
                            @elseif($user->role === 'presenter') bg-green-200 text-green-700
                            @else bg-blue-200 text-blue-700 @endif">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        @if($user->role === 'presenter' && $user->abstract_path)
                            <a href="{{ asset('uploads/abstracts/'.$user->abstract_path) }}" target="_blank" class="text-sky-600 underline">View</a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if($user->role === 'presenter' && $user->fullpaper_path)
                            <a href="{{ asset('uploads/fullpapers/'.$user->fullpaper_path) }}" target="_blank" class="text-sky-600 underline">View</a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 flex gap-2">
                        @if($user->role !== 'admin')
                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Delete this user?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection