<?php

namespace App\Models;

// use App\Models\Sales1Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales1Model extends Model
{
    use HasFactory;

    protected $table = 'sales1'; //nama table
    public $timestamps = false;
    protected $primaryKey ='kode_sales1'; //primarykey

    public function getAll()
    {
        return Sales1Model::all();
    }

    public function saveData($request , $data)
    {
        // return $this->table;
        // return $data;
        extract($data);
        // return $tahun; 
        // $tgl = $request->tanggal ? date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d') : '';
        // $tahun = $request->tanggal ? date_format(date_create_from_format('d M Y', $request->tanggal), 'Y') : '';
        // DB:
        DB::table("$this->table")->insert([
            'tahun' => $tahun,
            'nosales' => $nomax,
            'lbnosales' => $lbnosales,
            'tanggal' => $tgl,            
            'kode_toko2' => $request->toko,            
            'ketsales' => $request->ket,            
        ]);

    }
    public function editData($request )
    {
        // return $this->table;
        // $tgl = $request->tanggal ? date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d') : '';
        // DB::table("$this->table")->update([
        //     'kode_sales1' =>$request->kode_sales1;
        //     'tanggal' => $tgl,            
        //     'kode_toko2' => $request->toko,            
        //     'ketsales' => $request->ket,            
        // ]);

    }

    public function TokoModel()
    {
        return $this->belongsTo(TokoModel::class, 'kode_toko2', 'kode_toko' );
    }
    public function Sales2Model()
    {
        return $this->hasMany(Sales2Model::class, 'kode_sales2', 'kode_sales1' );
    }

    public function purchase1()
    {
        return $this->belongsTo(purchase1::class, 'purchase1_id', 'id' );
    }
}
