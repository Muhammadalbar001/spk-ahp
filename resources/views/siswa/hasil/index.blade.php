<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-indigo-700">📄 Hasil Seleksi Pertukaran Pelajar</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow border border-indigo-200 p-6 space-y-6">

            @if($hasil)
            <div class="space-y-2 text-gray-800">
                <p>👤 Nama: <strong class="text-indigo-800">{{ $siswa->nama }}</strong></p>
                <p>📊 Skor Akhir: <strong>{{ number_format($hasil->skor_akhir, 4) }}</strong></p>
                <p>🏅 Ranking: <strong>#{{ $hasil->ranking }}</strong></p>
                <p>Status:
                    @if($hasil->ranking <= 2) <span class="text-green-600 font-bold">✅ LOLOS</span>
                        @else
                        <span class="text-red-600 font-bold">❌ TIDAK LOLOS</span>
                        @endif
                </p>
            </div>

            <div class="pt-4">
                <a href="{{ route('siswa.hasil.cetak') }}"
                    class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded shadow transition">
                    🖨️ Cetak Bukti Hasil
                </a>
            </div>
            @else
            <div class="text-center text-red-600 font-semibold">
                ❌ Belum ada hasil seleksi tersedia untuk Anda.
            </div>
            @endif

        </div>
    </div>
</x-app-layout>