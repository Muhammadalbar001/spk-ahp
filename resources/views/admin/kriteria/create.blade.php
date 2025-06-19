<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Tambah Kriteria AHP</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('admin.kriteria.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="kode">Kode Kriteria (misal: TF)</label>
                <input type="text" name="kode" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label for="nama">Nama Kriteria</label>
                <input type="text" name="nama" class="w-full border p-2 rounded" required>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>