<?php

namespace Database\Seeders;

use App\Models\BrandModel;
use App\Models\Sepatu1Model;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BrandModel::create([
            'namabrand' => "Gradial",
        ]);

        BrandModel::create([
            'namabrand' => "Enkai",
        ]);

        

    }
}
