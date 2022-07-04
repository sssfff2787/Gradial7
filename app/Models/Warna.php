<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
    use HasFactory;

    protected $guarded = ['kode'];

    protected $table = 'warnas'; //nama table
    public $timestamps = false;
    protected $primaryKey ='kode'; //primarykey
}
