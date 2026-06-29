<section>
    <header class="mb-6">
        <h2 class="text-xl font-bold text-gray-955">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <label for="update_password_current_password" class="block text-sm font-bold text-gray-900 mb-2 ml-1">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" 
                   class="block w-full px-5 py-3 rounded-full border border-gray-300 bg-white text-gray-800 shadow-sm focus:ring-2 focus:ring-pink-500/50 text-sm mt-2" 
                   autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 ml-4 text-xs" />
        </div>

        <!-- New Password -->
        <div>
            <label for="update_password_password" class="block text-sm font-bold text-gray-900 mb-2 ml-1">New Password</label>
            <input id="update_password_password" name="password" type="password" 
                   class="block w-full px-5 py-3 rounded-full border border-gray-300 bg-white text-gray-800 shadow-sm focus:ring-2 focus:ring-pink-500/50 text-sm mt-2" 
                   autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 ml-4 text-xs" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-bold text-gray-900 mb-2 ml-1">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                   class="block w-full px-5 py-3 rounded-full border border-gray-300 bg-white text-gray-800 shadow-sm focus:ring-2 focus:ring-pink-500/50 text-sm mt-2" 
                   autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 ml-4 text-xs" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="bg-[#e8a3c0] hover:bg-[#e49bb7] text-[#ba2b65] font-extrabold py-2.5 px-6 rounded-xl shadow-sm text-sm transition duration-200">
                Save
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-600 font-semibold"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
