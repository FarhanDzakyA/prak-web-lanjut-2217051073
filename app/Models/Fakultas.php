<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas';
    protected $guarded = ['id'];

    public function user() {
        return $this->hasMany(UserModel::class, 'fakultas_id');
    }

    public function getFakultas() {
        return $this->all();    
    }
}
