<?php

namespace App\Models;

use App\Models\Kontak;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = ['id'];

    public function kontak(){
        return $this->hasMany(Kontak::class,'id_siswa', 'id');
    }
    public function project(){
        return $this->hasMany(Project::class, 'id_siswa', 'id');
    }
}
