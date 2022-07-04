<?php

namespace Database\Seeders;

use App\Models\KategoriTokoModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoritokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriTokoModel::create([
            'namakat' => "Grosir Spesial",
            'diskon' => 35,
        ]);

        KategoriTokoModel::create([
            'namakat' => "Grosir ",
            'diskon' => 30,
        ]);

        KategoriTokoModel::create([
            'namakat' => "Grosir A",
            'diskon' => 32,
        ]);

        KategoriTokoModel::create([
            'namakat' => "Semi Grosir",
            'diskon' => 27,
        ]);

        KategoriTokoModel::create([
            'namakat' => "Retail",
            'diskon' => 25,
        ]);

    }
}
