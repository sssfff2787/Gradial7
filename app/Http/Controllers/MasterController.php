<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriTokoModel;

use App\Models\Pemilik;
use App\Models\Pabrik;
use App\Models\BrandModel;
use App\Models\Sepatu1Model;
use App\Models\Sepatu2Model;
use App\Models\Sales2Model;

use App\Models\Sales1Model;
use App\Models\Sales3Model;
use App\Models\TokoModel;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\UrlGenerator;

use Image;


class MasterController extends Controller
{
    public function __construct()
    {
         //mengambil nama url
         $this->url = url()->current();     
         $this->url = explode("/", $this->url ); //memisahkan http://localhost/Gradial/public/ menjadi array
         $this->url = collect($this->url);
         
         $this->url = ($this->url->count()>5)?$this->url[5]:'brand';//jika jumlah array lebih 5 artinya artinya itu jadi nilai url

         switch ($this->url ) {
            case 'brand':
                $this->model = BrandModel::all();
                // $this->model = new BrandModel();
                break;
            case 'kategori':
                $this->model =KategoritokoModel::all();
                break;
            case 'sepatu1':
                // $this->model = new Sepatu1Model();
                $this->model = Sepatu1Model::with('BrandModel')->get();

                break;
            case 'sepatu2':
                // $this->model = Sepatu2Model::all();
                $this->model = Sepatu2Model::with('Sepatu1Model')->orderBy('idsepatu', 'desc')->get();
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
                $this->model = TokoModel::with('KategoriTokoModel')->get();
                break;
            
            default:
                $this->model = new BrandModel();
                break;
        }
     
    }


    public function index()
    {
        $data['url'] = $this->url ;
        $data['model'] = $this->model ;
        // return $data['model'];
        
        // $data['sepatu2'] = Sepatu2Model::with('Sepatu1Model')->orderBy('idsepatu', 'desc')->get();
        // $data['waktu'] = date;
        // return $data['sepatu2'];
        return view("Master.$this->url.index",compact('data' ));
    }

