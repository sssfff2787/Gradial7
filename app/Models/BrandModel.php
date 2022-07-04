<?php

namespace App\Models;

// use App\Models\BrandModel;
use App\Models\Sepatu1Model;

use App\Models\purchase1;
use App\Models\Sepatu2Model;
use App\Models\Sales2Model;
use App\Models\Pabrik;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandModel extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $table = 'brand'; //nama table
    public $timestamps = false;
    protected $primaryKey ='kode_brand'; //primarykey


    public function namakelas(){
        $namakelas =__CLASS__;
        return  $namakelas;
    }


    public function getAll()
    {
        return BrandModel::all();
    }

    public function saveData($request , $tgl="")
    {

        DB::table("$this->table")->insert([
            'namabrand' => $request->namabrand,            
        ]);
        
    }

    public function Sepatu1Model()
    {
        return $this->hasMany(Sepatu1Model::class, 'kode_brand2', 'kode_brand');
    }

    public function Sepatu2Model()
    {
        return $this->hasManyThrough(Sepatu2Model::class, Sepatu1Model::class, 'kode_brand2', 'kode_sepatu2', 'kode_brand', 'kode_sepatu1'  );
    }
    
    // public function Sales2Model()
    // {
    //     return $this->hasManyThrough(Sales2Model::class, Sepatu2Model::class, Sepatu1Model::class, 'kode_brand2', 'kode_sepatu2', "idsepatu2", 'kode_brand', 'kode_sepatu1', "idsepatu"  );
    // }
    // public function Sales1Model()
    // {
    //     return $this->hasManyThrough(Sales1Model::class, Sales2Model::class, Sepatu2Model::class, Sepatu1Model::class, 'kode_brand2', 'kode_sepatu2', "idsepatu2", "kode_sales1", 'kode_brand', 'kode_sepatu1', "idsepatu", "kode_sales2" );
    // }
    
    //brand memiliki relasi ke sales2 ( 4 tingkatan : brand->sepatu1->sepatu2->sales2)
    public function Sales2Model()
    {
        return $this->hasManyDeep(Sales2Model::class, [Sepatu1Model::class, Sepatu2Model::class], ['kode_brand2', 'kode_sepatu2', 'idsepatu2'], ['kode_brand','kode_sepatu1', 'idsepatu']);
    }

    //brand memiliki relasi ke sales2 ( 4 tingkatan : brand->sepatu1->sepatu2->sales2) dengan menggunkan relasi yg sudah ada
    // public function Sales2Model()
    // {
    //     return $this->hasManyDeepFromRelations($this->Sepatu2Model(), (new Sepatu2Model)->Sales2Model());
    // }

    // public function PabrikModel()
    // {
    //     return $this->hasManyDeepFromRelations($this->Sales2Model(), (new Sales2Model)->Sales2Model());
    // }

    public function purchase1()
    {
        return $this->hasMany(purchase1::class, 'brand_id', 'kode_brand');
    }

    public function Pabrik()
    {
        return $this->belongsTo(Pabrik::class, 'pabrik_id', 'id' );
    }
}
