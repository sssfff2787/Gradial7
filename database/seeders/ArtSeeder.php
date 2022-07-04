<?php

namespace Database\Seeders;

use App\Models\Art;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Art::create([
            'kode' => 'SC-22001',
            'warna_kode' => 'BG001',
            'style_kode' => 'AT0001',
        ]);
        Art::create([
            'kode' => 'SC-22002',
            'warna_kode' => 'BRS001',
            'style_kode' => 'AT0002',
        ]);
    }
}
