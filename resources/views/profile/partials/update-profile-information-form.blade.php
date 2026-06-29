<section>
    <header class="mb-6">
        <h2 class="text-xl font-bold text-gray-950">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-bold text-gray-900 mb-2 ml-1">Name</label>
            <input id="name" name="name" type="text" 
                   class="block w-full px-5 py-3 rounded-full border border-gray-300 bg-white text-gray-800 shadow-sm focus:ring-2 focus:ring-pink-500/50 text-sm mt-2" 
                   value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 ml-4 text-xs" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-bold text-gray-900 mb-2 ml-1">Email</label>
            <input id="email" name="email" type="email" 
                   class="block w-full px-5 py-3 rounded-full border border-gray-300 bg-white text-gray-800 shadow-sm focus:ring-2 focus:ring-pink-500/50 text-sm mt-2" 
                   value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2 ml-4 text-xs" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-sm text-slate-700">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="text-sm font-medium text-pink-600 hover:text-pink-700 focus:outline-none underline">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-emerald-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="bg-[#e8a3c0] hover:bg-[#e49bb7] text-[#ba2b65] font-extrabold py-2.5 px-6 rounded-xl shadow-sm text-sm transition duration-200">
                Save
            </button>

            @if (session('status') === 'profile-updated')
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
