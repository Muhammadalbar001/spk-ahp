<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-700">🎯 Data Kriteria AHP</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white shadow rounded-xl border border-blue-200 p-6 space-y-6">

            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-blue-800">📌 Daftar Kriteria</h3>
                <a href="{{ route('admin.kriteria.create') }}"
                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow transition">
                    ➕ Tambah Kriteria
                </a>
            </div>

            <table class="w-full table-auto border border-blue-200 text-sm text-left">
                <thead class="bg-blue-50 text-blue-800 font-semibold">
                    <tr>
                        <th class="border px-3 py-2">No</th>
                        <th class="border px-3 py-2">Kode</th>
                        <th class="border px-3 py-2">Nama</th>
                        <th class="border px-3 py-2">Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kriteria as $i => $row)
                    <tr class="hover:bg-blue-50">
                        <td class="border px-3 py-2">{{ $i+1 }}</td>
                        <td class="border px-3 py-2">{{ $row->kode }}</td>
                        <td class="border px-3 py-2">{{ $row->nama }}</td>
                        <td class="border px-3 py-2 text-center">{{ $row->bobot ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center border px-3 py-4 text-gray-500 italic">Belum ada data
                            kriteria.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>