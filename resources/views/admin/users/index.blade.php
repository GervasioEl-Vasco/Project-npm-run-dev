<x-app-layout>
    <div class="space-y-6" x-data="{ search: '' }">
        
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <!-- Sesuai mockup, teksnya bertuliskan "Data Pesanan Aktif" dengan tombol "Tambah Pengguna Baru" -->
            <h2 class="text-2xl font-bold text-gray-900">Data Pesanan Aktif</h2>
            <a href="{{ route('admin.users.create') }}" class="bg-[#e8a3c0] hover:bg-[#e49bb7] text-[#ba2b65] font-extrabold py-2.5 px-6 rounded-full shadow-sm text-sm transition duration-200">
                Tambah Pengguna Baru
            </a>
        </div>

        <!-- Card Container -->
        <div class="bg-white rounded-[2rem] shadow-xl border border-pink-100/50 p-8">
            
            <!-- Search bar (styled to match design) -->
            <div class="flex flex-col sm:flex-row justify-between gap-6 mb-8">
                <div class="w-full sm:w-1/3">
                    <input type="text" x-model="search" placeholder="Cari nama atau email..." 
                           class="w-full px-5 py-3 rounded-full border border-gray-300 bg-white text-gray-800 shadow-sm focus:ring-2 focus:ring-pink-500/50 text-sm">
                </div>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto rounded-[2rem] border border-gray-300 shadow-sm">
                <table class="min-w-full bg-white divide-y divide-gray-300">
                    <thead class="bg-[#e8a3c0]/60">
                        <tr>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Nama</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Email</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">No.Hp</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Peran</th>
                            <th class="py-4 px-6 text-center text-sm font-extrabold text-gray-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($users as $user)
                        <tr class="hover:bg-pink-50/20 transition duration-150"
                            x-show="search === '' || '{{ strtolower($user->name) }}'.includes(search.toLowerCase()) || '{{ strtolower($user->email) }}'.includes(search.toLowerCase())">
                            
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm font-bold text-gray-900">{{ $user->name }}</td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm text-gray-800">{{ $user->email }}</td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm text-gray-700 font-medium">
                                {{ $user->phone ?? ($user->phone_number ?? '-') }}
                            </td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm">
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                                    {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-700 border border-purple-200' : 'bg-blue-100 text-blue-700 border border-blue-200' }}">
                                    {{ $user->role ?? 'Pelanggan' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center text-sm">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-block bg-[#d94f87] hover:bg-pink-700 text-white font-bold py-1.5 px-4 rounded-full transition duration-200 shadow-sm text-xs uppercase tracking-wider">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-bold py-1.5 px-4 rounded-full transition duration-200 shadow-sm text-xs uppercase tracking-wider">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-sm text-gray-500 font-medium">
                                Belum ada data pengguna.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
