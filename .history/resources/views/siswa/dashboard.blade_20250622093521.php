<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Dashboard Siswa
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-blue-700 mb-4">Halo, {{ Auth::user()->name }}</h3>
                <p class="text-gray-600 mb-6">Cek hasil seleksi atau cetak bukti dari menu di kiri.</p>

                @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Daftar Siswa Terdaftar -->
                <div class="mt-8">
                    <h4 class="text-md font-bold text-blue-600 mb-2">📋 Daftar Siswa Terdaftar</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium">No</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium">Nama</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium">NISN</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium">Jenis Kelamin</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium">Alamat</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($semuaSiswa as $index => $item)
                                <tr>
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $item->nama }}</td>
                                    <td class="px-4 py-2">{{ $item->nisn }}</td>
                                    <td class="px-4 py-2">{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </td>
                                    <td class="px-4 py-2">{{ $item->alamat }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>