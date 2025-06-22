<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-pink-700">Dashboard Penyeleksi</h2>
    </x-slot>

    <div class="flex bg-gray-50 min-h-[calc(100vh-4rem)]">
        <aside class="w-64 bg-white shadow-lg border-r border-pink-200 p-6 space-y-4">
            <h3 class="text-xl font-semibold text-pink-700 mb-4">📋 Menu Penyeleksi</h3>

            <a href="{{ route('penyeleksi.nilai.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md shadow hover:bg-pink-100 border border-pink-200 text-pink-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <span>📝 Input Nilai (Wawancara, PI, PA, Kesenian)</span>
            </a>
        </aside>

        <main class="flex-1 p-8">
            <div class="bg-white p-6 rounded-xl shadow border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}</h3>
                <p class="text-gray-600">Silakan input seluruh nilai yang menjadi tanggung jawab Anda.</p>
            </div>
        </main>
    </div>
</x-app-layout>