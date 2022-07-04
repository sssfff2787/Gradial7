<?php

namespace App\Models;

use App\Models\Warna;
use App\Models\Style;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Art extends Model
{
    use HasFactory;

    protected $guarded = ['kode'];

    protected $table = 'art'; //nama table
    public $timestamps = false;
    protected $primaryKey ='kode'; //primarykey

    public function Warna()
    {
        return $this->belongsTo(Warna::class);
        // return $this->belongsTo(Warna::class, 'warna_kode', 'kode' );
        // return $this->belongsTo(BrandModel::class, 'kode_brand2', 'kode_brand' );
    }
  
    public function Style()
    {
        return $this->belongsTo(Style::class);
        // return $this->belongsTo(Warna::class, 'warna_kode', 'kode' );
        // return $this->belongsTo(BrandModel::class, 'kode_brand2', 'kode_brand' );
    }
}
