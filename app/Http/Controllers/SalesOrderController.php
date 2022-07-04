<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Pabrik;

use App\Models\Pemilik;
use App\Models\TokoModel;
use App\Models\BrandModel;
use App\Models\Sales1Model;
use App\Models\Sales2Model;
use App\Models\Sales3Model;

use App\Models\Sepatu1Model;
use App\Models\Sepatu2Model;
use Illuminate\Http\Request;

use App\Models\KategoritokoModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Redirect;


class SalesOrderController extends Controller
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

            case 'order':
                // $this->model = new Sepatu1Model();
                $this->model = new BrandModel();
                $this->model2 = new TokoModel();
                $this->model22 = new Sepatu1Model();
                $this->model3 = new Sepatu2Model();
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
        // $data['jenisinputIndex']= "index";
        $data['jenisinput'] = 'index';
        $data['url']= $this->url;
        // if ($this->url=='order') {
        //     $data['model']= $this->model::with(['Sepatu1Model'])->get();
            
        // }else{
        //     $data['model']= $this->model->getAll();
        // }
        // return view('Order.SO.index3', compact('data'));
        return view("$this->url.index",compact('data' ));
        
        // return view("utama.index",compact('data' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->url;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function action(Request $request)
    {
        $coba = collect($request->kode_sales1);
        // return $coba;
        if($request->ajax())
    	{   
            
            // $tgl = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d');
            // $tahun = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y');
            // $nomax = Sales1Model::where('tahun',$tahun )->max('nosales');
            // $nomax++;
            // $lbnosales = 'S'.substr( $tahun,2,2).'-'.sprintf("%03d", $nomax);

    		if($request->action == 'edit')
    		{   
                
    			// $tgl = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d');
                // $tahun = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y');
                // $nomax = Sales1Model::where('tahun',$tahun )->max('nosales');
                // $nomax++;
                // $lbnosales = 'S'.substr( $tahun,2,2).'-'.sprintf("%03d", $nomax);

                $sales1 = Sales1Model::find($request->kode_sales1);
                // $sales1->tahun =  $tahun;
                // $sales1->nosales =  $nomax;
                // $sales1->lbnosales =  $lbnosales;
                // $sales1->tanggal =  $tgl;  
                // $sales1->kode_toko2 =  $request->toko;
                $sales1->ketsales =  $request->ket;   
                $sales1->save();
                // return $request->kode_sales1;
    		}

    		if($request->action == 'delete')
    		{
    			DB::table('sales1')
                    ->where('kode_sales1', $request->kode_sales1)
    				->delete();
    		}
    		return response()->json($request);
    	}
    }
    public function store(Request $request)
    {
        // return $request;
  
        $jenisinput = $request->jenisinput;
        switch ($jenisinput) {
            case 'orderCreate':
                // $data['tgl'] = $request->tanggal ? date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d') : '';
                // $data['tahun'] = $request->tanggal ? date_format(date_create_from_format('d M Y', $request->tanggal), 'Y') : '';
                // $data['tahun2'] = substr( $data['tahun'], 2);

                $tgl = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d');
                $tahun = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y');
                $nomax = Sales1Model::where('tahun',$tahun )->max('nosales');
                $nomax++;
                $lbnosales = 'S'.substr( $tahun,2,2).'-'.sprintf("%03d", $nomax);

                $sales1 = new sales1Model;
                $sales1->tahun =  $tahun;
                $sales1->nosales =  $nomax;
                $sales1->lbnosales =  $lbnosales;
                $sales1->tanggal =  $tgl;  
                $sales1->kode_toko2 =  $request->toko;
                $sales1->ketsales =  $request->ket;   
                $sales1->save();
                

                // return $lbnosales;
                
                // $this->model = new Sales1Model();
                // $data['nomax']= $this->model::where('tahun',$data['tahun'] )->max('nosales');
                
                // $this->model = new Sales1Model();
                // $data['nomax']= Sales1Model::where('tahun',$data['tahun'] )->max('nosales');
                // $data['nomax'] ++;
                // $data['lbnosales']='S'.substr( $data['tahun'],2,2).'-'.sprintf("%03d", $data['nomax']);
                // return $data['lbnosales'];

                // return $data['nomax'];
                // $data['model']=  $this->model->saveData($request, $data );
                //$data['model']=  Sales1Model::save();
                return $sales1;
                break;
            case 'orderCreateDetail':
                // return $request;
                // idsepatu_1: "10"
                // idsepatu_2: "20"
                // jenisinput: "orderCreateDetail"
                // jmhsepatu: "2"
                // ket: "baru"
                // no_po: "abc"
                // sizemax_1: "43"
                // sizemax_2: "26"
                // sizemin_1: "38"
                // sizemin_2: "22"
                // subtot_1: "6"
                // subtot_2: "10"
                // tanggal: "9 May 2022"
                // kode_sales1: "8"
                // qty-1-38: "1"
                // qty-1-39: "1"
                // qty-1-40: "1"
                // qty-1-41: "1"
                // qty-1-42: "1"
                // qty-1-43: "1"

                $tgl = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d');
                $tahun = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y');
                $nomax = Sales1Model::where('tahun',$tahun )->max('nosales');
                $nomax++;
                $lbnosales = 'S'.substr( $tahun,2,2).'-'.sprintf("%03d", $nomax);

                $sales1 = new sales1Model;
                $sales1->tahun =  $tahun;
                $sales1->nosales =  $nomax;
                $sales1->lbnosales =  $lbnosales;
                $sales1->tanggal =  $tgl;  
                $sales1->kode_toko2 =  $request->toko;
                $sales1->ketsales =  $request->ket;   
                $sales1->save();

                // return $request->idsepatu_2;
                $jmhsepatu = $request->jmhsepatu;
                $kode_sales1 = $sales1->kode_sales1; //ini merujuk kmn??

                for ($i=1; $i <= $jmhsepatu; $i++) { 
                    $status = "status_".$i;
                    $statusEdit = $request->$status;

                    // return "status_".$i;
                    // return $statusEdit;
                    
                    $text = "idsepatu_".$i;
                    $text2 = "idsales2_".$i;
                    $idsepatu = $request->$text;
                    $idsales2 = $request->$text2;
                    // return $idsales2 ;
                   if ($statusEdit=="new") {
                        // $sales2 = new Sales2Model;
                        // return "ini new";
                        $sales2 = new Sales2Model;
                        $sales2->kode_sales2 = $kode_sales1;
                        $sales2->idsepatu2 = $idsepatu;
                        $sales2->save();
    
                        //simpan qty order (sales3)
                        $text1 = "sizemin_".$i;
                        $text2 = "sizemax_".$i;
                        $sizemin = $request->$text1 ;
                        $sizemax   = $request->$text2 ;
                         // return ("sales2");
                         for ($size=$sizemin; $size <=$sizemax ; $size++) { 
                            $text="qty-".$i."-".$size;
                            $text2="idsales3_".$i."_".$size;
                            $qty = $request->$text;
                            $idsales3 = $request->$text2;
                            
                            $sales3 = new Sales3Model;
                            $sales3->kode_sales3 = $kode_sales1;
                            $sales3->idsepatu3 = $idsepatu;
                            $sales3->size = $size;
                            $sales3->qty = $qty;
                            $sales3->save();
                         }
                    } elseif ($statusEdit=="tambahDelete") {
                        
                    }
                    
                }

                return "Save ok";


                // $this->model = new Sales1Model();
                // $data['model']= $this->model::where('kode_sales1', $request->kode_sales1)->first();
                // $data['model']= $data['model']->editData($request);
                // return $data['model'];  
                break;
            case 'orderEdit':
                // return $request;
                // $sales2 = Sales2Model::with('BrandModel')->where('kode_sales2',$request->kode_sales1)->get();
                // $sales2 = $sales2->load('BrandModel');
                // return $sales2[0]->BrandModel->namabrand;
                // deletebariske-1: "1"
                // deletebariske-2: "2"
                // idsales2_1: "1"
                // idsales2_2: "2"
                // idsales3_1_38: "1"
                // idsales3_1_39: "2"
                // idsales3_1_40: "3"
                // idsales3_1_41: "4"
                // idsales3_1_42: "5"
                // idsales3_1_43: "6"
                // idsales3_2_22: "7"
                // idsales3_2_23: "8"
                // idsales3_2_24: "9"
                // idsales3_2_25: "10"
                // idsales3_2_26: "11"
                // idsepatu_1: "11"
                // idsepatu_2: "20"
                // jenisinput: "orderEdit"
                // jmhsepatu: "2"
                // ket: "edit 4"
                // kode_sales1: "1"
                // qty-1-38: "1"
                // qty-1-39: "1"
                // qty-1-40: "1"
                // qty-1-41: "1"
                // qty-1-42: "1"
                // qty-1-43: "2"
                // qty-2-22: "2"
                // qty-2-23: "2"
                // qty-2-24: "2"
                // qty-2-25: "2"
                // qty-2-26: "2"
                // sizemax_1: "43"
                // sizemax_2: "26"
                // sizemin_1: "38"
                // sizemin_2: "22"
                // subtot_1: "7"
                // subtot_2: null
                // tanggal: "10 May 2022"
                // toko: "5"
                // _token: "vRbaOARAzidRd9nYEdAxoB0rKuoL1BwYJ45HFvAf"
                                               
                $tgl = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d');
                $tahun = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y');
                $nomax = Sales1Model::where('tahun',$tahun )->max('nosales');
                $nomax++;
                $lbnosales = 'S'.substr( $tahun,2,2).'-'.sprintf("%03d", $nomax);

                $sales1 = Sales1Model::find($request->kode_sales1);
                $sales1->kode_sales1 =  $request->kode_sales1;
                $sales1->tahun =  $tahun;
                $sales1->nosales =  $nomax;
                $sales1->lbnosales =  $lbnosales;
                $sales1->tanggal =  $tgl;  
                $sales1->kode_toko2 =  $request->toko;
                $sales1->ketsales =  $request->ket;   
                $sales1->save();


                $jmhsepatu = $request->jmhsepatu;
                $kode_sales1 = $request->kode_sales1;
                // return $request->status_1;
                // return "ini di kontroller ".$jmhsepatu;
                for ($i=1; $i <= $jmhsepatu; $i++) { 
                    $status = "status_".$i;
                    $statusEdit = $request->$status;

                    // return "status_".$i;
                    // return $statusEdit;
                    
                    $text = "idsepatu_".$i;
                    // $text2 = "idsales2_".$i;
                    $idsepatu = $request->$text;
                    // $idsales2 = $request->$text2;
                    // return $idsales2 ;
                    if ($statusEdit=="edit") {

                        
                        // return $status;
                        //jika edit harusnya sales2 tidak berubah ?? yg berubah hanya sales3
                        // $sales2 = Sales2Model::find($idsales2);
                        // $sales2->idsales2 = $idsales2;

                        // $sales2->kode_sales2 = $kode_sales1;
                        // $sales2->idsepatu2 = $idsepatu;
                        // $sales2->save();

                         //simpan qty order (sales3)
                        //  $text1 = "sizemin_".$i;
                        //  $text2 = "sizemax_".$i;
                        //  $sizemin = $request->$text1 ;
                        //  $sizemax   = $request->$text2 ;
                         // return ("sales2");
                         $sales3 = Sales3Model::where('kode_sales3', $kode_sales1)->get()->where('idsepatu3', $idsepatu);
                        //  return $sales3;

                        // $text12 ="";
                         
                         foreach ($sales3 as $key) {
                             $text="qty-".$i."-".$key->size;
                             $qty = $request->$text;
                             $key->qty = $qty;
                           
                             $key->save();
                            //  $text12 =$text12." ".$text. " = ". $qty;
                         }

                        //  return $text12;

                        //  for ($size=$sizemin; $size <=$sizemax ; $size++) { //ini pengulangan sebanyak jumhlah size, karena size yg null tetap di simpan tp jika size null tidak di simpan maka ini harus di rubah
                        //      $text="qty-".$i."-".$size;
                        //      $text2="idsales3_".$i."_".$size;
                        //      $qty = $request->$text;
                        //      $idsales3 = $request->$text2;
                        //      // return $idsales3;
                        //      $sales3 = Sales3Model::find($idsales3);
                        //     // //  $sales3->idsales3 = $idsales3;
                        //     //  $sales3->kode_sales3 = $kode_sales1;
                        //     //  $sales3->idsepatu3 = $idsepatu;
                        //     //  $sales3->size = $size;
                        //      $sales3->qty = $qty;
                        //      // $sales3->save()->toSql();
                        //      $sales3->save();
                        //      // var_dump($sales3);
                        //      // return "sales3";
                        //  }
                        
                    }elseif ($statusEdit=="new") {
                        // $sales2 = new Sales2Model;
                        // return "ini new";
                        $sales2 = new Sales2Model;
                        $sales2->kode_sales2 = $kode_sales1;
                        $sales2->idsepatu2 = $idsepatu;
                        $sales2->save();
    
                        //simpan qty order (sales3)
                        $text1 = "sizemin_".$i;
                        $text2 = "sizemax_".$i;
                        $sizemin = $request->$text1 ;
                        $sizemax   = $request->$text2 ;
                         // return ("sales2");
                         for ($size=$sizemin; $size <=$sizemax ; $size++) { 
                            $text="qty-".$i."-".$size;
                            // $text2="idsales3_".$i."_".$size;
                            $qty = $request->$text;
                            // $idsales3 = $request->$text2;
                            
                            $sales3 = new Sales3Model;
                            $sales3->kode_sales3 = $kode_sales1;
                            $sales3->idsepatu3 = $idsepatu;
                            $sales3->size = $size;
                            $sales3->qty = $qty;
                            $sales3->save();
                         }
                    } elseif ($statusEdit=="delete") {
                        // $sales1 = Sales1Model::find($request->kode_sales1);
                        // $sales1->delete();

                        // //kalau delete logika yg di hapus sales2 dan sales3 berdasrkan idsepatu2
                            $sales2 = Sales2Model::where('kode_sales2', $request->kode_sales1)->get()->where('idsepatu2', $idsepatu);
                            // return $sales2;
                            foreach ($sales2 as $key) {
                                $key->delete();
                            }
                        
                            
                            $sales3 = Sales3Model::where('kode_sales3', $kode_sales1)->get()->where('idsepatu3', $idsepatu);
                            // return $sales3;
                            foreach ($sales3 as $key) {
                                $key->delete();
                            }
                            // $sales3->delete();

                            // return $statusEdit;
                            // $sales2 = Sales2Model::find($idsales2);
                            // $sales2->delete();
    
                            //  //simpan qty order (sales3)
                            //  $text1 = "sizemin_".$i;
                            //  $text2 = "sizemax_".$i;
                            //  $sizemin = $request->$text1 ;
                            //  $sizemax   = $request->$text2 ;
                            //  // return ("sales2");
                            //  for ($size=$sizemin; $size <=$sizemax ; $size++) { 
                            //     //  $text="qty-".$i."-".$size;
                            //      $text2="idsales3_".$i."_".$size;
                            //     //  $qty = $request->$text;
                            //      $idsales3 = $request->$text2;
                            //      // return $idsales3;
                            //      $sales3 = Sales3Model::find($idsales3);
                                 
                            //      $sales3->delete();
                                
                            //  }



                    }elseif ($statusEdit=="tambahDelete") {
                        
                    }


                       
                    
                    
                }
            
                return "Edit ok1";

                // $this->model = new Sales1Model();
                // $data['model']= $this->model::where('kode_sales1', $request->kode_sales1)->first();
                // $data['model']= $data['model']->editData($request);
                // return $data['model'];
                break;
            
            default:
                # code...
                break;
        }
        if($jenisinput == "Create"){
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            case 'panel1': //saat pertama kali url order ke index (view order.index), mengembalikan view sales1.index.blade.php
                // return $id;
                // $this->model = new Sales1Model();
                // // $data['model']=  $this->model->getAll();
                // // $data['model']= $this->model::with(['TokoModel'])->orderBy('lbnosales', 'desc')->get();
                // $data['model']= $this->model->orderBy('lbnosales', 'desc')->get();
                $data['url']= $this->url;
                // $data['sales1']= new Sales1Model();
                $data['sales1']=  Sales1Model::with(['TokoModel'])->orderBy('lbnosales', 'desc')->get();
                // return $data['sales1'];
                return view('Order.tabelIndexOrder2', compact('data'));
                // return view('Order.tabelSales1', compact('data'));
                break;
            case 'OBSOK': 
                // return $id;
                $data['jenisinput'] = "orderShow";
                $data['sales1']=  Sales1Model::find($id1); //ini g boleh di hapus
                // $data['sales2']=  Sales2Model::where('kode_sales2',$id1)->get(); //ini g boleh di hapus
                // $data['sales2']= Sales1Model::find($id1)->Sales2Model->load('Sales1Model','Sepatu2Model'); //jikapake where g bisa
                // $data['sales2']= Sales1Model::find($id1)->Sales2Model; 
                // $data['sales2']= Sales1Model::find($id1)->Sales2Model->Sepatu2Model()->get(); 
                // $data['sales2']= Sales1Model::find($id1)->Sales2Model->load('Sepatu2Model'); //ini
                // return $data['sales2'];
                
                //untuk menampung idsepatu2 (11 & 20 )
                // $idsepatu = array();
                // foreach ($data['sales2'] as $item) {
                //     $idsepatu[] = $item->idsepatu2;
                // }

                // $sepatu2 = Sepatu2Model::whereIn('idsepatu',$idsepatu)->get();
                // $sepatu2 = Sepatu2Model::whereIn('idsepatu',$idsepatu)->load('Sepatu1Model');//ini tidak bisa karena tidak menggunkan find(primary key)
                // return $sepatu2;
                // $data['sales3'] = Sales3Model::where('kode_sales3',$id1)->get();
                // $data['sizemin']=$data['sales3']->min('size');
                // $data['sizemax']=$data['sales3']->max('size');
                // // return $data['sales3'];
                // foreach($data['sales3'] as $item){
                //     $data['qtysales'][$item->idsepatu3][$item->size] = $item->qty;
                // }
                $data['statusSO']="DRAF";
                $data['statusKIK']="WAIT";

                return view('Order.DetailSales1', compact('data'));
                // return view('Order.DetailSales3', compact('data'));
                break;
            case 'tabelShow':
                $data['jenisinput'] = "tabelShow";
                // $data['sales1']=  Sales1Model::find($id1); //ini g boleh di hapus
                // $data['sales2']=  Sales2Model::whereBelongsTo($data['sales1'])->get(); //ini g boleh di hapus
                // $data['sales2']=  Sales2Model::where('kode_sales2',  $id1)->get(); //ini g boleh di hapus
                // $data['sales2'] =Sales2Model::with( 'Sales1Model','Sepatu2Model','Sepatu1Model')->where('kode_sales2', $id1)->toSql(); 
                // $data['sales2'] =Sales2Model::with( 'Sales1Model','Sepatu2Model','Sepatu1Model','BrandModel', 'Pabrik')->where('kode_sales2', $id1)->get(); 
                $data['sales2'] =Sales2Model::with( 'Sales1Model','Sepatu2Model','Sepatu1Model','BrandModel')->where('kode_sales2', $id1)->get(); 
                // $data['brand'] =BrandModel::with( 'Sales2Model')->where('kode_brand', 1)->get();
                // // return $data['brand'] ;

                // $data['pabrik'] = Pabrik::with( 'BrandModel', 'Sepatu1Model', 'Sepatu2Model', 'Sales2Model')->where('id', 1)->get();
                // // return $data['pabrik'] ;

                // $data['pemilik'] = Pemilik::with( 'Sales2Model')->where('id', 1)->get();
                // return $data['pemilik'] ;

                // dd($data['sales2']);
                // return $data['sales2'];
                $data['sales3'] = Sales3Model::where('kode_sales3',$id1)->get();
                $data['sizemin']=$data['sales3']->min('size');
                $data['sizemax']=$data['sales3']->max('size');
                foreach($data['sales3'] as $item){
                    $data['qtysales'][$item->idsepatu3][$item->size] = $item->qty;
                }
                // return $data['sales1'];
                // $data['statusSO']="DRAF";
                // $data['statusKIK']="WAIT";

                return view('Order.tabelShow', compact('data') );
                break;
            case 'OBAK': //OBAK (order button add klik ) ketika tombol btnadd maka buka form create Sales1 
                // $data['jenisinput'] = "orderCreate";
                $data['toko']=  TokoModel::all();
                
                $data['kode_sales1']= $id1;
                $data['jenisinput']= "orderCreateDetail";
                $data['url']= $this->url;
                $data['brand']= new BrandModel();
                $data['brand']= $this->model::with(['Sepatu1Model'])->get();
                // $data['model']= response()->json($data['model']);
                
                // return $data['model'];
                // return response()->json($data['model']);
                // return view('Order.SO.Form', compact('data'));
                return view('Order.inputDataSales3', compact('data'));
                break;
            case 'OBEK': //OBEK (order button edit klik ) ketika tombol btnEdit maka buka view Order.DetailSales1 
                // return $id;
                $data['jenisinput'] = "orderEdit";
               
                $data['toko']=  TokoModel::all();
                
                $data['kode_sales1']= $id1;

                $data['url']= $this->url;

                $data['brand']= BrandModel::all();
                // $data['brand']= BrandModel::with(['Sepatu1Model'])->get();
                $data['sales1'] = Sales1Model::find($id1);
                $data['sales2'] = Sales2Model::with('BrandModel')->where('kode_sales2',$id1)->get();
                // return $data['sales2'];
                // return $data['sales2']->Sepatu2Model->Sepatu1Model->namastyle;
                $data['sales3'] = Sales3Model::where('kode_sales3',$id1)->get();
                $data['sizemin']=$data['sales3']->min('size');
                $data['sizemax']=$data['sales3']->max('size');
                // return $data['sales3'];
                foreach($data['sales3'] as $item){
                    $data['qtysales'][$item->idsepatu3][$item->size] = $item->qty;
                }
               
                // $data['sales1']= Sales1Model::all();
                // $data['brand']= BrandModel::with(['Sepatu1Model'])->get();
                // $data['model']= response()->json($data['model']);
                
                // return $data['qtysales'];
                // return response()->json($data['model']);
                // return view('Order.SO.Form', compact('data'));
                return view('Order.inputDataSales3', compact('data'));

            case 'OBDEK':
                // return $id1;
                $sales1 = Sales1Model::find($id1);
                $sales1->delete();         
                    // return $status;
                    $sales2 = Sales2Model::where('kode_sales2',$id1);
                    $sales2->delete();


                    $sales3 = Sales3Model::where('kode_sales3',$id1);                    
                    $sales3->delete();
                    return "delete (sukses)";
                return view('Order.index', compact('data'));
                break;
            case 'sepatu2':
                // return $id1;
                // $data['idsepatu'] =$idsepatu;
                // $data['sepatu2'] =Sepatu2Model::whereNotIn('idsepatu',$idsepatu)->get();
                // $data['sepatu2'] =Sepatu2Model::find($idsepatu[2])->load('Sepatu1Model');
                // return $data['sepatu2'] ;   
                // // $data['BrandModel']= BrandModel::find($id1)->Sepatu1Model->load('Sepatu2Model');
                // $data['Sepatu1']= BrandModel::find($id1)->Sepatu1Model;
                // // return $data['Sepatu1'];
                // $kode_sepatu =array();
                // foreach ($data['Sepatu1'] as $key) {
                //     $kode_sepatu[] = $key->kode_sepatu1;
                // }
                // // return $kode_sepatu;

                // $data['sepatu2'] =Sepatu2Model::whereIn('kode_sepatu2',$kode_sepatu)->whereNotIn('idsepatu',$idsepatu)->get();
                
                // $data['sepatu2'] =$data['sepatu2']->whereNotIn('idsepatu',$idsepatu)->all();
                // $data['BrandModel'] = Sepatu1Model::whereRelation('BrandModel', 'kode_brand', $id1)->get();
                // $data['BrandModel']= BrandModel::find($id1)->Sepatu1Model->Sepatu2Model->get();

                // $sepatu2 = Sepatu2Model::whereIn

                // return $data['sepatu2'];

                // $brand = BrandModel::whereIn('kode_brand', [1,2])->get();
                // $posts = Sepatu1Model::whereBelongsTo($brand)->get();

                // $brand = BrandModel::where('kode_brand', $id1)->get();
                $posts = BrandModel::find($id1)->Sepatu1Model;
                // $posts = Sepatu1Model::whereBelongsTo($brand)->get();
                $data['sepatu2br']= Sepatu2Model::whereBelongsTo($posts)->whereNotIn('idsepatu',$idsepatu)->get();
                // return $data['sepatu2br'];
                // $brand = BrandModel::whereIn('kode_brand', [1,2])->get();
                // $posts = Sepatu1Model::whereBelongsTo($brand)->get();

                // $posts =Sepatu1Model::where("idsepatu", 1)->get();

                // $posts = Sepatu2Model::whereRelation('BrandModel', 'kode_brand', 1)->get();
                // $posts = Sepatu2Model::whereRelation('Sepatu1Model', 'kode_sepatu2', 1)->get();
                // $posts = Sepatu2Model::find(11);
                // $sepatu1 = $posts->Sepatu1Model->BrandModel;
                
                return view('Order.selectArtikelByBrand', compact('data'));
                // return view('Order.selectBrand2', compact('data'));
                break;
            //saat tombol go di klik
            case 'tabel':
                //  return $id2;
                
                $data['idGo']=$id2;
                // return $data['idGo'];
                $data['url']='order';
                // $data['model']= Sepatu2Model::find($id1);
                // $data['model2']= Sepatu2Model::find($id1)->Sepatu1Model->load('BrandModel');
                // // return $data['model2']= BrandModel::find($data['model']->Sepatu1model->kode_sepatu1);
                // return $data['model']= $data['model']::with('Sepatu1Model')->get();
                $data['sepatu2'] = Sepatu2Model::find($id1);
                // $data['sales2'] = Sales2Model::find($id1);

                // return view('Order.tabelEdit', compact('data'));
                
                return view('Order.tabelTambah', compact('data'));
                // return view('Order.tabelSales3', compact('data'));
                break;
                //saat JS dr view InputDataSales3.php di jalankan
            case 'tabel2':
                //  return $id2;
                
                 $data['idGo']=$id2;
                // return $data['idGo'];
                $data['url']='order';
                $data['kode_sales1']=$id1;
                // $data['model']= Sepatu2Model::find($id1);
                // $data['model2']= Sepatu2Model::find($id1)->Sepatu1Model->load('BrandModel');
                // return $data['model2']= BrandModel::find($data['model']->Sepatu1model->kode_sepatu1);
                // return $data['model']= $data['model']::with('Sepatu1Model')->get();
                
                // $data['sales2'] = Sales2Model::where('kode_sales2',$id1)->get();
                $data['sales2'] = Sales2Model::with(['Sepatu2Model', 'Sepatu1Model'])->where('kode_sales2',$id1)->get();

                $data['sales3'] = Sales3Model::where('kode_sales3',$id1)->get();
                $data['sizemin']=$data['sales3']->min('size');
                $data['sizemax']=$data['sales3']->max('size');
                // return $data['sales3'];
                foreach($data['sales3'] as $item){
                    $data['qtysales'][$item->idsepatu3][$item->size] = $item->qty;
                    $data['idselas3'][$item->idsepatu3][$item->size] =$item->idsales3;
                }
                // return $data['idselas3'][$item->idsepatu3][$item->size];
                // return view('Order.SO.tabelInput', compact('data'));
                return view('Order.tabelEdit', compact('data'));
                break;
           
            case 'adddatasales1':
                return $id;
                $this->model = new Sales1Model();
                $data="";
                $data['model']=  $this->model->saveData($request, $data);
                return $data['model']; view('sales1.index', compact('data'));
                break;
            case 'editDataSales1':
                return $id;
                // $this->validasi();
                $this->model = new Sales1Model();


                // $data['model']=  $this->model->getAll();
                // return view('sales1.index', compact('data'));
                break;

            case 'inputdatasales1':
                return $id;
                $tgl = $request->tanggal? date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d') : '';
                // return $tanggal;

                $this->model = new TokoModel();
                $data['model']=  $this->model->saveData($request,  $tgl);
                $data['model']=  $this->model->getAll();
                return view('sales1.index', compact('data'));
                // $siswa = $this->model;
                // $siswa->saveData($request,  $tgl);

                // $this->model = new BrandModel();
                // $data['model']= $this->model::with(['Sepatu1Model'])->get();
                // return $data['model'];
                // return view('Order.SO.Form', compact('data'));
                // return view('Order.SO.index3', compact('data'));
                return view('Order.Form', compact('data'));
                break;


            
            default:
                # code...
                break;
        }
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validasi(Request $request )
    {
        // return $request;

        
        $this->validate($request,[
            'toko' => 'required',
            'ket' => 'required'

         ]);
        return $request;
        return $request->tanggal;
        //  return view('Order.Form',['data' => $request]);
     
    }

    //untuk menangani jika tombol Simpan di form create selas1 di klik simpan data ke database(tabel sales1)
    public function adddatasales1(Request $request) 
    {
        return $request;
        $tgl = $request->tanggal ? date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d') : '';
        // return $tgl;
        // return $request->toko;
        $req= $request;
        $data="";
        $this->model = new Sales1Model();
        $data['model']=  $this->model->saveData($req, $data);
        return $data['model'];
    }
}
