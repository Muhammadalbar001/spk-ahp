<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-700">⚖️ Pairwise Matrix Kriteria</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto bg-white shadow rounded-xl border border-blue-200 p-6 space-y-6">

            @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded border border-green-200 shadow">
                ✅ {{ session('success') }}
            </div>
            @endif

            {{-- Tabel Bantuan Skala AHP --}}
            <div class="text-sm text-gray-700 bg-blue-50 border border-blue-200 rounded p-4 shadow-sm">
                <h3 class="font-semibold text-blue-700 mb-2">ℹ️ Skala Perbandingan AHP:</h3>
                <ul class="list-disc ml-5 space-y-1">
                    <li><strong>1</strong> – Sama penting</li>
                    <li><strong>3</strong> – Cukup lebih penting</li>
                    <li><strong>5</strong> – Lebih penting</li>
                    <li><strong>7</strong> – Jauh lebih penting</li>
                    <li><strong>9</strong> – Mutlak lebih penting</li>
                    <li><strong>2, 4, 6, 8</strong> – Nilai di antara skala di atas</li>
                </ul>
                <p class="mt-2">💡 Nilai <strong>1</strong> otomatis pada diagonal. Nilai sebaliknya (invers) akan
                    dihitung otomatis.</p>
            </div>

            {{-- Form Pairwise --}}
            <form action="{{ route('admin.pairwise.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-blue-300 table-auto">
                        <thead class="bg-blue-50 text-blue-800 font-semibold">
                            <tr>
                                <th class="border px-3 py-2">Kriteria</th>
                                @foreach($kriteria as $k)
                                <th class="border px-3 py-2 text-center">{{ $k->kode }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kriteria as $row)
                            <tr class="hover:bg-blue-50">
                                <th class="border px-3 py-2 bg-blue-50 text-blue-800">{{ $row->kode }}</th>
                                @foreach($kriteria as $col)
                                <td class="border px-2 py-2 text-center">
                                    @if ($row->id === $col->id)
                                    <span class="text-gray-600 font-semibold">1</span>
                                    @elseif ($row->id < $col->id)
                                        <input type="number" name="nilai[{{ $row->id }}][{{ $col->id }}]" min="1"
                                            max="9" step="0.01" value="{{ old("nilai[$row->id][$col->id]") }}"
                                            title="Nilai antara 1 (setara) sampai 9 (sangat penting)"
                                            class="w-20 border-blue-300 text-center rounded shadow-sm focus:ring focus:ring-blue-200">
                                        @else
                                        @php
                                        $val = old("nilai[$col->id][$row->id]");
                                        $inv = $val ? number_format(1 / floatval($val), 3) : '-';
                                        @endphp
                                        <span class="text-gray-400 italic"
                                            title="Invers dari nilai di atas">{{ $inv }}</span>
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