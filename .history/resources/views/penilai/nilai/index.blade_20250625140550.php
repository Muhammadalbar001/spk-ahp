<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-700">📝 Input Nilai Siswa</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen space-y-10">

        @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-md border border-green-300 shadow-sm">
            ✅ {{ session('success') }}
        </div>
        @endif

        {{-- 🔧 Form Input Nilai --}}
        <div class="bg-white border border-blue-200 shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-blue-800 mb-4">📥 Formulir Pengisian Nilai</h3>

            <form action="{{ route($routePrefix . '.nilai.store') }}" method="POST">
                @csrf

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-blue-300 table-auto">
                        <thead class="bg-blue-50 text-blue-800 font-semibold">
                            <tr>
                                <th class="border px-3 py-2 text-left">Nama Siswa</th>
                                @foreach($kriteria as $k)
                                <th class="border p-2 text-center">
                                    <div class="font-bold text-sm text-indigo-700">{{ $k->kode }}</div>
                                    <div class="text-xs text-gray-500 italic">{{ $k->nama }}</div>
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswa as $s)
                            <tr class="hover:bg-blue-50">
                                <td class="border px-3 py-2">{{ $s->nama }}</td>
                                @foreach($kriteria as $k)
                                @php
                                $existing = $nilai->firstWhere(fn($n) =>
                                $n->siswa_id == $s->id &&
                                $n->kriteria_id == $k->id &&
                                $n->user_id == Auth::id()
                                );
                                @endphp
                                <td class="border px-2 py-2 text-center">
                                    <input type="number" step="0.01" min="0" max="100"
                                        name="nilai[{{ $s->id }}][{{ $k->id }}]" value="{{ $existing->nilai ?? '' }}"
                                        class="w-20 border-blue-300 rounded px-2 py-1 text-center focus:outline-none focus:ring focus:ring-blue-300">
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-right">
                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow transition">
                        💾 Simpan Nilai
                    </button>
                </div>
            </form>
        </div>

        {{-- 🔍 Rekap Semua Nilai --}}
        <div class="bg-white border border-gray-300 shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">📊 Rekap Nilai Semua Kriteria</h3>

            <div class="overflow-x-auto">
                <table class="w-full text-sm border border-gray-300 table-auto">
                    <thead class="bg-gray-100 text-gray-800 font-semibold">
                        <tr>
                            <th class="border px-3 py-2 text-left">Nama Siswa</th>
                            @foreach(\App\Models\Kriteria::all() as $k)
                            <th class="border px-3 py-2 text-center">{{ $k->kode }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $s)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-3 py-2">{{ $s->nama }}</td>
                            @foreach(\App\Models\Kriteria::all() as $k)
                            @php
                            $nilaiFix = $nilai->firstWhere(fn($n) =>
                            $n->siswa_id == $s->id &&
                            $n->kriteria_id == $k->id
                            );
                            @endphp
                            <td class="border px-2 py-2 text-center">
                                {{ $nilaiFix->nilai ?? '-' }}
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>