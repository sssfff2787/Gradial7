<?php

namespace Database\Seeders;

use App\Models\Sepatu1Model;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Sepatu1ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             Sepatu1Model::create([
            'kode_brand2' => 1,
            'namastyle' => 'Alaska',
            'sizemin' => 37,
            'sizemax' => 45,

        ]);
    }
}
