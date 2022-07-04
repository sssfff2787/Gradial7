<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales3Model extends Model
{
    use HasFactory;

    protected $table = 'sales3'; //nama table
    public $timestamps = false;
    protected $primaryKey ='idsales3'; //primarykey

    public function getAll()
    {
        return Sales3Model::all();
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

    public function Sepatu2Model()
    {
        return $this->belongsTo(Sepatu2Model::class, 'idsepatu3', 'idsepatu' );
    }
    
    public function Sales1Model()
    {
        return $this->belongsTo(Sales1Model::class, 'kode_sales3', 'kode_sales1' );
    }
}
