<?php

namespace Database\Seeders;

use App\Models\Sales1Model;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Sales1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sales1Model::create([
            'tanggal' => '2022-01-01',
            'kode_toko2' => '2',
            'ketsales' => 'Request Seminggu jadi',
            

        ]);

        Sales1Model::create([
            'tanggal' => '2022-03-01',
            'kode_toko2' => '1',
            'ketsales' => 'Di kasih Tulisan New Brand',
            

        ]);
    }
}
