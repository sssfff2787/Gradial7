<?php

namespace Database\Seeders;

use App\Models\Sales3Model;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Sales3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sales3Model::create([
            'kode_sales3' => '1',
            'idsepatu3' => 1,
            'size' => 40,
            'qty' => 10,
        ]);

        Sales3Model::create([
            'kode_sales3' => '1',
            'idsepatu3' => 1,
            'size' => 41,
            'qty' => 15,
        ]);
    }
}
