<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Fakultas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;

class UserController extends Controller {
    public $userModel;
    public $kelasModel;
    public $fakultasModel;
    
    public function __construct() {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
        $this->fakultasModel = new Fakultas();
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
        $fakultasModel = new Fakultas();
        $kelas = $kelasModel->getKelas();
        $fakultas = $fakultasModel->getFakultas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
            'fakultas' => $fakultas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request) {

        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg, png, jpg, gif, svg|max:2048',
            'fakultas_id' => 'required|exists:fakultas,id',
            'jurusan' => 'nullable|in:fisika,kimia,biologi,matematika,ilmu komputer',
            'smt' => 'required|integer|min:1|max:14',
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
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoName,
            'fakultas_id' => $request->input('fakultas_id'),
            'jurusan' => $request->input('jurusan'),
            'smt' => $request->input('smt'),
        ]);

        return redirect()->to('/')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id) {
        $user = UserModel::findorFail($id);
        $kelas = Kelas::find($user->kelas_id);
        $fakultas = Fakultas::find($user->fakultas_id);

        $title = 'Detail ' . $user->nama;

        return view('profile', compact('user', 'kelas', 'fakultas', 'title'));
    }

    public function edit($id) {
        $user = UserModel::findorFail($id);
        $kelasModel = new Kelas();
        $fakultasModel = new Fakultas();
        $kelas = $kelasModel->getKelas();
        $fakultas = $fakultasModel->getFakultas();

        $title = 'Edit User';

        return view('edit_user', compact('user','kelas', 'fakultas', 'title'));
    }

    public function update(Request $request, $id) {
        $user = UserModel::findorFail($id);

        $user->nama = $request->nama;
        $user->kelas_id = $request->kelas_id;
        $user->smt = $request->smt;
        $user->fakultas_id = $request->fakultas_id;
        $user->jurusan = $request->jurusan;

        if($request->hasFile('foto')) {
            $fileName = time() . '_' . $request->foto->getClientOriginalName();
            $request->foto->storeAs('uploads', $fileName);
            $user->foto = $fileName;
        }

        $user->save();

        return redirect()->route('user.list')->with('succes', 'User updated successfully');
    }

    public function destroy($id) {
        $user = UserModel::findorFail($id);
        $user->delete();

        return redirect()->to('/')->with('success', 'User has been deleted successfully');
    }
}