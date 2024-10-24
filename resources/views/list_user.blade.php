@extends('layouts.app')

@section('content')
<div class="bg-black">
    <div class="w-screen h-screen flex justify-center items-center">
        <div class="relative group/box">
            <div class="absolute -inset-1 bg-gradient-to-b from-pink-600 to-purple-600 rounded-3xl blur opacity-75 group-hover/box:opacity-100 transition duration-200"></div>
            <div class="w-full h-full relative bg-black rounded-3xl leading-none flex flex-col px-6 py-4">
                <div class="flex justify-start mb-5">
                    <a href="{{ route('user.create') }}" class="shadow-sm shadow-pink-600 border border-pink-600 text-white bg-black rounded-xl leading-none p-4 block">Tambah Pengguna Baru</a>
                </div>
                <table class="table-fixed text-white">
                    <thead>
                        <tr>
                            <th scope="col" class="px-3 py-2 border-b">No</th>
                            <th scope="col" class="py-2 w-52 border-b">Nama</th>
                            <th scope="col" class="px-3 py-2 border-b">Kelas</th>
                            <th scope="col" class="py-2 w-28 border-b">Jurusan</th>
                            <th scope="col" class="py-2 w-28 border-b">Semester</th>
                            <th scope="col" class="py-2 w-28 border-b">Fakultas</th>
                            <th scope="col" class="px-3 py-2 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $Num = 1;
                            foreach($users as $user) :
                        ?>
                        <tr>
                            <td class="text-center py-3 border-b"><?= $Num ?></td>
                            <td class="px-3 py-3 border-b"><?= $user['nama'] ?></td>
                            <td class="text-center py-3 border-b"><?= $user['nama_kelas'] ?></td>
                            <td class="text-center capitalize py-3 border-b"><?= $user['jurusan'] ?></td>
                            <td class="text-center py-3 border-b"><?= $user['smt'] ?></td>
                            <td class="text-center py-3 border-b"><?= $user['nama_fakultas'] ?></td>
                            <td class="text-center py-3 border-b grid grid-cols-3 gap-2">
                                <a href="{{ route('user.show', $user->id) }}" class="bg-green-500 w-7 h-7 flex items-center justify-center rounded"><i class="fa-regular fa-fw fa-eye" style="color: #ffffff;"></i></a>
                                <a href="{{ route('user.edit', $user->id) }}" class="bg-blue-600 w-7 h-7 flex items-center justify-center rounded"><i class="fa-regular fa-fw fa-pen-to-square" style="color: #ffffff;"></i></a>
                                <form action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 w-7 h-7 flex items-center justify-center rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                        <i class="fa-solid fa-fw fa-trash" style="color: #ffffff;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            $Num++;
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection