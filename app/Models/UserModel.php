<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'npm',
        'kelas_id',
        'foto',
        'jurusan',
        'smt',
        'fakultas_id',
    ];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function getUser($id = null) {
        if($id != null) {
            return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                ->join('fakultas', 'fakultas.id', '=', 'user.fakultas_id')
                ->select('user.*', 'kelas.nama_kelas', 'fakultas.nama_fakultas')
                ->where('user.id', $id)
                ->first();
        }

        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')->join('fakultas', 'fakultas.id', '=', 'user.fakultas_id')->select('user.*', 'kelas.nama_kelas as nama_kelas', 'fakultas.nama_fakultas as nama_fakultas')->orderBy('user.id', 'asc')->get();
    }

    public static function getJurusanOptions() {
        return [
            'fisika' => 'Fisika',
            'kimia' => 'Kimia',
            'biologi' => 'Biologi',
            'matematika' => 'Matematika',
            'ilmu komputer' => 'Ilmu Komputer',
        ];
    }
}
