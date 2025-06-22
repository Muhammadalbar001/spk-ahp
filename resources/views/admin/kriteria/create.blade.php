<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-700">➕ Tambah Kriteria AHP</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto bg-white shadow rounded-xl border border-blue-200 p-6 space-y-6">
            <h3 class="text-lg font-semibold text-blue-800">📝 Form Kriteria Baru</h3>

            <form action="{{ route('admin.kriteria.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="kode" class="block text-sm font-medium text-gray-700 mb-1">Kode Kriteria <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="kode" id="kode" required
                        class="w-full rounded border border-blue-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Kriteria <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nama" id="nama" required
                        class="w-full rounded border border-blue-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="flex justify-end pt-4">
                    <a href="{{ route('admin.kriteria.index') }}"
                        class="mr-3 inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition">
                        🔙 Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded shadow transition">
                        💾 Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>