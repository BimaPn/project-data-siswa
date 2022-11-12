<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function scopeFilter($query,$result){
        $query->when($result ?? false,function($query,$search){
            // $jurusan = $query->jurusan;
            // $kelas = $query->kelas;
            return $query->where('id','like','%'.$search.'%')
                         ->orWhere('nama','like','%'. $search .'%');
        });
    }
    public function jurusan(){
        return $this->belongsTo(Jurusan::class);
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function getRouteKeyName()
    {
    return 'id';
    }
}
