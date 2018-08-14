<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $primaryKey = 'id_kelas';
    protected $table = 'kelas';
    protected $fillable = [
        'id_user', 'id_tahun_ajar', 'jenjang', 'jurusan', 'nama_kelas'
    ];

    // public function tahunAjar()
    // {
    // 	return $this->hasMany('App\Models\TahunAjar');
    // }
}
