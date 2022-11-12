<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    public function siswa(){
        return $this->hasMany(Siswa::class);
    }
    public function getRouteKeyName()
    {
    return 'kelas';
    }
}
