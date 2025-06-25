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
                🎯 Input Kriteria
            </a>

            <!-- Pairwise Matrix -->
            <a href="{{ route('admin.pairwise.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-purple-50 border border-purple-200 text-purple-800 font-medium transition">
                ⚖️ Pairwise Matrix
            </a>

            <!-- Proses AHP -->
            <a href="{{ route('admin.pairwise.proses') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-green-50 border border-green-200 text-green-800 font-medium transition">
                🧠 Proses AHP (Eigen & CI/CR)
            </a>

            <!-- Manajemen Siswa -->
            <a href="{{ route('admin.siswa.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-yellow-50 border border-yellow-200 text-yellow-800 font-medium transition">
                👨‍🎓 Manajemen Siswa
            </a>

            <!-- Hasil Ranking -->
            <a href="{{ route('admin.hasil.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-red-50 border border-red-200 text-red-800 font-medium transition">
                🏆 Hasil Ranking
            </a>

            <!-- Cetak Ranking -->
            <a href="{{ route('admin.hasil.cetak') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-gray-100 border border-gray-300 text-gray-800 font-medium transition">
                🖨️ Cetak PDF Ranking
            </a>
            <a href="{{ route('admin.nilai.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-indigo-50 border border-indigo-200 text-indigo-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>📝 Input Nilai Siswa</span>
            </a>
            <!-- RESET DATA -->
            <div class="mt-6 space-y-2">
                <h4 class="text-sm text-gray-600 font-semibold">🔁 Reset Data</h4>

                <!-- Reset Pairwise -->
                <form action="{{ route('admin.reset.pairwise') }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus seluruh data pairwise?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="block w-full text-left text-sm px-4 py-2 rounded-md bg-yellow-100 text-yellow-800 hover:bg-yellow-200 transition">
                        🔄 Reset Pairwise Kriteria
                    </button>
                </form>

                <!-- Reset Nilai Siswa -->
                <form action="{{ route('admin.reset.nilai') }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus semua nilai siswa?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="block w-full text-left text-sm px-4 py-2 rounded-md bg-orange-100 text-orange-800 hover:bg-orange-200 transition">
                        🧹 Reset Nilai Siswa
                    </button>
                </form>

                <!-- Reset Hasil AHP -->
                <form action="{{ route('admin.reset.hasil') }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus hasil ranking AHP?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="block w-full text-left text-sm px-4 py-2 rounded-md bg-red-100 text-red-800 hover:bg-red-200 transition">
                        ❌ Reset Hasil AHP
                    </button>
                </form>
            </div>
        </aside>

        <!-- KONTEN UTAMA -->
        <main class="flex-1 p-8">
            @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded shadow mb-4">
                ✅ {{ session('success') }}
            </div>
            @endif

            <div class="bg-white p-6 rounded-xl shadow border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}</h3>
                <p class="text-gray-600">Silakan gunakan menu di samping untuk mengelola data dan proses seleksi pertukaran pelajar.</p>
            </div>
        </main>
    </div>
</x-app-layout>
