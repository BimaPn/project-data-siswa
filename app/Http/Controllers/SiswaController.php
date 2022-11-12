<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.siswa.index',[
            'siswa'=> Siswa::latest()->filter(request('search'))->paginate(15)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.siswa.create',[
            'jurusan'=>Jurusan::all(),
            'kelas'=>Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:40',
            'kelas_id' => 'required',
            'jurusan_id' => 'required',
            'foto_profil'=> 'image|file|max:1024'
        ]);


        if($request->file('foto_profil')){
            $validatedData['foto_profil'] = $request->file('foto_profil')->store('foto-profil');
        }
        Siswa::create($validatedData);
        return redirect('/dashboard/siswa')->with('success','Post telah ditambahkan !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('dashboard.siswa.edit',[
            'siswa' => $siswa,
            'jurusan'=>Jurusan::all(),
            'kelas'=>Kelas::all(),
            'prevurl'=> url()->previous()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
         $validatedData = $request->validate([
            'nama' => 'required|max:40',
            'kelas_id' => 'required',
            'jurusan_id' => 'required',
            'foto_profil'=> 'image|file|max:1024'
        ]);
           
        if($request->file('foto_profil')){
            if($siswa->foto_profil !== 'foto-profil/guest.png'){
                Storage::delete($user->profile_picture);
            }
            $validatedData['foto_profil'] = $request->file('foto_profil')->store('foto-profil');
            }

        $siswa->update($validatedData);    
        return redirect($request->prevurl)->with('success','Post telah update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        if($siswa->foto_profil && $siswa->foto_profil !== 'foto-profil/guest.png'){
            Storage::delete($siswa->foto_profil);
        }
        $siswa->delete();

    }
}
