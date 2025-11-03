@extends('layouts.public')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6">Tambah Barang Baru</h2>

        <form method="POST" action="{{ route('items.store') }}">
            @csrf

            <div class="mb-4">
                <label for="nama_barang" class="block text-gray-700 text-sm font-bold mb-2">
                    Nama Barang <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="nama_barang"
                       id="nama_barang"
                       value="{{ old('nama_barang') }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama_barang') border-red-500 @enderror"
                       required>
                @error('nama_barang')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="satuan" class="block text-gray-700 text-sm font-bold mb-2">
                    Satuan <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="satuan"
                       id="satuan"
                       value="{{ old('satuan') }}"
                       placeholder="Contoh: pcs, kg, liter, box"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('satuan') border-red-500 @enderror"
                       required>
                @error('satuan')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="stok_awal" class="block text-gray-700 text-sm font-bold mb-2">
                    Stok Awal <span class="text-red-500">*</span>
                </label>
                <input type="number"
                       name="stok_awal"
                       id="stok_awal"
                       value="{{ old('stok_awal', 0) }}"
                       min="0"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('stok_awal') border-red-500 @enderror"
                       required>
                @error('stok_awal')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
                <a href="{{ route('items.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
