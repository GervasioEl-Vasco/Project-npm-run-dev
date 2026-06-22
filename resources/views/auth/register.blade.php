<x-guest-layout>
    <div class="mb-6 text-center">
<<<<<<< HEAD
        <h2 class="text-2xl font-bold text-slate-900">
            Buat Akun
        </h2>

        <p class="mt-2 text-sm text-slate-500">
            Daftar untuk mulai menggunakan PING LAUNDRY
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6 flex items-center justify-end">
            <a class="rounded-md text-sm text-slate-600 underline hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
=======
        <!-- Logo / Brand Header -->
        <div class="flex justify-center items-center gap-2 mb-1">
            <span class="text-3xl">🫧</span>
            <span class="text-2xl font-black tracking-wider text-pink-600">PING!<span class="text-gray-800 font-medium">Laundry</span></span>
        </div>
        <p class="text-gray-500 text-xs uppercase tracking-widest font-bold">Buat Akun Pelanggan Baru</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-xs font-bold text-gray-700 uppercase mb-1">Nama Lengkap</label>
            <input id="name" 
                   class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-200/50 transition duration-150" 
                   type="text" 
                   name="name" 
                   value="{{ old('name') }}" 
                   required 
                   autofocus 
                   autocomplete="name" 
                   placeholder="Nama Anda" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold text-gray-700 uppercase mb-1">Alamat Email</label>
            <input id="email" 
                   class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-200/50 transition duration-150" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autocomplete="username" 
                   placeholder="contoh@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number (WhatsApp) -->
        <div>
            <label for="phone" class="block text-xs font-bold text-gray-700 uppercase mb-1">Nomor HP / WhatsApp</label>
            <input id="phone" 
                   class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-200/50 transition duration-150" 
                   type="text" 
                   name="phone" 
                   value="{{ old('phone') }}" 
                   required 
                   placeholder="08xxxxxxxxxx" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Address -->
        <div>
            <label for="address" class="block text-xs font-bold text-gray-700 uppercase mb-1">Alamat Rumah</label>
            <input id="address" 
                   class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-200/50 transition duration-150" 
                   type="text" 
                   name="address" 
                   value="{{ old('address') }}" 
                   required 
                   placeholder="Jl. Nama Jalan No. XX" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-bold text-gray-700 uppercase mb-1">Kata Sandi</label>
            <input id="password" 
                   class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-200/50 transition duration-150"
                   type="password"
                   name="password"
                   required 
                   autocomplete="new-password" 
                   placeholder="Minimal 8 karakter" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-bold text-gray-700 uppercase mb-1">Konfirmasi Kata Sandi</label>
            <input id="password_confirmation" 
                   class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-200/50 transition duration-150"
                   type="password"
                   name="password_confirmation" 
                   required 
                   autocomplete="new-password" 
                   placeholder="Tulis kembali kata sandi" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-4 rounded-xl transition duration-200 shadow-lg shadow-pink-200 text-sm tracking-wide">
                Daftar Akun
            </button>
        </div>

        <!-- Footer Link -->
        <div class="text-center text-sm text-gray-500 pt-4 border-t border-gray-100">
            Sudah terdaftar? 
            <a href="{{ route('login') }}" class="font-bold text-pink-600 hover:text-pink-700 hover:underline">
                Masuk di sini
            </a>
        </div>
    </form>
</x-guest-layout>
>>>>>>> ui-ux
