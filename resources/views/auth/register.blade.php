<x-guest-layout>
    <!-- Logo PING! Laundry di bagian atas form (dikecilkan sedikit) -->
    <div class="mb-4 flex flex-col items-center">
        <img src="{{ asset('images/logo.png') }}" alt="PING! Laundry Logo" class="h-20 lg:h-24 w-auto object-contain">
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-3">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-900 mb-1 ml-1">Name</label>
            <input id="name" 
                   class="block w-full px-5 py-2.5 rounded-full border-0 bg-white shadow-sm focus:ring-2 focus:ring-pink-500/50 text-gray-800 transition text-sm" 
                   type="text" 
                   name="name" 
                   value="{{ old('name') }}" 
                   required 
                   autofocus 
                   autocomplete="name" 
                   placeholder="Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-1 ml-4 text-xs" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-900 mb-1 ml-1">Email</label>
            <input id="email" 
                   class="block w-full px-5 py-2.5 rounded-full border-0 bg-white shadow-sm focus:ring-2 focus:ring-pink-500/50 text-gray-800 transition text-sm" 
                   type="email"     
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autocomplete="username" 
                   placeholder="exp : Dita@gmail.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 ml-4 text-xs" />
        </div>

        <!-- Nomor Handphone -->
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-900 mb-1 ml-1">Nomor Handphone</label>
            <input id="phone" 
                   class="block w-full px-5 py-2.5 rounded-full border-0 bg-white shadow-sm focus:ring-2 focus:ring-pink-500/50 text-gray-800 transition text-sm" 
                   type="text" 
                   name="phone" 
                   value="{{ old('phone') }}" 
                   required 
                   placeholder="+62xxxxxx" />
            <x-input-error :messages="$errors->get('phone')" class="mt-1 ml-4 text-xs" />
        </div>

        <!-- Alamat Rumah -->
        <div>
            <label for="address" class="block text-sm font-medium text-gray-900 mb-1 ml-1">Alamat Rumah</label>
            <input id="address" 
                   class="block w-full px-5 py-2.5 rounded-full border-0 bg-white shadow-sm focus:ring-2 focus:ring-pink-500/50 text-gray-800 transition text-sm" 
                   type="text" 
                   name="address" 
                   value="{{ old('address') }}" 
                   required 
                   placeholder="Alamat Lengkap" />
            <x-input-error :messages="$errors->get('address')" class="mt-1 ml-4 text-xs" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-900 mb-1 ml-1">Password</label>
            <input id="password" 
                   class="block w-full px-5 py-2.5 rounded-full border-0 bg-white shadow-sm focus:ring-2 focus:ring-pink-500/50 text-gray-800 transition text-sm"
                   type="password"
                   name="password"
                   required 
                   autocomplete="new-password" 
                   placeholder="Comfirm Password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 ml-4 text-xs" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-900 mb-1 ml-1">Comfirm Password</label>
            <input id="password_confirmation" 
                   class="block w-full px-5 py-2.5 rounded-full border-0 bg-white shadow-sm focus:ring-2 focus:ring-pink-500/50 text-gray-800 transition text-sm"
                   type="password"
                   name="password_confirmation" 
                   required 
                   autocomplete="new-password" 
                   placeholder="Comfirm Password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 ml-4 text-xs" />
        </div>

        <!-- Submit Button (DAFTAR) -->
        <div class="pt-2">
            <button type="submit" class="w-full bg-[#d94f87] hover:bg-pink-700 text-white font-bold py-3 px-4 rounded-full transition duration-200 shadow-md text-sm tracking-widest uppercase">
                DAFTAR
            </button>
        </div>

        <!-- Footer Link (Login) -->
        <div class="text-center pt-2">
            <a href="{{ route('login') }}" class="font-semibold text-pink-600 hover:text-pink-700 underline text-sm transition">
                Login
            </a>
        </div>
    </form>
</x-guest-layout>
