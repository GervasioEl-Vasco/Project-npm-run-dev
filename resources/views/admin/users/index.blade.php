<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ search: '' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
                    <div class="w-full md:w-1/3 relative">
                        <input type="text" x-model="search" placeholder="Cari nama atau email..." 
                               class="w-full pl-10 pr-4 py-2.5 rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm text-sm">
                        <div class="absolute left-3 top-3.5 text-gray-400">
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="w-full md:w-auto text-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-6 rounded-xl transition duration-200 shadow-md">
                        + Tambah Pengguna Baru
                    </a>
                </div>

                <div class="overflow-x-auto rounded-xl border border-gray-100">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th class="py-3 px-6 text-left text-xs font-black text-gray-400 uppercase tracking-wider">Nama</th>
                                <th class="py-3 px-6 text-left text-xs font-black text-gray-400 uppercase tracking-wider">Email</th>
                                <th class="py-3 px-6 text-left text-xs font-black text-gray-400 uppercase tracking-wider">No. HP</th>
                                <th class="py-3 px-6 text-left text-xs font-black text-gray-400 uppercase tracking-wider">Peran</th>
                                <th class="py-3 px-6 text-center text-xs font-black text-gray-400 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($users as $user)
                            <tr class="hover:bg-gray-50/50 transition duration-150"
                                x-show="search === '' || '{{ strtolower($user->name) }}'.includes(search.toLowerCase()) || '{{ strtolower($user->email) }}'.includes(search.toLowerCase())">
                                <td class="py-4 px-6 text-sm font-bold text-gray-900">{{ $user->name }}</td>
                                <td class="py-4 px-6 text-sm text-gray-600">{{ $user->email }}</td>
                                <td class="py-4 px-6 text-sm text-gray-600">{{ $user->phone_number ?? '-' }}</td>
                                <td class="py-4 px-6 text-sm">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider 
                                        {{ ($user->role ?? 'pelanggan') == 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ $user->role ?? 'Pelanggan' }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-sm text-center">
                                    <div class="flex justify-center items-center gap-3">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold hover:underline">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-bold hover:underline">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-400 font-medium">Belum ada data pengguna.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
