<?php

namespace App\Models;

use App\Models\BrandModel;
// use App\Models\Sepatu1Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sepatu1Model extends Model
{
    use HasFactory;
    protected $guarded = ['kode_sepatu'];

    protected $table = 'sepatu1'; //nama table
    public $timestamps = false;
    protected $primaryKey ='kode_sepatu1'; //primarykey


    public function getAll()
    {
        // return "alahamdulillah berhasi model sepatu2";
        return Sepatu1Model::all();
    }

    public function getAll123()
    {
        return "alahamdulillah berhasi model sepatu2";
    }

    public function saveData($request )
    {

        DB::table("$this->table")->insert([
            'kodesales3' => $request->kodesales,                      
            'idsepatu3' => $request->idsepatu,            
            'size' => $request->size,                      
            'qty' => $request->qty,            
        ]);
        
    }

    // public function BrandModel2()
    // {
    //     return $this->belongsTo(BrandModel::class )->where('kode_brand', 1)->orderBy('kode_brand');
    // }
    public function BrandModel()
    {
        return $this->belongsTo(BrandModel::class, 'kode_brand2', 'kode_brand' );
    }

    public function Sepatu2Model()
    {
        return $this->hasMany(Sepatu2Model::class, 'kode_sepatu2', 'kode_sepatu1' );
    }
    
    public function Sales2Model()
    {
        return $this->hasManyThrough(Sales2Model::class, Sepatu2Model::class, 'kode_sepatu2', 'idsepatu2', 'kode_sepatu1', 'idsepatu' );
    }

    public function Sales3Model()
    {
        return $this->belongsTo(Sales3Model::class)->withDefault([
            'name' => 'Guest Author',
        ]);
    }
 
}
