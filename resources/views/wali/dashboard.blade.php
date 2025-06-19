<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard Wali Kelas</h2>
    </x-slot>

    <div class="p-6 space-y-4">
        <div class="bg-white shadow rounded-xl p-6">
            <p>Selamat datang, {{ Auth::user()->name }} (Wali Kelas)</p>
        </div>

        <a href="#" class="block bg-blue-100 hover:bg-blue-200 p-4 rounded-xl shadow text-center">
            ✍️ Input Nilai Ranking Akademik
        </a>
    </div>
</x-app-layout>