<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-medium text-teal-700">Akun</p>
            <h1 class="mt-1 text-2xl font-bold text-slate-950">{{ __('Profile') }}</h1>
        </div>
    </x-slot>

    <div class="space-y-6">
        <x-card padding="p-5 sm:p-8">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </x-card>

        <x-card padding="p-5 sm:p-8">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </x-card>

        <x-card padding="p-5 sm:p-8">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </x-card>
    </div>
</x-app-layout>
