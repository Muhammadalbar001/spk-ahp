<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Manajemen Siswa</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('admin.siswa.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">+
            Tambah Siswa</a>

        <table class="mt-4 w-full table-auto border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">No</th>
                    <th class="border p-2">NISN</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Jenis Kelamin</th>
                    <th class="border p-2">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $i => $row)
                <tr>
                    <td class="border p-2">{{ $i+1 }}</td>
                    <td class="border p-2">{{ $row->nisn }}</td>
                    <td class="border p-2">{{ $row->nama }}</td>
                    <td class="border p-2">{{ $row->jenis_kelamin }}</td>
                    <td class="border p-2">{{ $row->alamat }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>