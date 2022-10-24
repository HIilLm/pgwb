<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKontak extends Model
{
    use HasFactory;
    protected $table = 'jenis';
    protected $guarded = ['id'];
    public function kontak()
    {
        return $this->hasMany(Kontak::class, 'id_jenis','id');
    }
}

