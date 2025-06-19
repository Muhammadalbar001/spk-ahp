<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard Siswa</h2>
    </x-slot>

    <div class="p-6 space-y-4">
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold mb-2">Halo, {{ Auth::user()->name }}</h3>
            <p class="text-sm text-gray-600">Anda login sebagai <strong>Siswa</strong></p>
        </div>

        <div class="space-y-2">
            <a href="#" class="block bg-yellow-100 hover:bg-yellow-200 p-4 rounded-xl shadow text-center">📝 Form Pendaftaran</a>
            <a href="#" class="block bg-indigo-100 hover:bg-indigo-200 p-4 rounded-xl shadow text-center">📄 Hasil Seleksi</a>
        </div>
    </div>
</x-app-layout>