<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-700">⚖️ Pairwise Matrix Kriteria</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto bg-white shadow rounded-xl border border-blue-200 p-6 space-y-6">

            @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded border border-green-200 shadow">
                ✅ {{ session('success') }}
            </div>
            @endif

            {{-- 💡 Tooltip Skala Bantuan --}}
            <div class="bg-blue-100 text-blue-900 text-sm p-4 rounded border border-blue-200">
                <strong>🧠 Petunjuk Skala AHP (1–9):</strong>
                <ul class="list-disc list-inside mt-2 space-y-1">
                    <li>1 = Kedua kriteria sama penting</li>
                    <li>3 = Sedikit lebih penting</li>
                    <li>5 = Jelas lebih penting</li>
                    <li>7 = Sangat lebih penting</li>
                    <li>9 = Mutlak lebih penting</li>
                    <li>2, 4, 6, 8 = Nilai antara dua pilihan</li>
                </ul>
            </div>

            <form action="{{ route('admin.pairwise.store') }}" method="POST" class="space-y-6 mt-4">
                @csrf

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-blue-300 table-auto">
                        <thead class="bg-blue-50 text-blue-800 font-semibold">
                            <tr>
                                <th class="border px-3 py-2">Kriteria</th>
                                @foreach($kriteria as $k)
                                <th class="border px-3 py-2 text-center">
                                    {{ $k->kode }}
                                    <div class="text-xs text-gray-500 font-normal">{{ $k->nama }}</div>
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kriteria as $row)
                            <tr class="hover:bg-blue-50">
                                <th class="border px-3 py-2 bg-blue-50 text-blue-800 text-left">
                                    {{ $row->kode }}
                                    <div class="text-xs text-gray-500 font-normal">{{ $row->nama }}</div>
                                </th>
                                @foreach($kriteria as $col)
                                <td class="border px-2 py-2 text-center">
                                    @if ($row->id === $col->id)
                                    <span class="text-gray-600 font-semibold">1</span>
                                    @elseif ($row->id < $col->id)
                                        <input type="number" name="nilai[{{ $row->id }}][{{ $col->id }}]" min="1"
                                            max="9" step="0.01" value="{{ old("nilai[$row->id][$col->id]") }}"
                                            class="w-20 border-blue-300 text-center rounded shadow-sm focus:ring focus:ring-blue-200"
                                            title="Masukkan nilai preferensi AHP (1–9)">
                                        @else
                                        @php
                                        $val = old("nilai[$col->id][$row->id]");
                                        $inv = $val ? number_format(1 / floatval($val), 3) : '-';
                                        @endphp
                                        <span class="text-gray-400 italic">{{ $inv }}</span>
                                        @endif
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow transition">
                        💾 Simpan Matrix
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>