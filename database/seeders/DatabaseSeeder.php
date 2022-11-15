<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Siswa::factory(50)->create();

        Jurusan::create([
            'nama'=>'RPL',
            'slug'=>'rpl'
        ]);
        Jurusan::create([
            'nama'=>'TKJ',
            'slug'=>'tkj'
        ]);
        Jurusan::create([
            'nama'=>'OTKP',
            'slug'=>'otkp'
        ]);
        Jurusan::create([
            'nama'=>'AKL',
            'slug'=>'akl'
        ]);
        Jurusan::create([
            'nama'=>'BRODCAST',
            'slug'=>'brodcast'
        ]);
        Jurusan::create([
            'nama'=>'ANM',
            'slug'=>'anm'
        ]);
        for($i = 0;$i <= 2;$i++){
            Kelas::create([
                'kelas' => 10 + $i,
            ]);
        }

    }
}
