<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Pairwise Matrix Kriteria</h2>
    </x-slot>

    <div class="p-6">
        @if (session('success'))
        <div class="bg-green-200 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('admin.pairwise.store') }}" method="POST">

            @csrf
            <table class="table-auto w-full border mb-4">
                <thead>
                    <tr>
                        <th class="border p-2">Kriteria</th>
                        @foreach($kriteria as $k)
                        <th class="border p-2 text-center">{{ $k->kode }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($kriteria as $row)
                    <tr>
                        <th class="border p-2">{{ $row->kode }}</th>
                        @foreach($kriteria as $col)
                        <td class="border p-2 text-center">
                            @if ($row->id === $col->id)
                            1
                            @elseif ($row->id < $col->id)
                                <input type="number" name="nilai[{{ $row->id }}][{{ $col->id }}]" min="1" max="9"
                                    step="0.01" class="w-16 text-center border rounded" required>
                                @else
                                {{-- Otomatis tampil kebalikan --}}
                                @php
                                $val = old("nilai[$col->id][$row->id]");
                                $inv = $val ? number_format(1 / floatval($val), 3) : '-';
                                @endphp
                                <span class="text-gray-400 italic">{{ $inv }}</span>
                                @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>