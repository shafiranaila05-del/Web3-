<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Manajemen Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">

                {{-- JUDUL DAN TOMBOL TAMBAH --}}
                <div class="flex justify-between items-center mb-6">

                    <h3 class="text-lg font-bold text-gray-800">
                        Daftar Mahasiswa
                    </h3>

                    {{-- TOMBOL TAMBAH KHUSUS ADMIN --}}
                    @if(strtolower(trim(auth()->user()->role)) === 'admin')

                        <a href="{{ route('mahasiswa.create') }}"
                           style="
                               background-color: red;
                               color: white;
                               padding: 12px 20px;
                               border-radius: 8px;
                               font-weight: bold;
                               display: inline-block;
                               text-decoration: none;
                           ">
                            + TAMBAH MAHASISWA
                        </a>

                    @endif

                </div>


                {{-- NOTIFIKASI SUKSES --}}
                @if(session('success'))

                    <div
                        style="
                            background-color: #d1fae5;
                            color: #065f46;
                            padding: 15px;
                            margin-bottom: 20px;
                            border-radius: 8px;
                            font-weight: bold;
                        "
                    >
                        {{ session('success') }}
                    </div>

                @endif


                {{-- TABEL DATA MAHASISWA --}}
                <div style="overflow-x: auto;">

                    <table
                        style="
                            width: 100%;
                            border-collapse: collapse;
                            border: 1px solid #d1d5db;
                        "
                    >

                        <thead>

                            <tr style="background-color: #f3f4f6;">

                                <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                    NIM
                                </th>

                                <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                    Nama
                                </th>

                                <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                    Program Studi
                                </th>

                                <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                    Email
                                </th>

                                <th style="border: 1px solid #d1d5db; padding: 12px; text-align: center;">
                                    Angkatan
                                </th>

                                <th style="border: 1px solid #d1d5db; padding: 12px; text-align: center;">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($mahasiswa as $m)

                                <tr>

                                    <td style="border: 1px solid #d1d5db; padding: 12px;">
                                        {{ $m->nim }}
                                    </td>

                                    <td style="border: 1px solid #d1d5db; padding: 12px;">
                                        {{ $m->nama }}
                                    </td>

                                    <td style="border: 1px solid #d1d5db; padding: 12px;">
                                        {{ $m->program_studi }}
                                    </td>

                                    <td style="border: 1px solid #d1d5db; padding: 12px;">
                                        {{ $m->email }}
                                    </td>

                                    <td style="border: 1px solid #d1d5db; padding: 12px; text-align: center;">
                                        {{ $m->angkatan }}
                                    </td>

                                    <td style="border: 1px solid #d1d5db; padding: 12px; text-align: center;">

                                        {{-- AKSI ADMIN --}}
                                        @if(strtolower(trim(auth()->user()->role)) === 'admin')

                                            <div style="
                                                display: flex;
                                                justify-content: center;
                                                gap: 8px;
                                            ">

                                                {{-- TOMBOL EDIT --}}
                                                <a href="{{ route('mahasiswa.edit', $m->id) }}"
                                                   style="
                                                       background-color: #f59e0b;
                                                       color: white;
                                                       padding: 6px 12px;
                                                       border-radius: 5px;
                                                       text-decoration: none;
                                                       font-size: 13px;
                                                   ">
                                                    Edit
                                                </a>


                                                {{-- TOMBOL HAPUS --}}
                                                <form
                                                    action="{{ route('mahasiswa.destroy', $m->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        style="
                                                            background-color: red;
                                                            color: white;
                                                            padding: 6px 12px;
                                                            border: none;
                                                            border-radius: 5px;
                                                            cursor: pointer;
                                                            font-size: 13px;
                                                        "
                                                    >
                                                        Hapus
                                                    </button>

                                                </form>

                                            </div>

                                        @else

                                            {{-- USER HANYA BISA MELIHAT --}}
                                            <span style="
                                                color: #9ca3af;
                                                font-size: 13px;
                                                font-style: italic;
                                            ">
                                                Tidak ada akses
                                            </span>

                                        @endif

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        style="
                                            border: 1px solid #d1d5db;
                                            padding: 25px;
                                            text-align: center;
                                            color: #6b7280;
                                        "
                                    >
                                        Belum ada data mahasiswa.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>