<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-700">👨‍🎓 Manajemen Siswa</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto bg-white rounded-xl shadow border border-blue-200 p-6 space-y-6">

            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-blue-800">📋 Data Siswa</h3>
                <a href="{{ route('admin.siswa.create') }}"
                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">
                    ➕ Tambah Siswa
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border border-blue-300 table-auto text-sm text-left">
                    <thead class="bg-blue-50 text-blue-800 font-semibold">
                        <tr>
                            <th class="border px-3 py-2">No</th>
                            <th class="border px-3 py-2">NISN</th>
                            <th class="border px-3 py-2">Nama</th>
                            <th class="border px-3 py-2">Jenis Kelamin</th>
                            <th class="border px-3 py-2">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswa as $i => $row)
                        <tr class="hover:bg-blue-50">
                            <td class="border px-3 py-2">{{ $i+1 }}</td>
                            <td class="border px-3 py-2">{{ $row->nisn }}</td>
                            <td class="border px-3 py-2">{{ $row->nama }}</td>
                            <td class="border px-3 py-2">{{ $row->jenis_kelamin }}</td>
                            <td class="border px-3 py-2">{{ $row->alamat }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center border px-3 py-4 text-gray-500 italic">
                                Belum ada data siswa.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>