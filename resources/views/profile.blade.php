@extends('layouts.app')

@section('content')
<div class="bg-black">
    <div class="w-screen h-screen flex justify-center items-center">
        <div class="relative w-2/5 h-4/5 group">
            <div class="absolute -inset-1 bg-gradient-to-b from-pink-600 to-purple-600 rounded-3xl blur opacity-75 group-hover:opacity-100 transition duration-200"></div>
            <div class="w-full h-full relative bg-black rounded-3xl leading-none flex flex-col justify-center items-center">
                @if($user->foto)
                    <img class="h-2/5 rounded-full" src="{{ asset('storage/uploads/' . $user->foto) }}" alt="Profile Picture">
                @else
                    <img class="h-2/5 rounded-full" src="https://i.pinimg.com/564x/de/4a/19/de4a19f50af28e161dee0ba96d140cdd.jpg" alt="Profile Picture">
                @endif
                <table class="mt-14">
                    <tbody>
                        <tr>
                            <td class="px-4 text-white font-mono text-3xl font-semibold">Nama</td>
                            <td class="px-4 text-white font-mono text-3xl font-semibold">:</td>
                            <td class="px-4 text-white font-mono text-3xl font-semibold"><?= $user['nama'] ?></td>
                        </tr>
                        <tr>
                            <td class="px-4 text-white font-mono text-3xl font-semibold">Kelas</td>
                            <td class="px-4 text-white font-mono text-3xl font-semibold">:</td>
                            <td class="px-4 text-white font-mono text-3xl font-semibold"><?= $kelas['nama_kelas'] ?></td>
                        </tr>
                        <tr>
                            <td class="px-4 text-white font-mono text-3xl font-semibold">Semester</td>
                            <td class="px-4 text-white font-mono text-3xl font-semibold">:</td>
                            <td class="px-4 text-white font-mono text-3xl font-semibold"><?= $user['smt'] ?></td>
                        </tr>
                        <tr>
                            <td class="px-4 text-white font-mono text-3xl font-semibold">Jurusan</td>
                            <td class="px-4 text-white font-mono text-3xl font-semibold">:</td>
                            <td class="px-4 capitalize text-white font-mono text-3xl font-semibold"><?= $user['jurusan'] ?></td>
                        </tr>
                        <tr>
                            <td class="px-4 text-white font-mono text-3xl font-semibold">Fakultas</td>
                            <td class="px-4 text-white font-mono text-3xl font-semibold">:</td>
                            <td class="px-4 text-white font-mono text-3xl font-semibold"><?= $fakultas['nama_fakultas'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>