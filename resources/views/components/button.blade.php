@props(['type' => 'submit'])

<button {{ $attributes->merge(['type' => $type, 'class' => 'inline-flex justify-center items-center px-5 py-2.5 bg-brand-600 border border-transparent rounded-lg font-bold text-sm text-white tracking-wide hover:bg-brand-700 focus:bg-brand-700 active:bg-brand-900 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 transition-all duration-200 shadow-sm shadow-brand-500/30']) }}>
    {{ $slot }}
</button>