<?php

namespace App\Models;

use App\Models\Pabrik;

use App\Models\Pemilik;
use App\Models\BrandModel;
use App\Models\Sales1Model;
use App\Models\Sepatu1Model;
use App\Models\Sepatu2Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Sales2Model extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;
    protected $table = 'sales2'; //nama table
    public $timestamps = false;
    protected $primaryKey ='idsales2'; //primarykey

    public function getAll()
    {
        return Sales2Model::all();
    }

    public function saveData($request, $tgl='' )
    {

        DB::table("$this->table")->insert([
            'kodesales2' => $request->kodesales,                      
            'idsepatu2' => $request->idsepatu,            
        ]);
        
    }

    public function Sepatu2Model()
    {
        return $this->belongsTo(Sepatu2Model::class, 'idsepatu2', 'idsepatu' );
    }

    //sales2 memiliki relasi ke Sepatu1 (3 tingkat : sales2->sepatu2->sepatu1)
    public function Sepatu1Model()
    {
        // return $this->hasOneThrough(Sepatu1Model::class, Sepatu2Model::class, 'kode_sepatu2', 'idsepatu2', 'idsales2', 'idsepatu');
        return $this->belongsToThrough( Sepatu1Model::class, Sepatu2Model::class, null, '', [ Sepatu1Model::class=>'kode_sepatu2', Sepatu2Model::class => 'idsepatu2']);
        // return $this->belongsToThrough( Sepatu1Model::class, Sepatu2Model::class, null, '', [  Sepatu2Model::class => 'kode_sepatu1', Sales2Model::class=>'idsepatu']);
    }
    
    //sales2 memiliki relasi ke Brand (3 tingkat : sales2->sepatu2->sepatu1->Brand)
    public function BrandModel()
    {
        // return $this->hasOneThrough(Sepatu1Model::class, Sepatu2Model::class, 'kode_sepatu2', 'idsepatu2', 'idsales2', 'idsepatu');
        return $this->belongsToThrough(BrandModel::class,  [Sepatu1Model::class, Sepatu2Model::class], null, '', [  Sepatu2Model::class => 'idsepatu2', Sepatu1Model::class=>'kode_sepatu2', BrandModel::class=>'kode_brand2']);
        // return $this->belongsToThrough( Sepatu1Model::class, Sepatu2Model::class, null, '', [  Sepatu2Model::class => 'kode_sepatu1', Sales2Model::class=>'idsepatu']);
    }
    public function Pabrik()
    {
        // return $this->hasOneThrough(Sepatu1Model::class, Sepatu2Model::class, 'kode_sepatu2', 'idsepatu2', 'idsales2', 'idsepatu');
        return $this->belongsToThrough(Pabrik::class,  [BrandModel::class, Sepatu1Model::class, Sepatu2Model::class], null, '', [  Sepatu2Model::class => 'idsepatu2', Sepatu1Model::class=>'kode_sepatu2', BrandModel::class=>'kode_brand2', Pabrik::class=>'pabrik_id']);
        // return $this->belongsToThrough( Sepatu1Model::class, Sepatu2Model::class, null, '', [  Sepatu2Model::class => 'kode_sepatu1', Sales2Model::class=>'idsepatu']);
    }
    
    public function Pemilik()
    {
        // return $this->hasOneThrough(Sepatu1Model::class, Sepatu2Model::class, 'kode_sepatu2', 'idsepatu2', 'idsales2', 'idsepatu');
        return $this->belongsToThrough(Pemilik::class,  [Pabrik::class, BrandModel::class, Sepatu1Model::class, Sepatu2Model::class], null, '', [  Sepatu2Model::class => 'idsepatu2', Sepatu1Model::class=>'kode_sepatu2', BrandModel::class=>'kode_brand2', Pabrik::class=>'pabrik_id', Pemilik::class=>'pemilik_id']);
        // return $this->belongsToThrough( Sepatu1Model::class, Sepatu2Model::class, null, '', [  Sepatu2Model::class => 'kode_sepatu1', Sales2Model::class=>'idsepatu']);
    }
   

    public function Sales1Model()
    {
        return $this->belongsTo(Sales1Model::class, 'kode_sales2', 'kode_sales1' );
    }

}
