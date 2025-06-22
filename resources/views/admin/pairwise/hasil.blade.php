<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-700">📊 Hasil Perhitungan AHP</h2>
    </x-slot>

    <div class="p-6 space-y-8 bg-gray-50 min-h-screen">
        <a href="{{ route('admin.pairwise.index') }}"
            class="inline-block mb-4 text-blue-600 hover:underline transition">← Kembali ke Input Pairwise</a>

        {{-- Matriks Pairwise --}}
        <div class="bg-white rounded-xl shadow border border-blue-200 p-6">
            <h3 class="text-lg font-semibold text-blue-800 mb-4">📐 Matriks Perbandingan Berpasangan</h3>
            <div class="overflow-x-auto">
                <table class="w-full border border-blue-300 table-auto text-sm text-center">
                    <thead class="bg-blue-50 text-blue-700 font-semibold">
                        <tr>
                            <th class="border px-3 py-2">Kriteria</th>
                            @foreach($kriteria as $k)
                            <th class="border px-3 py-2">{{ $k->kode }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kriteria as $i)
                        <tr class="hover:bg-blue-50">
                            <th class="border px-3 py-2 bg-blue-50">{{ $i->kode }}</th>
                            @foreach($kriteria as $j)
                            <td class="border px-3 py-2">{{ number_format($matrix[$i->id][$j->id], 3) }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Normalisasi --}}
        <div class="bg-white rounded-xl shadow border border-blue-200 p-6">
            <h3 class="text-lg font-semibold text-blue-800 mb-4">📏 Matriks Normalisasi dan Bobot</h3>
            <div class="overflow-x-auto">
                <table class="w-full border border-blue-300 table-auto text-sm text-center">
                    <thead class="bg-blue-50 text-blue-700 font-semibold">
                        <tr>
                            <th class="border px-3 py-2">Kriteria</th>
                            @foreach($kriteria as $k)
                            <th class="border px-3 py-2">{{ $k->kode }}</th>
                            @endforeach
                            <th class="border px-3 py-2">Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kriteria as $i)
                        <tr class="hover:bg-blue-50">
                            <th class="border px-3 py-2 bg-blue-50">{{ $i->kode }}</th>
                            @foreach($kriteria as $j)
                            <td class="border px-3 py-2">{{ number_format($normal[$i->id][$j->id], 3) }}</td>
                            @endforeach
                            <td class="border px-3 py-2 font-bold text-green-700">
                                {{ number_format($eigen[$i->id], 4) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- CI / CR --}}
        <div class="bg-white rounded-xl shadow border border-blue-200 p-6 space-y-2">
            <h3 class="text-lg font-semibold text-blue-800 mb-2">🧮 Nilai Konsistensi</h3>
            <p><strong>λ<sub>max</sub></strong>: {{ number_format($lambda_max, 4) }}</p>
            <p><strong>CI</strong>: {{ number_format($ci, 4) }}</p>
            <p>
                <strong>CR</strong>: {{ number_format($cr, 4) }}
                @if($cr < 0.1) <span class="text-green-600 font-bold">(KONSISTEN)</span>
                    @else
                    <span class="text-red-600 font-bold">(TIDAK KONSISTEN)</span>
                    @endif
            </p>
        </div>
    </div>
</x-app-layout>