<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-indigo-700">📝 Input Nilai Siswa (Admin)</h2>
    </x-slot>

    <div class="p-6 space-y-6">
        {{-- ✅ Notifikasi berhasil --}}
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded shadow">
            {{ session('success') }}
        </div>
        @endif

        {{-- 🔧 Form Input --}}
        <form action="{{ route('admin.nilai.store') }}" method="POST">
            @csrf

            <div class="overflow-auto rounded-lg border border-gray-200">
                <table class="min-w-full text-sm text-center divide-y divide-gray-200">
                    <thead class="bg-indigo-50 text-indigo-700">
                        <tr>
                            <th class="p-2 border">Nama Siswa</th>
                            @foreach($kriteria as $k)
                            <th class="p-2 border">{{ $k->kode }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white text-gray-700">
                        @foreach($siswa as $s)
                        <tr>
                            <td class="border p-2 text-left px-4">{{ $s->nama }}</td>
                            @foreach($kriteria as $k)
                            @php
                            $existing = $nilai->firstWhere(fn($n) =>
                            $n->siswa_id == $s->id &&
                            $n->kriteria_id == $k->id &&
                            $n->user_id == Auth::id()
                            );
                            @endphp
                            <td class="border p-2">
                                <input type="number" step="0.01" min="0" max="100"
                                    name="nilai[{{ $s->id }}][{{ $k->id }}]" value="{{ $existing->nilai ?? '' }}"
                                    class="w-20 text-center border rounded">
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pt-6 text-right">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded shadow">
                    💾 Simpan Nilai
                </button>
            </div>
        </form>

        {{-- 🔍 Rekap Nilai --}}
        <div class="pt-10">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">📊 Rekap Nilai Semua Penilai</h3>
            <div class="overflow-auto border rounded">
                <table class="min-w-full text-sm text-center divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 border">Nama Siswa</th>
                            @foreach(\App\Models\Kriteria::all() as $k)
                            <th class="p-2 border">{{ $k->kode }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($siswa as $s)
                        <tr>
                            <td class="border p-2 text-left px-4">{{ $s->nama }}</td>
                            @foreach(\App\Models\Kriteria::all() as $k)
                            @php
                            $nilaiFix = $nilai->firstWhere(fn($n) =>
                            $n->siswa_id == $s->id &&
                            $n->kriteria_id == $k->id
                            );
                            @endphp
                            <td class="border p-2">
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