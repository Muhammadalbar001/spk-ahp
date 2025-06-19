<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Hasil Perhitungan AHP</h2>
    </x-slot>

    <div class="p-6 space-y-6">
        <a href="{{ route('admin.pairwise.index') }}" class="text-blue-600 underline">← Kembali ke Input Pairwise</a>

        {{-- Matriks Pairwise --}}
        <div>
            <h3 class="font-semibold mb-2">Matriks Perbandingan Berpasangan</h3>
            <table class="table-auto border w-full">
                <thead>
                    <tr>
                        <th class="border p-2">Kriteria</th>
                        @foreach($kriteria as $k)
                        <th class="border p-2">{{ $k->kode }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($kriteria as $i)
                    <tr>
                        <th class="border p-2">{{ $i->kode }}</th>
                        @foreach($kriteria as $j)
                        <td class="border p-2 text-center">{{ number_format($matrix[$i->id][$j->id], 3) }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Normalisasi --}}
        <div>
            <h3 class="font-semibold mt-6 mb-2">Matriks Normalisasi</h3>
            <table class="table-auto border w-full">
                <thead>
                    <tr>
                        <th class="border p-2">Kriteria</th>
                        @foreach($kriteria as $k)
                        <th class="border p-2">{{ $k->kode }}</th>
                        @endforeach
                        <th class="border p-2">Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kriteria as $i)
                    <tr>
                        <th class="border p-2">{{ $i->kode }}</th>
                        @foreach($kriteria as $j)
                        <td class="border p-2 text-center">{{ number_format($normal[$i->id][$j->id], 3) }}</td>
                        @endforeach
                        <td class="border p-2 text-green-600 text-center font-bold">
                            {{ number_format($eigen[$i->id], 4) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- CI/CR --}}
        <div class="mt-4 bg-white shadow p-4 rounded">
            <p><strong>λ<sub>max</sub></strong> = {{ number_format($lambda_max, 4) }}</p>
            <p><strong>CI</strong> = {{ number_format($ci, 4) }}</p>
            <p><strong>CR</strong> = {{ number_format($cr, 4) }}
                @if($cr < 0.1) <span class="text-green-600 font-bold">(KONSISTEN)</span>
                    @else
                    <span class="text-red-600 font-bold">(TIDAK KONSISTEN)</span>
                    @endif
            </p>
        </div>
    </div>
</x-app-layout>