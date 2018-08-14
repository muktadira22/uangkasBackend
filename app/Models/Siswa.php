<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'id_user', 'id_kelas', 'nama_siswa', 'alamat', 'photo'
    ];
}
