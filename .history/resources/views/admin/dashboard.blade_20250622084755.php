<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-indigo-700">📊 Dashboard Admin</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Manajemen Siswa --}}
            <a href="{{ route('admin.siswa.index') }}"
                class="flex items-center p-5 bg-white border-l-4 border-blue-500 rounded-lg shadow hover:shadow-lg transition">
                <div class="text-3xl mr-4 text-blue-500">👥</div>
                <div>
                    <div class="font-semibold text-lg">Manajemen Siswa</div>
                    <div class="text-sm text-gray-500">Lihat dan kelola data siswa</div>
                </div>
            </a>

            {{-- Hasil Ranking --}}
            <a href="{{ route('admin.hasil.index') }}"
                class="flex items-center p-5 bg-white border-l-4 border-green-500 rounded-lg shadow hover:shadow-lg transition">
                <div class="text-3xl mr-4 text-green-500">📈</div>
                <div>
                    <div class="font-semibold text-lg">Hasil Ranking</div>
                    <div class="text-sm text-gray-500">Lihat hasil perhitungan AHP</div>
                </div>
            </a>

            {{-- Cetak PDF Ranking --}}
            <a href="{{ route('admin.hasil.cetak') }}"
                class="flex items-center p-5 bg-white border-l-4 border-red-500 rounded-lg shadow hover:shadow-lg transition">
                <div class="text-3xl mr-4 text-red-500">🖨️</div>
                <div>
                    <div class="font-semibold text-lg">Cetak PDF Ranking</div>
                    <div class="text-sm text-gray-500">Unduh laporan hasil seleksi</div>
                </div>
            </a>

        </div>
    </div>
</x-app-layout>