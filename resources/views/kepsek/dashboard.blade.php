<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard Kepala Sekolah</h2>
    </x-slot>

    <div class="p-6 space-y-4">
        <div class="bg-white shadow rounded-xl p-6">
            <p>Halo, {{ Auth::user()->name }} (Kepala Sekolah)</p>
        </div>

        <a href="#" class="block bg-red-100 hover:bg-red-200 p-4 rounded-xl shadow text-center">
            📊 Laporan Hasil Seleksi
        </a>
    </div>
</x-app-layout>