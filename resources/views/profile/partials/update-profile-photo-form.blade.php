<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Photo') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your account\'s profile picture. This will be displayed across your account.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.update-photo') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')

        <!-- Current Photo -->
        <div class="flex items-center space-x-4">
            <div class="relative">
                <img 
                    src="{{ $user->profile_photo_url ?? asset('images/default-avatar.jpg') }}" 
                    alt="Profile Photo" 
                    class="w-32 h-32 rounded-full object-cover border-2 border-gray-200"
                    id="current-photo-preview"
                >
            </div>

            <!-- Preview photo after selecting -->
            <div class="flex-1">
                <label for="profile_photo" class="block text-sm font-medium text-gray-700">Upload New Photo</label>
                <input 
                    id="profile_photo" 
                    name="profile_photo" 
                    type="file" 
                    accept="image/*" 
                    class="mt-1 block w-full text-sm text-gray-700 border-gray-300 rounded-lg cursor-pointer focus:ring-2 focus:ring-blue-500"
                    onchange="previewPhoto(event)"
                >
                @error('profile_photo')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex items-center gap-4">
            <button type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Save
            </button>

            @if($user->profile_photo_path)
            <form method="POST" action="{{ route('profile.delete-photo') }}" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                    Remove
                </button>
            </form>
            @endif
        </div>
    </form>

    <script>
        function previewPhoto(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('current-photo-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</section>
