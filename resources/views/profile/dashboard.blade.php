@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center px-4">
    <div class="bg-white/80 backdrop-blur-md p-8 rounded-3xl shadow-2xl w-full max-w-lg bg-gradient-to-br from-pink-100 via-blue-50 to-purple-100 border border-white/30 transition-transform duration-300 hover:scale-[1.01]">
        
        <!-- Profile Section -->
        <div class="text-center">
            <div class="relative w-32 h-32 mx-auto mb-6">
                <img src="{{ asset('images/default-avatar.jpg') }}" 
                    alt="User Avatar" 
                    class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-md">
                <span class="absolute bottom-1 right-1 bg-green-400 w-5 h-5 rounded-full border-2 border-white animate-pulse"></span>
            </div>

            <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">
                Hey, {{ $user->name }} 👋
            </h2>
            <p class="text-gray-500 text-sm mb-4">{{ $user->email }}</p>

            <a href="{{ route('profile.edit') }}" 
                class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-pink-500 to-purple-600 text-white text-sm font-medium rounded-xl hover:scale-105 hover:shadow-lg transition">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="w-4 h-4 mr-2" 
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232a2.121 2.121 0 113 3L12 14H9v-3z" />
                </svg>
                Edit Profile
            </a>  
            <!-- Upload Section -->
            <div class="p-6 rounded-2xl" 
                x-data="{ openAbstract: false, openFullPaper: false }">
                <div class="flex gap-4 justify-center">
                    <button 
                        @click="openAbstract = true"
                        class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-2.5 rounded-xl font-semibold shadow-md hover:scale-105 hover:shadow-lg transition">
                        Upload Abstract
                    </button>

                    <button 
                        @click="openFullPaper = true"
                        class="bg-gradient-to-r from-green-500 to-teal-600 text-white px-5 py-2.5 rounded-xl font-semibold shadow-md hover:scale-105 hover:shadow-lg transition">
                        Upload Full Paper
                    </button>
                </div>

                <!-- Modal Abstract -->
                <div 
                    x-show="openAbstract" 
                    class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
                    @click.self="openAbstract = false"
                    x-transition>
                    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8 relative">
                        <button 
                            @click="openAbstract = false"
                            class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-2xl">
                            ✖
                        </button>
                        
                        <h3 class="text-2xl font-bold mb-6 text-gray-800 text-center">
                            Upload Abstract
                        </h3>
                        
                        <form action="{{ route('upload.abstract') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                            @csrf
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Pilih File (PDF/DOCX)</label>
                                <input type="file" 
                                    name="abstract" 
                                    accept=".pdf,.doc,.docx"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('abstract')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold py-2.5 rounded-xl hover:scale-105 transition">
                                Upload
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Modal Full Paper -->
                <div 
                    x-show="openFullPaper" 
                    class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
                    @click.self="openFullPaper = false"
                    x-transition>
                    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8 relative">
                        <button 
                            @click="openFullPaper = false"
                            class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-2xl">
                            ✖
                        </button>
                        
                        <h3 class="text-2xl font-bold mb-6 text-gray-800 text-center">
                            Upload Full Paper
                        </h3>
                        
                        <form action="{{ route('upload.fullpaper') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                            @csrf
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Pilih File (PDF/DOCX)</label>
                                <input type="file" 
                                    name="fullpaper" 
                                    accept=".pdf,.doc,.docx"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                                @error('fullpaper')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-green-500 to-teal-600 text-white font-semibold py-2.5 rounded-xl hover:scale-105 transition">
                                Upload
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
