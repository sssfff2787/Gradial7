<?php

namespace Database\Seeders;

use App\Models\Sepatu2Model;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Sepatu2ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sepatu2Model::create([
            'kode_sepatu2' => 2,
            'kodeart' => 'AP001',
            'warna' => 'Hitam',
            'ketsepatu' => 'Alaska Putih',

        ]);

        Sepatu2Model::create([
            'kode_sepatu2' => 2,
            'kodeart' => 'AP002',
            'warna' => 'Putih',
            'ketsepatu' => 'Alaska Putih',

        ]);
    }
}
