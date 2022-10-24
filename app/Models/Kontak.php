<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $table = 'kontak';
    public function siswa(){
        return $this->belongsTo(Siswa::class,'id_siswa','id');
    }
    public function jenis(){
        return $this->belongsTo(JenisKontak::class,'id_jenis');
    }
}
