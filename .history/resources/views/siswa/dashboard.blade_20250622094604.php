<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-indigo-700">🎓 Dashboard Siswa</h2>
    </x-slot>

    <div class="flex bg-gray-50 min-h-[calc(100vh-4rem)]">

        <!-- 🔹 SIDEBAR -->
        <aside class="w-64 bg-white shadow-lg border-r border-indigo-200 p-6 space-y-4">
            <h3 class="text-lg font-semibold text-indigo-700 mb-4">📋 Menu Siswa</h3>

            <!-- Hasil Seleksi -->
            <a href="{{ route('siswa.hasil.index') }}"
                class="block px-4 py-2 rounded-md bg-white shadow hover:bg-indigo-100 border border-indigo-300 text-indigo-800 font-medium transition">
                📊 Lihat Hasil Seleksi
            </a>

            <!-- Cetak Bukti -->
            <a href="{{ route('siswa.hasil.cetak') }}"
                class="block px-4 py-2 rounded-md bg-white shadow hover:bg-green-100 border border-green-300 text-green-800 font-medium transition">
                🖨️ Cetak Bukti Hasil
            </a>

            <!-- Daftar Data Diri -->
            <a href="{{ route('siswa.daftar') }}"
                class="block px-4 py-2 rounded-md bg-white shadow hover:bg-yellow-100 border border-yellow-300 text-yellow-800 font-medium transition">
                ➕ Daftar Data Diri
            </a>
        </aside>

        <!-- 🔸 MAIN CONTENT -->
        <main class="flex-1 p-6 space-y-6">

            {{-- ✅ Pesan sukses --}}
            @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded shadow">
                ✅ {{ session('success') }}
            </div>
            @endif

            {{-- 📌 Sambutan --}}
            <div class="bg-white p-6 rounded shadow border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Halo, {{ Auth::user()->name }} 👋
                </h3>
                <p class="text-gray-600">Silakan gunakan menu di samping untuk mengakses fitur siswa.</p>
            </div>

            {{-- 📋 Tabel Semua Siswa --}}
            <div class="bg-white p-6 rounded shadow border border-gray-200">
                <h4 class="text-md font-semibold text-gray-800 mb-4">📋 Daftar Siswa Terdaftar</h4>

                @if($semuaSiswa->isEmpty())
                <p class="text-gray-500">Belum ada siswa terdaftar.</p>
                @else
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border text-sm">
                        <thead class="bg-indigo-100 text-indigo-800">
                            <tr>
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">NISN</th>
                                <th class="border px-4 py-2">Nama</th>
                                <th class="border px-4 py-2">Jenis Kelamin</th>
                                <th class="border px-4 py-2">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($semuaSiswa as $i => $s)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-2 text-center">{{ $i + 1 }}</td>
                                <td class="border px-4 py-2">{{ $s->nisn }}</td>
                                <td class="border px-4 py-2">{{ $s->nama }}</td>
                                <td class="border px-4 py-2 text-center">
                                    {{ $s->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </td>
                                <td class="border px-4 py-2">{{ $s->alamat }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>

        </main>
    </div>
</x-app-layout>