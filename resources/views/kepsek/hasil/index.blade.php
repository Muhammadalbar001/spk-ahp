<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-red-700">📊 Hasil Seleksi Pertukaran Pelajar</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="bg-white rounded-xl shadow border border-red-200 p-6 space-y-6">
            <table class="w-full border border-gray-300 table-auto">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="border px-3 py-2">Ranking</th>
                        <th class="border px-3 py-2">Nama Siswa</th>
                        <th class="border px-3 py-2">Skor Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hasilFix as $row)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-3 py-2">{{ $row->ranking }}</td>
                            <td class="border px-3 py-2">{{ $row->siswa->nama }}</td>
                            <td class="border px-3 py-2">{{ number_format($row->skor_akhir, 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
