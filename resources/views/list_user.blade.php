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
                            <th scope="col" class="px-3 py-2 border-r border-b">ID</th>
                            <th scope="col" class="py-2 w-52 border-r border-b">Nama</th>
                            <th scope="col" class="py-2 w-28 border-r border-b">NPM</th>
                            <th scope="col" class="px-3 py-2 border-r border-b">Kelas</th>
                            <th scope="col" class="px-3 py-2 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($users as $user) :
                        ?>
                        <tr>
                            <td class="text-center py-2 border-r border-b"><?= $user['id'] ?></td>
                            <td class="px-3 py-2 border-r border-b"><?= $user['nama'] ?></td>
                            <td class="text-center py-2 border-r border-b"><?= $user['npm'] ?></td>
                            <td class="text-center py-2 border-r border-b"><?= $user['nama_kelas'] ?></td>
                            <td class="text-center py-2 border-b"><a href="{{ route('user.show', $user->id) }}" class="text-sky-500 underline underline-offset-2">Detail</a></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection