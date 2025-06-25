<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-indigo-700">📝 Input Nilai Siswa</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow border border-indigo-200 p-6 space-y-6">

            {{-- Alert Success --}}
            @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded border border-green-200 shadow">
                ✅ {{ session('success') }}
            </div>
            @endif

            {{-- Form Input Nilai --}}
            <form action="{{ route($routePrefix . '.nilai.store') }}" method="POST">
                @csrf

                <table class="table-auto w-full border text-sm">
                    <thead class="bg-indigo-100 text-indigo-800 font-semibold">
                        <tr>
                            <th class="border p-2">Nama Siswa</th>
                            @foreach($kriteria as $k)
                            <th class="border p-2 text-center">
                                {{ $k->kode }}<br>
                                <span class="text-xs text-gray-500">{{ $k->nama }}</span>
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $s)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-2 font-medium text-gray-700">{{ $s->nama }}</td>
                            @foreach($kriteria as $k)
                            @php
                            $nilaiLama = $nilai->firstWhere(fn($n) =>
                            $n->siswa_id == $s->id &&
                            $n->kriteria_id == $k->id &&
                            $n->user_id == Auth::id()
                            );
                            @endphp
                            <td class="border p-2 text-center">
                                <input type="number" step="0.01" min="0" max="100"
                                    name="nilai[{{ $s->id }}][{{ $k->id }}]" value="{{ $nilaiLama->nilai ?? '' }}"
                                    class="w-20 border rounded text-center focus:ring focus:ring-indigo-200">
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-right mt-6">
                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2 rounded shadow transition">
                        💾 Simpan Nilai
                    </button>
                </div>
            </form>

            {{-- Rekap Semua Nilai (Opsional) --}}
            <div class="pt-10">
                <h3 class="text-lg font-bold text-gray-800 mb-3">📊 Rekap Nilai Semua Kriteria</h3>
                <table class="table-auto w-full border text-sm">
                    <thead class="bg-gray-100 text-gray-800 font-semibold">
                        <tr>
                            <th class="border p-2">Nama Siswa</th>
                            @foreach(\App\Models\Kriteria::all() as $k)
                            <th class="border p-2 text-center">{{ $k->kode }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $s)
                        <tr>
                            <td class="border p-2">{{ $s->nama }}</td>
                            @foreach(\App\Models\Kriteria::all() as $k)
                            @php
                            $fix = $nilai->firstWhere(fn($n) =>
                            $n->siswa_id == $s->id &&
                            $n->kriteria_id == $k->id
                            );
                            @endphp
                            <td class="border p-2 text-center">{{ $fix->nilai ?? '-' }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>