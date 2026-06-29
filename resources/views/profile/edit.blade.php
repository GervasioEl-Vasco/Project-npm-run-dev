<x-app-layout>
    <div class="space-y-6">
        
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="text-[#ba2b65] hover:text-pink-700 transition duration-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-gray-900">Profile Akun</h2>
            </div>
            <div class="text-sm font-medium text-gray-400 whitespace-nowrap hidden sm:block">
                Hari ini: {{ date('d F Y') }}
            </div>
        </div>

        <!-- Profile Information Card -->
        <div class="bg-white rounded-[2rem] shadow-xl border border-pink-100/50 p-8 max-w-5xl">
            <div class="max-w-3xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Update Password Card -->
        <div class="bg-white rounded-[2rem] shadow-xl border border-pink-100/50 p-8 max-w-5xl">
            <div class="max-w-3xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Delete User Account Card -->
        <div class="bg-white rounded-[2rem] shadow-xl border border-pink-100/50 p-8 max-w-5xl">
            <div class="max-w-3xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</x-app-layout>
