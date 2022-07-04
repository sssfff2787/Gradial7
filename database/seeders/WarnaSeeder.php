<?php

namespace Database\Seeders;

use App\Models\Warna;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WarnaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        Warna::create([
            'kode' => 'BG001',
            'namaWarna' => 'BLACK GOLD',
        ]);
            
        Warna::create([
            'kode' => 'BRS001',
            'namaWarna' => 'BLACK RED STAR',
        ]);
            

    }
}
