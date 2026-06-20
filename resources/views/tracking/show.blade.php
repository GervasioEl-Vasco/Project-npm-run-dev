<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pelacakan Cucian Anda') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ currentStatus: '{{ strtolower($order->status) }}' }">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                <div class="flex justify-between items-center mb-8 border-b border-gray-100 pb-4">
                    <div>
                        <span class="text-xs font-bold text-indigo-600 uppercase tracking-widest">Detail Pelacakan</span>
                        <h3 class="text-2xl font-black text-gray-800">#ORD-{{ $order->id }}</h3>
                    </div>
                    <span class="px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-wider
                        {{ $order->status == 'Selesai' ? 'bg-green-100 text-green-800' : 'bg-indigo-100 text-indigo-800' }}">
                        {{ $order->status }}
                    </span>
                </div>

                <!-- Timeline / Stepper Status -->
                <div class="relative flex flex-col md:flex-row justify-between items-center gap-4">
                    <!-- Progress Line (Desktop) -->
                    <div class="absolute hidden md:block top-1/2 left-0 right-0 h-1 bg-gray-200 -translate-y-1/2 z-0"></div>

                    @php
                        $statuses = ['diterima', 'checked', 'dicuci', 'dikeringkan', 'disetrika', 'selesai'];
                        $currentIndex = array_search(strtolower($order->status), $statuses);
                    @endphp

                    @foreach($statuses as $index => $step)
                        @php
                            $isCompleted = $index <= $currentIndex;
                            $isActive = $index === $currentIndex;
                        @endphp
                        <div class="relative z-10 flex flex-col items-center text-center w-full md:w-auto">
                            <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg transition duration-500 shadow-md
                                {{ $isCompleted ? 'bg-indigo-600 text-white ring-4 ring-indigo-100' : 'bg-gray-100 text-gray-400' }}
                                {{ $isActive ? 'animate-bounce' : '' }}">
                                @if($isCompleted && !$isActive)
                                    ✓
                                @else
                                    {{ $index + 1 }}
                                @endif
                            </div>
                            <span class="mt-2 text-xs font-bold tracking-wide uppercase 
                                {{ $isCompleted ? 'text-indigo-900 font-extrabold' : 'text-gray-400' }}">
                                {{ ucfirst($step) }}
                            </span>
                        </div>
                    @endforeach
                </div>

                <!-- Detail Tambahan Cucian -->
                <div class="mt-12 bg-gray-50 rounded-xl p-6 border border-gray-100 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <span class="text-xs text-gray-400 block font-bold">Layanan</span>
                        <span class="text-gray-800 font-bold">{{ $order->service->name }}</span>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 block font-bold">Berat Cucian</span>
                        <span class="text-gray-800 font-bold">{{ $order->weight }} Kg</span>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 block font-bold">Estimasi Selesai</span>
                        <span class="text-gray-800 font-bold">{{ $order->estimated_completed_at ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
