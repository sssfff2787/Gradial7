<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase2 extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function purchase1()
    {
        return $this->belongsTo(purchase1::class);
    }

    public function Sales1Model()
    {
        return $this->belongsTo(Sales1Model::class, 'Sales1_id', 'kode_sale1' );
    }


}
