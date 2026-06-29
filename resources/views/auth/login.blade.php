<x-guest-layout>
    <!-- Logo PING! Laundry di bagian atas form -->
    <div class="mb-8 flex flex-col items-center">
        <img src="{{ asset('images/logo.png') }}" alt="PING! Laundry Logo" class="h-28 w-auto object-contain">
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-900 mb-1.5 ml-1">Email</label>
            <input id="email" 
                   class="block w-full px-5 py-3.5 rounded-full border-0 bg-white shadow-sm focus:ring-2 focus:ring-pink-500/50 text-gray-800 transition" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus 
                   autocomplete="username" 
                   placeholder="Email Anda" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 ml-4" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-1.5 ml-1">
                <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-pink-600 hover:text-pink-700 hover:underline" href="{{ route('password.request') }}">
                        Lupa sandi?
                    </a>
                @endif
            </div>
            <input id="password" 
                   class="block w-full px-5 py-3.5 rounded-full border-0 bg-white shadow-sm focus:ring-2 focus:ring-pink-500/50 text-gray-800 transition"
                   type="password"
                   name="password"
                   required 
                   autocomplete="current-password" 
                   placeholder="Password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 ml-4" />
        </div>

        <!-- Remember Me (dibuat sangat subtle agar tidak mengganggu layout utama mockup) -->
        <div class="flex items-center justify-between ml-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" 
                       type="checkbox" 
                       class="rounded border-gray-300 text-pink-600 shadow-sm focus:ring-pink-500 focus:ring-pink-200/50" 
                       name="remember">
                <span class="ms-2 text-xs text-gray-600 select-none">Ingat saya</span>
            </label>
        </div>

        <!-- Submit Button (LOGIN) -->
        <div class="pt-2">
            <button type="submit" class="w-full bg-[#d94f87] hover:bg-pink-700 text-white font-bold py-3.5 px-4 rounded-full transition duration-200 shadow-md text-sm tracking-widest uppercase">
                LOGIN
            </button>
        </div>

        <!-- Footer Link (Register) -->
        <div class="text-center pt-4">
            <a href="{{ route('register') }}" class="font-semibold text-pink-600 hover:text-pink-700 underline text-sm transition">
                Register
            </a>
        </div>
    </form>
</x-guest-layout>