@extends('layouts.app')

@section('content')
<div class="min-h-screen flex">

    <!-- Kiri -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-pink-500 via-pink-600 to-pink-700 items-center justify-center p-12">

        <div class="text-center text-white">
            <div class="text-7xl mb-6">🧺</div>

            <h1 class="text-5xl font-bold mb-4">
                PING LAUNDRY
            </h1>

            <p class="text-xl text-pink-100 max-w-md">
                Bergabung dan nikmati layanan laundry cepat,
                bersih, wangi, dan terpercaya.
            </p>
        </div>

    </div>

    <!-- Kanan -->
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-pink-50 p-6">

        <div class="w-full max-w-md">

            <div class="bg-white rounded-3xl shadow-xl p-8">

                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-pink-600">
                        Buat Akun
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Daftar untuk mulai menggunakan PING LAUNDRY
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-pink-500 focus:outline-none"
                        >

                        @error('name')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-pink-500 focus:outline-none"
                        >

                        @error('email')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-pink-500 focus:outline-none"
                        >

                        @error('password')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2">
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-pink-500 focus:outline-none"
                        >
                    </div>

                    <!-- Tombol Register -->
                    <button
                        type="submit"
                        class="w-full bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-xl font-semibold transition"
                    >
                        Daftar Sekarang
                    </button>

                    <!-- Login -->
                    <div class="text-center mt-6">
                        <span class="text-gray-500">
                            Sudah punya akun?
                        </span>

                        <a
                            href="{{ route('login') }}"
                            class="text-pink-600 font-semibold hover:underline"
                        >
                            Login
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
@endsection