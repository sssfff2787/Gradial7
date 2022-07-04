<?php

namespace App\Models;

use App\Models\purchase2;
use App\Models\Sales1Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class purchase1 extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    public function purchase2()
    {
        return $this->hasMany(purchase2::class);
    }

    public function Sales1Model()
    {
        return $this->hasMany(Sales1Model::class, 'purchase1_id', 'id' );
    }
    public function BrandModel()
    {
        return $this->belongsTo(BrandModel::class, 'brand_id', 'kode_brand' );
    }

}
