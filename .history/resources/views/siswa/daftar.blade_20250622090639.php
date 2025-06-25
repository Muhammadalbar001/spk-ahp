<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-indigo-700">📝 Daftar Data Diri Siswa</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-6 bg-white shadow rounded-lg mt-6">
        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('siswa.daftar.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" value="{{ Auth::user()->name }}" readonly class="w-full border rounded p-2 bg-gray-100">
            </div>

            <div>
                <label class="block font-medium text-gray-700">NISN</label>
                <input type="text" name="nisn" required class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium text-gray-700">Jenis Kelamin</label>
                <select name="jenis_kelamin" required class="w-full border rounded p-2">
                    <option value="">Pilih</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" rows="3" required class="w-full border rounded p-2"></textarea>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
