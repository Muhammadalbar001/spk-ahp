<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-indigo-700">📝 Formulir Pendaftaran Siswa</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-8 bg-white p-6 rounded-xl shadow border border-gray-200">
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('siswa.daftar.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- NISN --}}
            <div>
                <label for="nisn" class="block text-sm font-semibold text-gray-700">NISN</label>
                <input type="text" name="nisn" id="nisn" required
                    class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('nisn') }}">
            </div>

            {{-- Nama --}}
            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" required
                    class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('nama') }}">
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-700">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required
                    class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>-- Pilih --</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            {{-- Alamat --}}
            <div>
                <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" required
                    class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('alamat') }}</textarea>
            </div>

            {{-- Foto --}}
            <div>
                <label for="foto" class="block text-sm font-semibold text-gray-700">Foto Siswa (opsional)</label>
                <input type="file" name="foto" id="foto" class="mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-50 file:text-indigo-700
                        hover:file:bg-indigo-100">
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-md shadow transition">
                    💾 Simpan Data
                </button>
            </div>
        </form>
    </div>
</x-app-layout>