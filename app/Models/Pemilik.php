<?php

namespace App\Models;

use App\Models\PabrikModel;
use App\Models\BrandModel;
use App\Models\Sepatu1Model;
use App\Models\Sepatu2Model;
use App\Models\Sales2Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemilik extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $table = 'pabriks'; //nama table
    public $timestamps = false;
    protected $primaryKey ='id'; //primarykey


    public function namakelas(){
        $namakelas =__CLASS__;
        return  $namakelas;
    }


    public function getAll()
    {
        return Pemilik::all();
    }

  

    public function Pabrik()
    {
        return $this->hasMany(Pabrik::class);
    }

    public function BrandModel()
    {
        return $this->hasManyDeepFromRelations($this->Pabrik(), (new Pabrik)->BrandModel());
    }

    public function Sepatu1Model()
    {
        return $this->hasManyDeepFromRelations($this->BrandModel(), (new BrandModel)->Sepatu1Model());
    }

    public function Sepatu2Model()
    {
        return $this->hasManyDeepFromRelations($this->Sepatu1Model(), (new Sepatu1Model)->Sepatu2Model());
    }

    public function Sales2Model()
    {
        return $this->hasManyDeepFromRelations($this->Sepatu2Model(), (new Sepatu2Model)->Sales2Model());
    }

    // //brand memiliki relasi ke sales2 ( 4 tingkatan : brand->sepatu1->sepatu2->sales2)
    // // public function Sales2Model()
    // // {
    // //     return $this->hasManyDeep(Sales2Model::class, [Sepatu1Model::class, Sepatu2Model::class], ['kode_brand2', 'kode_sepatu2', 'idsepatu2'], ['kode_brand','kode_sepatu1', 'idsepatu']);
    // // }

    // //brand memiliki relasi ke sales2 ( 4 tingkatan : brand->sepatu1->sepatu2->sales2) dengan menggunkan relasi yg sudah ada
    // public function Sales2Model()
    // {
    //     return $this->hasManyDeepFromRelations($this->Sepatu2Model(), (new Sepatu2Model)->Sales2Model());
    // }

    // public function PabrikModel()
    // {
    //     return $this->hasManyDeepFromRelations($this->Sales2Model(), (new Sales2Model)->Sales2Model());
    // }


}