    public function show(Request $request, $id)
    {
        // return $id;
        $idarr = explode("_",$id);
        $banyakID = count($idarr);
        $idsepatu = array();
        for ($i=2; $i < count($idarr) ; $i++) { 
            // $id.$i=$idarr[$i];
            // $idsepatu[$i] =$idarr[$i];
            $idsepatu[$i] =isset( $idarr[$i] )? $idarr[$i] :'';
        }
        // $x = (count($idarr)-1);
        // return $idsepatu;
        $id1 = isset( $idarr[1] )? $idarr[1] :'';
        $id2 = isset($idarr[2] )? $idarr[2] :'';
        // return $id1;
        switch ($idarr[0]) {
            case 'tabelIndex':
                $data['url'] = $this->url ;
                // $data['sepatu2'] = Sepatu2Model::with('Sepatu1Model')->orderBy('idsepatu', 'desc')->get();
                $data['model']=$this->model;
                // return url()->current(); 
                return view("Master.$this->url.tabelIndex", compact('data'));
                break;

            case 'sepatu2Add':    
                // return url()->current();             
                $data['jenisinput']= 'sepatu2Add';
                $data['sepatu1']= Sepatu1Model::all();
                $data['sepatu2']= Sepatu2Model::with(['Sepatu1Model'])->get();
                // return $data['jenisinput'];
                
                return view("Master.$this->url.FormAddSepatu2", compact('data'));
                // return view('Order.tabelSales1', compact('data'));
                break;
            
            case 'sepatu2Edit':
                // return url()->current(); 
                // return $id1;
                $data['jenisinput']=$idarr[0];
                $data['sepatu1']= Sepatu1Model::all();
                
                // cari data namastyle dari Sepatu1 melalui Sepatu2
                // ini cara menggunakan funtion akan menghasilkan data sepatu1 dalam array
                // $data['selected']= Sepatu2Model::find($id1)->Sepatu1Model()->get();
                // $data['selected']= $data['selected'][0]->namastyle;
                

                // cari data namastyle dari Sepatu1 melalui Sepatu2
                // ini cara menggunkan load akan menghasilkan data Sepatu2 dan sepatu 1 (tidak dalam array)
                $data['sepatu2']= Sepatu2Model::find($id1);
                $data['selected2']= $data['sepatu2']->load('Sepatu1Model');
                $data['selected']= $data['selected2']->Sepatu1model->namastyle;
                // return $data['selected2'];
                // return $data['sepatu2'];
                // $data['sepatu1'] = Sepatu1Model::whereBelongsTo($data['sepatu2'])->get();
                // $data['sepatu2']= $data['sepatu2']::with(['Sepatu1Model'])->get();
                // return $data['jenisinput'];
                // return $data['sepatu2'];
                
                return view("Master.$this->url.FormAddSepatu2", compact('data'));
                break;
            case 'sepatu2delete':
                // return url()->current(); 
                // return $id1;
                $sepatu2 = Sepatu2Model::find($id1);
                
                $sepatu2->delete();
                return "delete (sukses)";
                break;
            case 'brandAdd':    
                // return url()->current();             
                $data['jenisinput']= 'brandAdd';
                // return $data['jenisinput'];
                
                return view("Master.$this->url.FormAddBrand", compact('data'));
                // return view('Order.tabelSales1', compact('data'));
                break;
            case 'brandEdit':    
                // return url()->current();             
                $data['jenisinput']= 'brandEdit';
                $data['brand']= BrandModel::find($id1);
                
                // return $data['brand'];
                
                return view("Master.$this->url.FormAddBrand", compact('data'));
                // return view('Order.tabelSales1', compact('data'));
                break;
            case 'branddelete':
                // return url()->current(); 
                // return $id1;
                $brand = BrandModel::find($id1);
                
                $brand->delete();
                return "delete (sukses)";
                break;
            case 'sepatu1Add':    
                // return url()->current();             
                $data['jenisinput']= 'sepatu1Add';
                $data['brand']= BrandModel::all();
                $data['sepatu1']= $this->model;
                // return $data['jenisinput'];
                
                return view("Master.$this->url.FormAddSepatu1", compact('data'));
                // return view('Order.tabelSales1', compact('data'));
                break;
            case 'sepatu1Edit':
                // return url()->current(); 
                // return $id1;
                $data['jenisinput']=$idarr[0];
                $data['brand']= BrandModel::all();
                
                // cari data namastyle dari Sepatu1 melalui Sepatu2
                // ini cara menggunkan load akan menghasilkan data Sepatu2 dan sepatu 1 (tidak dalam array)
                $data['sepatu1']= Sepatu1Model::find($id1);
                $data['selected1']= $data['sepatu1']->load('BrandModel');
                $data['selected']= $data['selected1']->BrandModel->namabrand;
                // return $data['selected1'];
                // return $data['sepatu1'];
                // $data['sepatu1'] = Sepatu1Model::whereBelongsTo($data['sepatu1'])->get();
                // $data['sepatu1']= $data['sepatu1']::with(['Sepatu1Model'])->get();
                // return $data['jenisinput'];
                // return $data['sepatu1'];
                
                return view("Master.$this->url.FormAddSepatu1", compact('data'));
                break;
            case 'sepatu1delete':
                // return url()->current(); 
                // return $id1;
                $sepatu1 = Sepatu1Model::find($id1);
                
                $sepatu1->delete();
                return "delete (sukses)";
                break;
            case 'kategoriAdd':    
                // return url()->current();             
                $data['jenisinput']= 'kategoriAdd';
                // return $data['jenisinput'];
                
                return view("Master.$this->url.FormAddKategori", compact('data'));
                // return view('Order.tabelSales1', compact('data'));
                break;
            case 'kategoridelete':
                // return url()->current(); 
                // return $id1;
                $kate = KategoriModel::find($id1);
                
                $kate->delete();
                return "delete (sukses)";
                break;
            case 'kategoriEdit':    
                // return url()->current();             
                $data['jenisinput']= 'kategoriEdit';
                $data['kate']= KategoriTokoModel::find($id1);
                
                // return $data['kate'];
                
                return view("Master.$this->url.FormAddKategori", compact('data'));
                // return view('Order.tabelSales1', compact('data'));
                break;
            case 'tokoAdd':    
                // return url()->current();             
                $data['jenisinput']= 'tokoAdd';
                $data['kate']= KategoriTokoModel::all();
                // return $data['jenisinput'];
                
                return view("Master.$this->url.FormAddToko", compact('data'));
                // return view('Order.tabelSales1', compact('data'));
                break;
            case 'tokoEdit':    
                // return url()->current();             
                $data['jenisinput']= 'tokoEdit';
                // $data['toko']= TokoModel::find($id1);
                
                
                $data['kate']= KategoriTokoModel::all();
                // return $data['kate'];
                
                // cari data namastyle dari Sepatu1 melalui Sepatu2
                // ini cara menggunkan load akan menghasilkan data Sepatu2 dan sepatu 1 (tidak dalam array)
                $data['toko']= TokoModel::find($id1);
                $data['selected1']= $data['toko']->load('KategoriTokoModel');
                $data['selected']= $data['selected1']->KategoriTokoModel->namakate;
                // return $data['toko'];
                // return $data['selected'];

                return view("Master.$this->url.FormAddToko", compact('data'));
                // return view('Order.tabelSales1', compact('data'));
                break;
            case 'tokodelete':
                // return url()->current(); 
                // return $id1;
                $toko = TokoModel::find($id1);
                
                $toko->delete();
                return "delete (sukses)";
                break;

         
        }
    

    }


