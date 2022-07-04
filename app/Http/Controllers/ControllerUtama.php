<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandModel;
use App\Models\KategoritokoModel;
use App\Models\Sepatu1Model;
use App\Models\Sepatu2Model;
use App\Models\Sales1Model;
use App\Models\Sales2Model;
use App\Models\Sales3Model;
use App\Models\TokoModel;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\UrlGenerator;

use Image;

class ControllerUtama extends Controller
{


    public $model;
    public $url;


    public function __construct()
    {
        //mengambil nama url
        $this->url = url()->current();     
        $this->url = explode("/", $this->url ); //memisahkan http://localhost/Gradial/public/ menjadi array
        $this->url = collect($this->url);
        
        $this->url = ($this->url->count()>5)?$this->url[5]:'brand';//jika jumlah array lebih 5 artinya artina itu jadi nilai url
      

      
        switch ($this->url ) {
            case 'brand':
                $this->model = new BrandModel();
                break;
            case 'kategoritoko':
                $this->model = new KategoritokoModel();
                break;
            case 'sepatu1':
                $this->model = new Sepatu1Model();
                break;
            case 'sepatu2':
                $this->model = new Sepatu2Model();
                break;
            case 'sales1':
                $this->model = new Sales1Model();
                break;
            case 'sales2':
                $this->model = new Sales2Model();
                break;
            case 'sales3':
                $this->model = new Sales3Model();
                break;
            
            case 'toko':
                $this->model = new TokoModel();
                break;
            
            default:
                # code...
                break;
        }

    }

    public function index()
    {   
        // return $this->url;
        // return $this->url->count();
        $data=array();
        $data['jenisinputIndex']= "index";
        $data['url']= $this->url;
        $data['dataDrmodel']= $this->model->getAll();
        $data['navAktif']= 'Data';
        // return  $data['dataDrmodel'] ;
        return view("$this->url.index",compact('data' ));
        // return view("$this->url.tables",compact('data' ));
        // return view("utama.index",compact('data' ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampil()
    {   
        $data['dataDrmodel']= $this->model->getAll();
        $data['url']= $this->url;
        if ($this->url=='siswa') {
            $data['namakolom']= ["nama", "tgl_masuk", "file"];
            
        }elseif ($this->url=='buku') {
            
            $data['namakolom']= ["judul", "pengarang", ""];
        }else {
           
            $data['namakolom']= ["id_kepemilikan", "id_siswa2", "id_buku2"];
        }

        return view("$this->url.create",compact('data' ));
        // return "Alhamdulillah  berhasil";
    }
    
   
}
