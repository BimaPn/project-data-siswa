<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index(){
        return view('dashboard.jurusan.index',[
            'jurusan'=> Jurusan::all()
            ]);
    }
    public function kelas(Jurusan $jurusan){
        return view('dashboard.jurusan.kelas',[
            'jurusan'=>$jurusan,
            'kelas'=> Kelas::all()
        ]);
    }
    public function siswa(Jurusan $jurusan,Request $request){
        $siswa = Siswa::where([
            'kelas_id'=>$request->kelas,
            'jurusan_id'=>$jurusan->id
        ]);
        
        return view('dashboard.jurusan.siswa',[
            'siswa'=> $siswa->latest()->filter(request('search'))->paginate('15')->withQueryString(),
            'kelas'=> $request->kelas,
            'jurusan'=> $jurusan->nama
        ]);
    }
}
