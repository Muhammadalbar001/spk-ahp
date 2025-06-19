<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard Guru Penyeleksi</h2>
    </x-slot>

    <div class="p-6 space-y-4">
        <div class="bg-white shadow rounded-xl p-6">
            <p>Selamat datang, {{ Auth::user()->name }} (Guru Penyeleksi)</p>
        </div>

        <a href="#" class="block bg-purple-100 hover:bg-purple-200 p-4 rounded-xl shadow text-center">
            ✍️ Input Nilai Wawancara, PI, PA, dan Kesenian
        </a>
    </div>
</x-app-layout>