<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Tambah Siswa</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('admin.siswa.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border p-2 rounded">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="w-full border p-2 rounded" required></textarea>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>