<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-indigo-700">Dashboard Siswa</h2>
        @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 border border-green-300 rounded">
            ✅ {{ session('success') }}
        </div>
        @endif

        <!-- TABEL SISWA TERDAFTAR -->
        <div class="mt-6 bg-white p-4 rounded-xl shadow border border-gray-200">
            <h3 class="text-lg font-semibold text-indigo-700 mb-4">📋 Daftar Siswa Terdaftar</h3>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 text-sm">
                    <thead class="bg-indigo-100 text-indigo-800">
                        <tr>
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border text-left">Nama</th>
                            <th class="px-4 py-2 border text-left">NISN</th>
                            <th class="px-4 py-2 border text-left">Jenis Kelamin</th>
                            <th class="px-4 py-2 border text-left">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswa as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $item->nama }}</td>
                            <td class="px-4 py-2 border">{{ $item->nisn }}</td>
                            <td class="px-4 py-2 border">{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </td>
                            <td class="px-4 py-2 border">{{ $item->alamat }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center px-4 py-4 text-gray-500">Belum ada siswa yang mendaftar.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>

    <div class="flex bg-gray-50 min-h-[calc(100vh-4rem)]">
        <aside class="w-64 bg-white shadow-lg border-r border-indigo-200 p-6 space-y-4">
            <h3 class="text-xl font-semibold text-indigo-700 mb-4">📋 Menu Siswa</h3>

            <a href="{{ route('siswa.hasil.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md shadow hover:bg-indigo-100 border border-indigo-200 text-indigo-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>📄 Lihat Hasil Seleksi</span>
            </a>

            <a href="{{ route('siswa.hasil.cetak') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md shadow hover:bg-indigo-100 border border-indigo-200 text-indigo-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11V7m0 8v-2m-6 4h12" />
                </svg>
                <span>🖨️ Cetak Bukti Seleksi</span>
            </a>
            <a href="{{ route('siswa.daftar') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                📝 Lengkapi Data Siswa
            </a>
        </aside>

        <main class="flex-1 p-8">
            <div class="bg-white p-6 rounded-xl shadow border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Halo, {{ Auth::user()->name }}</h3>
                <p class="text-gray-600">Cek hasil seleksi atau cetak bukti dari menu di kiri.</p>
            </div>
        </main>
    </div>
</x-app-layout>