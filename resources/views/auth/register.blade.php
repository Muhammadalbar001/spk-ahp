<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto p-6 bg-white shadow rounded">
        @csrf

        <h2 class="text-2xl font-bold text-center text-indigo-700 mb-4">Daftar Siswa</h2>

        {{-- Validasi --}}
        @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
            <ul class="text-sm list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Nama --}}
        <div class="mb-3">
            <label class="block text-sm font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full border rounded p-2">
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded p-2">
        </div>

        {{-- NISN --}}
        <div class="mb-3">
            <label class="block text-sm font-medium">NISN</label>
            <input type="text" name="nisn" value="{{ old('nisn') }}" required class="w-full border rounded p-2">
        </div>

        {{-- Jenis Kelamin --}}
        <div class="mb-3">
            <label class="block text-sm font-medium">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full border rounded p-2">
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label class="block text-sm font-medium">Alamat</label>
            <textarea name="alamat" rows="3" class="w-full border rounded p-2">{{ old('alamat') }}</textarea>
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label class="block text-sm font-medium">Password</label>
            <input type="password" name="password" required class="w-full border rounded p-2">
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mb-3">
            <label class="block text-sm font-medium">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required class="w-full border rounded p-2">
        </div>

        {{-- Submit --}}
        <div class="text-center">
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Daftar</button>
        </div>

        {{-- Link login --}}
        <p class="text-sm text-center mt-4 text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login di sini</a>
        </p>
    </form>
</x-guest-layout>