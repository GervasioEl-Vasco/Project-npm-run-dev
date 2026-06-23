<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pengguna Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                
                <form action="{{ route('admin.users.store') }}" method="POST"
                      x-data="{ 
                          name: '', 
                          email: '', 
                          phone: '', 
                          password: '', 
                          role: 'pelanggan',
                          emailRegex: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/,
                          get isEmailValid() { return this.emailRegex.test(this.email) },
                          get isFormValid() { return this.name.length >= 3 && this.isEmailValid && this.password.length >= 8 }
                      }">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-5">
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" id="name" required x-model="name"
                               class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                               placeholder="Contoh: Dzikru Ramadhan">
                        <div class="text-xs text-red-500 mt-1" x-show="name.length > 0 && name.length < 3">
                            * Nama minimal 3 karakter.
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-5">
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Alamat Email</label>
                        <input type="email" name="email" id="email" required x-model="email"
                               class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                               placeholder="Contoh: dzikru@example.com">
                        <div class="text-xs text-red-500 mt-1" x-show="email.length > 0 && !isEmailValid">
                            * Masukkan alamat email yang valid.
                        </div>
                    </div>

                    <!-- No. HP -->
                    <div class="mb-5">
                        <label for="phone_number" class="block text-sm font-bold text-gray-700 mb-1">Nomor WhatsApp / HP</label>
                        <input type="text" name="phone_number" id="phone_number" x-model="phone"
                               class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                               placeholder="Contoh: 081234567890">
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-1">Kata Sandi</label>
                        <input type="password" name="password" id="password" required x-model="password"
                               class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                               placeholder="Minimal 8 karakter">
                        <div class="text-xs text-red-500 mt-1" x-show="password.length > 0 && password.length < 8">
                            * Kata sandi minimal 8 karakter.
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="mb-8">
                        <label for="role" class="block text-sm font-bold text-gray-700 mb-1">Peran Akses</label>
                        <select name="role" id="role" required x-model="role"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
                            <option value="pelanggan">Pelanggan</option>
                            <option value="admin">Admin / Kasir</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-end gap-4 border-t pt-5">
                        <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-500 hover:underline">Batal</a>
                        <button type="submit" :disabled="!isFormValid"
                                class="bg-indigo-600 hover:bg-indigo-700 disabled:bg-gray-300 disabled:cursor-not-allowed text-white font-bold py-2.5 px-6 rounded-xl transition duration-200 shadow-md">
                            Simpan Pengguna
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
