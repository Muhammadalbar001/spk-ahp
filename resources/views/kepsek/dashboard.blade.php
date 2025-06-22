<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-red-700">Dashboard Kepala Sekolah</h2>
    </x-slot>

    <div class="flex bg-gray-50 min-h-[calc(100vh-4rem)]">
        <aside class="w-64 bg-white shadow-lg border-r border-red-200 p-6 space-y-4">
            <h3 class="text-xl font-semibold text-red-700 mb-4">📋 Menu Kepala Sekolah</h3>

            <a href="{{ route('kepsek.hasil.index') }}"
                class="flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded shadow transition">
                🏆 Lihat Hasil Seleksi
            </a>

            <a href="{{ url('/admin/hasil-ranking/cetak') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md shadow hover:bg-gray-100 border border-gray-300 text-gray-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11V7m0 8v-2m-6 4h12" />
                </svg>
                <span>🖨️ Cetak Laporan</span>
            </a>
        </aside>

        <main class="flex-1 p-8">
            <div class="bg-white p-6 rounded-xl shadow border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}</h3>
                <p class="text-gray-600">Akses laporan seleksi dari menu di samping.</p>
            </div>
        </main>
    </div>
</x-app-layout>