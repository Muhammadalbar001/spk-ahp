<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-indigo-700">🎓 Dashboard Siswa</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen space-y-6">

        {{-- Notifikasi Sukses --}}
        @if (session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded shadow">
            ✅ {{ session('success') }}
        </div>
        @endif

        {{-- Selamat Datang --}}
        <div class="bg-white p-6 rounded shadow border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                Halo, {{ Auth::user()->name }} 👋
            </h3>
            <p class="text-gray-600">
                Selamat datang di dashboard siswa. Silakan cek data pendaftaran dan hasil seleksi Anda.
            </p>
        </div>

        {{-- Tombol Daftar (jika belum isi data diri) --}}
        @if (!$siswa)
        <div class="text-center">
            <a href="{{ route('siswa.daftar') }}"
                class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded shadow transition">
                ➕ Daftar Data Diri
            </a>
        </div>
        @endif

        {{-- Tabel Semua Siswa Terdaftar --}}
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

    </div>
</x-app-layout>