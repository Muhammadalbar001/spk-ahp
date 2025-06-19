<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard Admin</h2>
    </x-slot>

    <div class="p-6 space-y-4">
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold mb-2">Selamat Datang, {{ Auth::user()->name }}</h3>
            <p class="text-sm text-gray-600">Anda login sebagai <strong>Admin</strong></p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <a href="#" class="bg-blue-100 hover:bg-blue-200 p-4 rounded-xl text-center shadow">📁 Manajemen Siswa</a>
            <a href="#" class="bg-green-100 hover:bg-green-200 p-4 rounded-xl text-center shadow">📊 Input Pairwise</a>
            <a href="#" class="bg-purple-100 hover:bg-purple-200 p-4 rounded-xl text-center shadow">🧠 Hasil AHP</a>
            <a href="#" class="bg-red-100 hover:bg-red-200 p-4 rounded-xl text-center shadow">🖨️ Cetak Hasil</a>
        </div>
    </div>
</x-app-layout>