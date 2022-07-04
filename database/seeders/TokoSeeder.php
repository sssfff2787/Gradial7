<?php

namespace Database\Seeders;

use App\Models\TokoModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TokoModel::create([
            'kode_kat2' => 1,
            'namatoko' => 'Karunia Jaya',
            'alamat' => 'Jl. Merdeka No.5',
            'kota' => 'Surabaya',
            'telp' => '0817878788',
            'person' => 'H. Mukidin',
        ]);
        
        TokoModel::create([
            'kode_kat2' => 2,
            'namatoko' => ' Jaya Baru Abadi',
            'alamat' => 'Jl. Mawar No.5',
            'kota' => 'Surabaya',
            'telp' => '0817878974',
            'person' => 'H. Abidin',
        ]);
    }
}
