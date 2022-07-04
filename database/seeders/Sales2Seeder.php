<?php

namespace Database\Seeders;

use App\Models\Sales2Model;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Sales2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sales2Model::create([
            'kode_sales2' => '1',
            'idsepatu2' => 1,
        ]);

        Sales2Model::create([
            'kode_sales2' => '2',
            'idsepatu2' => 1,
        ]);
    }
}
