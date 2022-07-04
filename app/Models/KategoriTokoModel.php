<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriTokoModel extends Model
{
    use HasFactory;

    protected $table = 'kategoritoko'; //nama table
    public $timestamps = false;
    protected $primaryKey ='kode_kate'; //primarykey

    public function getAll()
    {
        return KategoriTokoModel::all();
    }

    public function saveData($request )
    {

        DB::table("$this->table")->insert([
            'namakat' => $request->namakate,            
            'diskon' => $request->diskon,            
        ]);
        
    }

    public function TokoModel()
    {
        return $this->hasMany(TokoModel::class, 'kode_kate2', 'kode_kate2');
    }
}
