<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-700">Dashboard Admin</h2>
    </x-slot>

    <div class="flex bg-gray-50 min-h-[calc(100vh-4rem)]">
        <!-- SIDEBAR -->
        <aside class="w-64 bg-white shadow-lg border-r border-blue-200 p-6 space-y-4">
            <h3 class="text-xl font-semibold text-blue-700 mb-4">📋 Menu Admin</h3>

            @php
            $menus = [
            ['label' => '🎯 Input Kriteria', 'route' => 'admin.kriteria.index', 'color' => 'blue'],
            ['label' => '⚖️ Pairwise Matrix', 'route' => 'admin.pairwise.index', 'color' => 'purple'],
            ['label' => '🧠 Proses AHP (Eigen & CI/CR)', 'route' => 'admin.pairwise.proses', 'color' => 'green'],
            ['label' => '👨‍🎓 Manajemen Siswa', 'route' => 'admin.siswa.index', 'color' => 'yellow'],
            ['label' => '🏆 Hasil Ranking', 'route' => 'admin.hasil.index', 'color' => 'red'],
            ['label' => '🖨️ Cetak PDF Ranking', 'route' => 'admin.hasil.cetak', 'color' => 'gray'],
            ['label' => '📝 Input Nilai Siswa', 'route' => 'admin.nilai.index', 'color' => 'indigo'],
            ];
            @endphp

            @foreach($menus as $menu)
            <a href="{{ route($menu['route']) }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md bg-white shadow hover:bg-{{ $menu['color'] }}-50 border border-{{ $menu['color'] }}-200 text-{{ $menu['color'] }}-800 font-medium transition">
                {!! $menu['label'] !!}
            </a>
            @endforeach

            <!-- 🔁 RESET DATA -->
            <div class="mt-8 space-y-3">
                <h4 class="text-sm font-semibold text-gray-600 uppercase tracking-wider mb-2">
                    🔄 Reset Data Seleksi
                </h4>

                <!-- Reset Pairwise -->
                <form action="{{ route('admin.reset.pairwise') }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus seluruh data pairwise dan reset bobot kriteria?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="flex items-center gap-2 w-full text-left px-4 py-2 bg-yellow-50 text-yellow-800 hover:bg-yellow-100 rounded-md text-sm transition">
                        🔄 Reset Pairwise Kriteria
                    </button>
                </form>

                <!-- Reset Nilai Siswa -->
                <form action="{{ route('admin.reset.nilai') }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus semua nilai siswa?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="flex items-center gap-2 w-full text-left px-4 py-2 bg-orange-50 text-orange-800 hover:bg-orange-100 rounded-md text-sm transition">
                        🧹 Reset Nilai Siswa
                    </button>
                </form>

                <!-- Reset Hasil AHP -->
                <form action="{{ route('admin.reset.hasil') }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus hasil ranking AHP?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="flex items-center gap-2 w-full text-left px-4 py-2 bg-red-50 text-red-800 hover:bg-red-100 rounded-md text-sm transition">
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
                <p class="text-gray-600">Silakan gunakan menu di samping untuk mengelola data dan proses seleksi
                    pertukaran pelajar.</p>
            </div>
        </main>
    </div>
</x-app-layout>