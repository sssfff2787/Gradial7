<?php

namespace App\Models;

use App\Models\Sales1Model;
use App\Models\Sepatu1Model;
// use App\Models\Sepatu2Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sepatu2Model extends Model
{
    use HasFactory;

    protected $table = 'sepatu2'; //nama table
    public $timestamps = false;
    protected $primaryKey ='idsepatu'; //primarykey

    public function getAll()
    {
        // return "alahamdulillah berhasi model sepatu2";
        return Sepatu2Model::all();
    }

    public function saveData($request, $tgl='' )
    {

        DB::table("$this->table")->insert([
            'kode_sepatu2' => $request->kode_sepatu,            
            'kodeart' => $request->kodeart,            
            'warna' => $request->warna,            
            'ketsepatu' => $request->ketsepatu,            
        ]);
        
    }

    
    
    public function Sepatu1Model()
    {
        return $this->belongsTo(Sepatu1Model::class, 'kode_sepatu2', 'kode_sepatu1' );
    }
    public function Sales2Model()
    {
        return $this->hasMany(Sales2Model::class, 'idsepatu2', 'idsepatu' );
    }

    // public function Sales1Model()
    // {
    //     return $this->belongsTo(Sales1Model::class, 'kode_sales2', 'kode_sales1' );
    // }
    
}
