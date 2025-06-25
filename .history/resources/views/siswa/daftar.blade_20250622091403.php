<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-indigo-700">📝 Formulir Pendaftaran Siswa</h2>
    </x-slot>

    <div class="max-w-xl mx-auto bg-white mt-6 p-6 rounded-xl shadow border border-indigo-100">
        @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('siswa.daftar.store') }}" class="space-y-4">
            @csrf

            <!-- NISN -->
            <div>
                <label for="nisn" class="block text-sm font-semibold text-gray-700">NISN</label>
                <input type="text" name="nisn" id="nisn"
                    class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('nisn') }}" required>
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-700">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin"
                    class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required>
                    <option value="" disabled selected>-- Pilih --</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3"
                    class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required>{{ old('alamat') }}</textarea>
            </div>

            <!-- Tombol -->
            <div class="text-right pt-2">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                    💾 Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>