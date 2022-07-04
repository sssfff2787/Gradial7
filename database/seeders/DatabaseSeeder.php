<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BrandModel;
use App\Models\KategoriTokoModel;
use App\Models\TokoModel;
use App\Models\Sepatu1Model;
use App\Models\Sepatu2Model;
use App\Models\Sales1Model;
use App\Models\Sales2Model;
use App\Models\Sales3Model;
use App\Models\Warna;
use App\Models\Style;
use App\Models\Art;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // $this->call([
        //     BrandModel::class,
        //     KategoriTokoModel::class,
        //     TokoModel::class,
        //     Sepatu1Model::class,
        //     Sepatu2Model::class,
        //     Sales1Model::class,
        //     Sales2Model::class,
        //     Sales3Model::class,
        // ]);



        BrandModel::create([
            'namabrand' => "Gradial",
        ]);

        BrandModel::create([
            'namabrand' => "Enkai",
        ]);

        KategoriTokoModel::create([
            'namakat' => "Mitra Lama",
            'diskon' => 20,
        ]);
        KategoriTokoModel::create([
            'namakat' => "Mitra Baru",
            'diskon' => 10,
        ]);

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

        Sepatu1Model::create([
            'kode_brand2' => 1,
            'namastyle' => 'Diamond',
            'sizemin' => 37,
            'sizemax' => 45,

        ]);

        Sepatu1Model::create([
            'kode_brand2' => 1,
            'namastyle' => 'Alaska',
            'sizemin' => 37,
            'sizemax' => 45,

        ]);

        Sepatu2Model::create([
            'kode_sepatu2' => 2,
            'kodeart' => 'AL001',
            'warna' => 'Hitam',
            'ketsepatu' => 'Alaska Putih',

        ]);
        Sepatu2Model::create([
            'kode_sepatu2' => 2,
            'kodeart' => 'DI001',
            'warna' => 'Putih',
            'ketsepatu' => 'Alaska Putih',

        ]);

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

        Sales2Model::create([
            'kode_sales2' => '1',
            'idsepatu2' => 1,
        ]);

        Sales2Model::create([
            'kode_sales2' => '2',
            'idsepatu2' => 1,
        ]);

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

        Style::create([
            'kode' => 'AT0001',
            'namaStyle' => 'ATLANTIS IN',
        ]);
        Style::create([
            'kode' => 'AT0002',
            'namaStyle' => 'ATLANTIS FG',
        ]);
        Warna::create([
            'kode' => 'BG001',
            'namaWarna' => 'BLACK GOLD',
        ]);
            
        Warna::create([
            'kode' => 'BRS001',
            'namaWarna' => 'BLACK RED STAR',
        ]);

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
