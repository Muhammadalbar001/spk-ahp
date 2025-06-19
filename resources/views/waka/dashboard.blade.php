<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard Waka Kesiswaan</h2>
    </x-slot>

    <div class="p-6 space-y-4">
        <div class="bg-white shadow rounded-xl p-6">
            <p>Halo, {{ Auth::user()->name }} (Waka Kesiswaan)</p>
        </div>

        <a href="#" class="block bg-green-100 hover:bg-green-200 p-4 rounded-xl shadow text-center">
            ✍️ Input Nilai Kepribadian
        </a>
    </div>
</x-app-layout>