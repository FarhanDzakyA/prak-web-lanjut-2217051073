<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;

class UserController extends Controller {
    public $userModel;
    public $kelasModel;
    
    public function __construct() {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index() {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function profile($nama = "", $kelas = "", $npm = "") {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];

        return view('profile', $data);
    }

    public function create() {
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(UserRequest $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg, png, jpg, gif, svg|max:2048',
        ]);

        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('uploads', $fotoName);

        } else {
            $fotoName = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoName,
        ]);

        return redirect()->to('/')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id) {
        $user = UserModel::findorFail($id);
        $kelas = Kelas::find($user->kelas_id);

        $title = 'Detail ' . $user->nama;

        return view('profile', compact('user', 'kelas', 'title'));
    }

    public function edit($id) {
        $user = UserModel::findorFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();

        $title = 'Edit User';

        return view('edit_user', compact('user','kelas', 'title'));
    }

    public function update(Request $request, $id) {
        $user = UserModel::findorFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('upload/img'), $fileName);
            $user->foto = 'upload/img/' . $fileName;
        }

        $user->save();

        return redirect()->route('user.list')->with('succes', 'User updated successfully');
    }

    public function destroy($id) {
        $user = UserModel::findorFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'User has been deleted successfully');
    }
}