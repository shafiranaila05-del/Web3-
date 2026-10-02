<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    {{-- JUDUL --}}
                    <h3 class="text-lg font-bold mb-6">
                        Form Tambah Mahasiswa
                    </h3>


                    {{-- PESAN ERROR --}}
                    @if ($errors->any())

                        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">

                            <strong>
                                Data belum bisa disimpan.
                            </strong>

                            <ul class="mt-2 list-disc list-inside">

                                @foreach ($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- FORM --}}
                    <form method="POST" action="{{ route('mahasiswa.store') }}">

                        @csrf


                        {{-- NIM --}}
                        <div class="mb-4">

                            <label
                                for="nim"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                NIM
                            </label>

                            <input
                                type="text"
                                id="nim"
                                name="nim"
                                value="{{ old('nim') }}"
                                class="border border-gray-300 rounded w-full p-2"
                                placeholder="Masukkan NIM"
                                required
                            >

                        </div>


                        {{-- NAMA --}}
                        <div class="mb-4">

                            <label
                                for="nama"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Nama
                            </label>

                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                value="{{ old('nama') }}"
                                class="border border-gray-300 rounded w-full p-2"
                                placeholder="Masukkan nama mahasiswa"
                                required
                            >

                        </div>


                        {{-- PROGRAM STUDI --}}
                        <div class="mb-4">

                            <label
                                for="program_studi"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Program Studi
                            </label>

                            <input
                                type="text"
                                id="program_studi"
                                name="program_studi"
                                value="{{ old('program_studi') }}"
                                class="border border-gray-300 rounded w-full p-2"
                                placeholder="Masukkan program studi"
                                required
                            >

                        </div>


                        {{-- EMAIL --}}
                        <div class="mb-4">

                            <label
                                for="email"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="border border-gray-300 rounded w-full p-2"
                                placeholder="Masukkan email"
                            >

                        </div>


                        {{-- ANGKATAN --}}
                        <div class="mb-6">

                            <label
                                for="angkatan"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Angkatan
                            </label>

                            <input
                                type="number"
                                id="angkatan"
                                name="angkatan"
                                value="{{ old('angkatan') }}"
                                class="border border-gray-300 rounded w-full p-2"
                                placeholder="Contoh: 2025"
                                required
                            >

                        </div>


                        {{-- TOMBOL --}}
                        <div class="flex justify-end gap-2">

                            {{-- BATAL --}}
                            <a
                                href="{{ route('mahasiswa.index') }}"
                                style="
                                    background-color: #6b7280;
                                    color: white;
                                    padding: 9px 18px;
                                    border-radius: 6px;
                                    text-decoration: none;
                                    display: inline-block;
                                "
                            >
                                Batal
                            </a>


                            {{-- SIMPAN --}}
                            <button
                                type="submit"
                                style="
                                    background-color: #2563eb;
                                    color: white;
                                    padding: 9px 18px;
                                    border-radius: 6px;
                                    border: none;
                                    cursor: pointer;
                                    font-weight: bold;
                                "
                            >
                                Simpan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>