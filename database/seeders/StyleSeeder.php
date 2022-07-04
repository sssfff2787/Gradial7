<?php

namespace Database\Seeders;

use App\Models\Style;
use App\Models\Warna;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Style::create([
            'kode' => 'AT0001',
            'namaStyle' => 'ATLANTIS IN',
        ]);
        Style::create([
            'kode' => 'AT0002',
            'namaStyle' => 'ATLANTIS FG',
        ]);
            
    }
}
