<x-guest-layout>
    <div class="mb-8 text-center">
        <!-- Logo / Brand Header -->
        <div class="flex justify-center items-center gap-2 mb-2">
            <span class="text-3xl">🫧</span>
            <span class="text-2xl font-black tracking-wider text-pink-600">PING!<span class="text-gray-800 font-medium">Laundry</span></span>
        </div>
        <p class="text-gray-500 text-xs uppercase tracking-widest font-bold">Masuk ke Akun Anda</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold text-gray-700 uppercase mb-1">Alamat Email</label>
            <input id="email" 
                   class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-200/50 transition duration-150" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus 
                   autocomplete="username" 
                   placeholder="contoh@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-1">
                <label for="password" class="block text-xs font-bold text-gray-700 uppercase">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-pink-600 hover:text-pink-700 hover:underline" href="{{ route('password.request') }}">
                        Lupa sandi?
                    </a>
                @endif
            </div>
            <input id="password" 
                   class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-200/50 transition duration-150"
                   type="password"
                   name="password"
                   required 
                   autocomplete="current-password" 
                   placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" 
                       type="checkbox" 
                       class="rounded border-gray-300 text-pink-600 shadow-sm focus:ring-pink-500 focus:ring-pink-200/50" 
                       name="remember">
                <span class="ms-2 text-sm text-gray-600 select-none">Ingat saya</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-4 rounded-xl transition duration-200 shadow-lg shadow-pink-200 text-sm tracking-wide">
                Masuk Sekarang
            </button>
        </div>

        <!-- Footer Link -->
        <div class="text-center text-sm text-gray-500 pt-4 border-t border-gray-100">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="font-bold text-pink-600 hover:text-pink-700 hover:underline">
                Daftar Gratis
            </a>
        </div>
    </form>
</x-guest-layout>