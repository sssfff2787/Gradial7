<?php

namespace App\Models;

// use App\Models\TokoModel;
use App\Models\KategoriTokoModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TokoModel extends Model
{
    use HasFactory;

    protected $table = 'toko'; //nama table
    public $timestamps = false;
    protected $primaryKey ='kode_toko'; //primarykey

    public function getAll()
    {
        return TokoModel::all();
    }

    public function saveData($request)
    {

        DB::table("$this->table")->insert([
            'kode_kat2' => $request->kodekategori,            
            'namatoko' => $request->kodekategori,            
            'alamat' => $request->kodekategori,            
            'kota' => $request->kodekategori,            
            'telp' => $request->kodekategori,            
            'person' => $request->kodekategori,            
        ]);
        
    }

    public function KategoriTokoModel()
    {
        return $this->belongsTo(KategoriTokoModel::class, 'kode_kate2', 'kode_kate' );
    }
}
