@extends('layouts.app')

@section('content')
<div class="bg-black py-12">
    <div class="min-h-screen flex justify-center items-center">
        <div class="relative w-2/5 h-auto group/box">
            <div class="absolute -inset-1 bg-gradient-to-b from-pink-600 to-purple-600 rounded-3xl blur opacity-75 group-hover/box:opacity-100 transition duration-200"></div>
            <div class="w-full h-full relative bg-black rounded-3xl leading-none flex flex-col">
                <form action="{{ route('user.update', $user->id) }}" method="POST" class="mx-9" enctype="multipart/form-data">
                    @csrf
                    @method('PUT');
                    <p class="text-white text-3xl my-9 font-semibold text-center">Edit Data</p>
    
                    <div class="h-20 mb-5">
                        <label for="nama" class="block mb-3 text-base font-medium text-white">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" class="w-full bg-transparent text-white border-2 border-gray-500 rounded-lg p-2.5 text-sm focus:border-pink-600 focus:bg-transparent focus:outline-none" placeholder="Enter Your Name">
                        @foreach($errors->get('nama') as $msg)
                            <p class="text-sm font-medium text-red-600">{{ $msg }}</p>
                        @endforeach
                    </div>
    
                    <div class="h-20 mb-5">
                        <label for="kelas" class="block mb-3 text-base font-medium text-white">Kelas</label>
                        <select name="kelas_id" id="kelas" class="bg-black border-2 border-gray-500 text-white text-sm rounded-lg focus:border-pink-600 w-full p-2.5">
                            <option value="" selected disabled>-- Pilih Kelas Anda --</option>
                            @foreach($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                                {{ $kelasItem->nama_kelas }}
                            </option>
                            @endforeach
                        </select>
                        @foreach($errors->get('kelas_id') as $msg)
                            <p class="text-sm font-medium text-red-600">{{ $msg }}</p>
                        @endforeach
                    </div>

                    <div class="h-20 mb-5">
                        <label for="smt" class="block mb-3 text-base font-medium text-white">Semester</label>
                        <input type="number" min="1" max="14" id="smt" name="smt" value="{{ old('smt', $user->smt) }}" class="w-full bg-transparent text-white border-2 border-gray-500 rounded-lg p-2.5 text-sm focus:border-purple-600 focus:bg-transparent focus:outline-none" placeholder="Masukkan Semester Anda">
                        @foreach($errors->get('smt') as $msg)
                            <p class="text-sm font-medium text-red-600">{{ $msg }}</p>
                        @endforeach
                    </div>
    
                    <div class="h-20 mb-5">
                        <label for="fakultas" class="block mb-3 text-base font-medium text-white">Fakultas</label>
                        <select name="fakultas_id" id="fakultas" class="bg-black border-2 border-gray-500 text-white text-sm rounded-lg focus:border-pink-600 w-full p-2.5">
                            <option value="" selected disabled>-- Pilih Fakultas Anda --</option>
                            @foreach($fakultas as $fakultasItem)
                            <option value="{{ $fakultasItem->id }}" {{ $fakultasItem->id == $user->fakultas_id ? 'selected' : '' }}>
                                {{ $fakultasItem->nama_fakultas }}
                            </option>
                            @endforeach
                        </select>
                        @foreach($errors->get('fakultas_id') as $msg)
                            <p class="text-sm font-medium text-red-600">{{ $msg }}</p>
                        @endforeach
                    </div>

                    <div class="h-20 mb-5">
                        <label for="jurusan" class="block mb-3 text-base font-medium text-white">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="bg-black border-2 border-gray-500 text-white text-sm rounded-lg focus:border-pink-600 w-full p-2.5">
                            <option value="" selected disabled>-- Pilih Jurusan Anda --</option>
                            @foreach(\App\Models\UserModel::getJurusanOptions() as $value => $label)
                            <option value="{{ $value }}" {{ $value == $user->jurusan ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @foreach($errors->get('fakultas_id') as $msg)
                            <p class="text-sm font-medium text-red-600">{{ $msg }}</p>
                        @endforeach
                    </div>

                    <div class="h-auto mb-12">
                        <label for="foto" class="block mb-3 text-base font-medium text-white">Foto</label>
                        <div class="grid grid-cols-4 gap-4 items-start">
                            <input type="file" id="foto" name="foto" class="block col-span-3 text-white border-2 border-gray-500 rounded-lg w-full cursor-pointer bg-transparent file:bg-gray-500 file:border-0 file:p-2.5">
                            @if($user->foto)
                            <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="User Photo" width="100" class="justify-self-end">
                            @endif
                        </div>
                    </div>
    
                    <div class="flex justify-center mb-12">
                        <div class="relative group/submit">
                            <div class="absolute -inset-1 bg-gradient-to-r from-pink-600 to-purple-600 rounded-full blur opacity-75 group-hover/submit:opacity-100 transition duration-200"></div>
                            <button type="submit" class="relative text-white bg-black rounded-full leading-none w-80 p-4">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection