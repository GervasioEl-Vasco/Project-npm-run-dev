<x-guest-layout>
    <div class="mb-6 text-center">
        
        <div class="flex justify-center items-center gap-2 mb-1">
            <span class="text-3xl">🫧</span>
            <span class="text-2xl font-black tracking-wider text-pink-600">PING!<span class="text-gray-800 font-medium">Laundry</span></span>
        </div>
        <p class="text-gray-500 text-xs uppercase tracking-widest font-bold">Buat Akun Pelanggan Baru</p>
    </div>

    <form method="POST" action="{{  route('register') }}" class="space-y-4">
        @csrf

       
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


        <div class="pt-2">
            <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-4 rounded-xl transition duration-200 shadow-lg shadow-pink-200 text-sm tracking-wide">
                Daftar Akun
            </button>
        </div>

        
        <div class="text-center text-sm text-gray-500 pt-4 border-t border-gray-100">
            Sudah terdaftar? 
            <a href="{{ route('login') }}" class="font-bold text-pink-600 hover:text-pink-700 hover:underline">
                Masuk di sini
            </a>
        </div>
    </form>
</x-guest-layout>
