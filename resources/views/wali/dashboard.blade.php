<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-green-700">Dashboard Wali Kelas</h2>
    </x-slot>

    <div class="flex bg-gray-50 min-h-[calc(100vh-4rem)]">
        <aside class="w-64 bg-white shadow-lg border-r border-green-200 p-6 space-y-4">
            <h3 class="text-xl font-semibold text-green-700 mb-4">📋 Menu Wali Kelas</h3>

            <a href="{{ route('wali.nilai.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-md shadow hover:bg-green-100 border border-green-200 text-green-800 font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>📝 Input Nilai Ranking</span>
            </a>
        </aside>

        <main class="flex-1 p-8">
            <div class="bg-white p-6 rounded-xl shadow border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}</h3>
                <p class="text-gray-600">Silakan input nilai ranking siswa yang menjadi tanggung jawab Anda.</p>
            </div>
        </main>
    </div>
</x-app-layout>