    public function store(Request $request)
    {
        // return $request;
  
        $jenisinput = $request->jenisinput;
        switch ($jenisinput) {
            
            case 'brandAdd':
                // return $request->namabrand;
                $brand = new BrandModel;
                // $sepatu2->idsepatu =  $request->idsepatu;
                // $brand->kode_brand  =  $request->kode_brand;
                $brand->namabrand =  $request->namabrand;   
                $brand->save();
                return $brand;
                break;
            case 'brandEdit':
                // return $request->warna;
                $brand = BrandModel::find($request->kode_brand);
                $brand->kode_brand  =  $request->kode_brand;
                $brand->namabrand =  $request->namabrand;  
                $brand->save();
                return $brand;
                break;
            
            case 'sepatu1Add':
                // return $request->warna;
                $sepatu1 = new Sepatu1Model;
                // $sepatu1->kode_sepatu1  =  $request->kode_sepatu1;
                $sepatu1->kode_brand2 =  $request->kode_brand;
                $sepatu1->namastyle  =  $request->namastyle;  
                $sepatu1->sizemin =  $request->sizemin;   
                $sepatu1->sizemax =  $request->sizemax;   
                $sepatu1->save();
                return $sepatu1;
                break;
            case 'sepatu1Edit':
                $sepatu1 = Sepatu1Model::find($request->kode_sepatu1);
                $sepatu1->kode_sepatu1 =  $request->kode_sepatu1;
                $sepatu1->kode_brand2 =  $request->kode_brand;
                $sepatu1->namastyle  =  $request->namastyle;  
                $sepatu1->sizemin =  $request->sizemin; 
                $sepatu1->sizemax =  $request->sizemax;    
                $sepatu1->save();
                return $sepatu1;
                break;
            case 'sepatu2Add':
                // return $request->warna;
                $sepatu2 = new Sepatu2Model;
                // $sepatu2->idsepatu =  $request->idsepatu;
                $sepatu2->kode_sepatu2  =  $request->kode_sepatu;
                $sepatu2->kodeart =  $request->kodeart;
                $sepatu2->warna  =  $request->warna;  
                $sepatu2->ketsepatu =  $request->ket;   
                $sepatu2->save();
                return $sepatu2;
                break;
            case 'sepatu2Edit':
                $sepatu2 = Sepatu2Model::find($request->idsepatu);
                $sepatu2->idsepatu =  $request->idsepatu;
                $sepatu2->kode_sepatu2  =  $request->kode_sepatu;
                $sepatu2->kodeart =  $request->kodeart;
                $sepatu2->warna  =  $request->warna;  
                $sepatu2->ketsepatu =  $request->ket;   
                $sepatu2->save();
                return $sepatu2;
                break;
            case 'kategoriAdd':
                // return $request->namakate;
                $kategori = new KategoriTokoModel;
                // $sepatu2->idsepatu =  $request->idsepatu;
                // $kategori->kode_kategori  =  $request->kode_kategori;
                $kategori->namakate =  $request->namakate;   
                $kategori->diskon =  $request->diskon;   
                $kategori->save();
                return $kategori;
                break;
            case 'kategoriEdit':
                // return $request->warna;
                $kategori = KategoriTokoModel::find($request->kode_kate);
                $kategori->kode_kate  =  $request->kode_kate;
                $kategori->namakate =  $request->namakate;  
                $kategori->save();
                return $kategori;
                break;
            case 'tokoAdd':
                // return $request->namakate;
                $toko = new TokoModel;
                // $sepatu2->idsepatu =  $request->idsepatu;
                // $toko->kode_toko  =  $request->kode_toko;
                $toko->kode_kate2 =  $request->kode_kate;   
                $toko->namatoko =  $request->namatoko;   
                $toko->alamat =  $request->alamat;   
                $toko->kota =  $request->kota;   
                $toko->telp =  $request->telp;   
                $toko->person =  $request->person;   
                $toko->save();
                return $toko;
                break;
            case 'tokoEdit':
                // return $request->warna;
                $toko = TokoModel::find($request->kode_toko);
                $toko->kode_toko  =  $request->kode_toko;
                $toko->kode_kate2 =  $request->kode_kate;   
                $toko->namatoko =  $request->namatoko;   
                $toko->alamat =  $request->alamat;   
                $toko->kota =  $request->kota;   
                $toko->telp =  $request->telp;   
                $toko->person =  $request->person;   
                $toko->save();
                return $toko;
                break;

            

        }
    }

}