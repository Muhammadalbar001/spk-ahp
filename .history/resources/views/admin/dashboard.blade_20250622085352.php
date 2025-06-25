<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-700">Dashboard Admin</h2>
    </x-slot>

    <div class="flex bg-gray-50 min-h-[calc(100vh-4rem)]">
        <!-- SIDEBAR -->
        <aside class="w-64 bg-white shadow-lg border-r border-blue-200 p-6 space-y-4">
            <h3 class="text-xl font-semibold text-blue-700 mb-4">📋 Menu Admin</h3>

            <!-- Input Kriteria -->
            <a href="{{ route('admin.kriteria.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-blue-50 border border-blue-200 text-blue-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-3-3v6m7-2a9 9 0 11-14-7.36" />
                </svg>
                <span>🎯 Input Kriteria</span>
            </a>

            <!-- Pairwise Matrix -->
            <a href="{{ route('admin.pairwise.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-purple-50 border border-purple-200 text-purple-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h8m-4-4v8" />
                </svg>
                <span>⚖️ Pairwise Matrix</span>
            </a>

            <!-- Proses AHP -->
            <a href="{{ route('admin.pairwise.proses') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-green-50 border border-green-200 text-green-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7H7v6" />
                </svg>
                <span>🧠 Proses AHP (Eigen & CI/CR)</span>
            </a>

            <!-- Manajemen Siswa -->
            <a href="{{ route('admin.siswa.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-yellow-50 border border-yellow-200 text-yellow-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>👨‍🎓 Manajemen Siswa</span>
            </a>

            <!-- Hasil Ranking -->
            <a href="{{ route('admin.hasil.cetak') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-red-50 border border-red-200 text-red-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5h10M6 12h14M4 19h16" />
                </svg>
                <span>🏆 Hasil Ranking</span>
            </a>

            <!-- Cetak Ranking -->
            <a href="{{ url('/admin/hasil-ranking/cetak') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-gray-100 border border-gray-300 text-gray-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11V7m0 8v-2m-6 4h12m-6-7h.01" />
                </svg>
                <span>🖨️ Cetak PDF Ranking</span>
            </a>
        </aside>

        <!-- KONTEN -->
        <main class="flex-1 p-8">
            <div class="bg-white p-6 rounded-xl shadow border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}</h3>
                <p class="text-gray-600">Silakan gunakan menu di samping untuk mengelola data dan proses seleksi.</p>
            </div>
        </main>
    </div>
</x-app-layout>