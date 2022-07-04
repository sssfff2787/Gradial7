<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoritokoModel;

use App\Models\Pemilik;
use App\Models\Pabrik;
use App\Models\BrandModel;
use App\Models\Sepatu1Model;
use App\Models\Sepatu2Model;

use App\Models\Sales1Model;
use App\Models\Sales2Model;
use App\Models\Sales3Model;
use App\Models\TokoModel;
use App\Models\purchase1;
use App\Models\purchase2;
use App\Models\purchase3;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\UrlGenerator;

class PurchaseOrderController extends Controller
{
    public function __construct()
    {
        //mengambil nama url
        $this->url = url()->current();     
        $this->url = explode("/", $this->url ); //memisahkan http://localhost/Gradial/public/ menjadi array
        $this->url = collect($this->url);
        
        $this->url = ($this->url->count()>5)?$this->url[5]:'brand';
    
    
    }

    public function index()
    {
        // return $this->url;
        // return url()->current();
        $data=array();
        // $data['jenisinputIndex']= "index";
        $data['jenisinput'] = 'index';
        $data['url']= $this->url;
        // if ($this->url=='purchase') {
        //     $data['purchase1']= purchase1::with(['BrandModel'])->get();
        //     // return $data['purchase1'];
        // }else{
        //     $data['model']= $this->model->getAll();
        // }
        // return view('Order.SO.index3', compact('data'));
        return view("$this->url.index",compact('data' ));
        
        // return view("utama.index",compact('data' ));
    }

    public function show(Request $request, $id)
    {
        // return $id;
        $idarr = explode("_",$id);
        // return $idarr;
        $banyakID = count($idarr);
        $idygdikirim = array();

        for ($i=2; $i < count($idarr) ; $i++) { 
            // $id.$i=$idarr[$i];
            // $idsepatu[$i] =$idarr[$i];
            $idygdikirim[$i] =isset( $idarr[$i] )? $idarr[$i] :'';
        }
        // $x = (count($idarr)-1);
        // return $idygdikirim;
        $id1 = isset( $idarr[1] )? $idarr[1] :'';
        $id2 = isset($idarr[2] )? $idarr[2] :'';
        // return $id1;
        switch ($idarr[0]) 
        {
            case 'panel1': //saat pertama kali url order ke index (view order.index), mengembalikan view sales1.index.blade.php
                // return $id;
                // $this->model = new Sales1Model();
                // // $data['model']=  $this->model->getAll();
                // // $data['model']= $this->model::with(['TokoModel'])->orderBy('lbnosales', 'desc')->get();
                // $data['model']= $this->model->orderBy('lbnosales', 'desc')->get();
                $data['url']= $this->url;
                $data['purchase1']= purchase1::with(['BrandModel'])->get();
                // return $data['sales1'];
                return view('Purchase.tabelIndex', compact('data'));
                // return view('Order.tabelSales1', compact('data'));
                break;
            case 'OBAK': //OBAK (order button add klik ) ketika tombol btnadd maka buka form create Sales1 
                // $data['jenisinput'] = "orderCreate";
                // $data['toko']=  TokoModel::all();
                // return $id1;
                // $data['kode_sales1']= $id1;
                $data['jenisinput']= "orderCreateDetail";
                $data['url']= $this->url;
                // $data['brand']= new BrandModel();
                $data['brand']= BrandModel::with(['Sepatu1Model'])->get();
                // $data['model']= response()->json($data['model']);
                // dd($data['brand']);
                // return response()->json($data['model']);
                // return view('Order.SO.Form', compact('data'));
                return view('Purchase.inputData', compact('data'));
                break;
            case 'Show': // ketika tombol btnShowIndex maka buka form create Sales1 
                // return "btn show klik = ".$id1;
                $data['id']= $id1;
                $data['jenisinput']= "orderShow";
                $data['url']= $this->url;
                // $data['brand']= new BrandModel();
                $data['purchase']=  purchase1::with('BrandModel')->find($id1);

                //jika url Edit_1 artinya PO dg id=1 lalu ambil sales1 yg punya purchase1_id =1 misal 4 & 6
                $kode_sales1 = Sales1Model::where('purchase1_id', $id1)->get()->map(function ($sales1) {
                    return $sales1->kode_sales1; // ini mengembalikan kolom kode_sales1 saja hasilnya [4,6];
                }); 
                // return $kode_sales1;
                //membuat text 4_6 dari $kode_sales1
                $text = $kode_sales1->implode('_');;
                $data['idyangdikirim']= $text;
                // return $text;

                $data['statusSO']="DRAF";
                $data['statusKIK']="WAIT";
                return view('Purchase.DetailData', compact('data'));
                break;
            case 'Edit': //OBEK (order button edit klik ) ketika tombol btnEdit maka buka view Order.DetailSales1 
                    // return $id1;
                    $data['jenisinput'] = "Edit";                   
                    $data['brand']=  BrandModel::all();
                    $data['url']= $this->url;
                    
                    
                    $data['purchase1'] = purchase1::find($id1);
                    // $sales1 = Sales1Model::whereBelongsTo( $data['purchase1'], $id1)->get();

                    //jika url Edit_1 artinya PO dg id=1 lalu ambil sales1 yg punya purchase1_id =1 misal 4 & 6
                    $kode_sales1 = Sales1Model::where('purchase1_id', $id1)->get()->map(function ($user) {
                        return $user->kode_sales1; // ini mengembalikan kolom kode_sales1 saja hasilnya [4,6];
                    }); 
                   
                    //membuat text 4_6 dari $kode_sales1
                    $text = $kode_sales1->implode('_');;
                    // return $text;
                    $data['idyangdikirim']= $text;
    
    
                    // $data['brand']= BrandModel::with(['Sepatu1Model'])->get();
                    // // return $data['purchase1'];
                    // $data['purchase2'] = Sales2Model::where('kode_sales2',$id1)->get();
                    // // return $data['sales2'][0]->Sepatu2Model->Sepatu1Model->kode_sepatu1;
                    // // return $data['sales2']->Sepatu2Model->Sepatu1Model->namastyle;
                    // $data['purchase3'] = Sales3Model::where('kode_sales3',$id1)->get();
                    // $data['sizemin']=$data['purchase3']->min('size');
                    // $data['sizemax']=$data['purchase3']->max('size');
                    // // return $data['sales3'];
                    // foreach($data['purchase3'] as $item){
                    //     $data['qtysales'][$item->idsepatu3][$item->size] = $item->qty;
                    // }
                   
                    // $data['sales1']= Sales1Model::all();
                    // $data['brand']= BrandModel::with(['Sepatu1Model'])->get();
                    // $data['model']= response()->json($data['model']);
                    
                    // return $data['qtysales'];
                    // return response()->json($data['model']);
                    // return view('Order.SO.Form', compact('data'));
                    return view('Purchase.inputData', compact('data'));
            case 'delete' :
                    // $data['jenisinput'] = "Delete";                   
                    // $data['url']= $this->url;

                    // $sales1 = Sales1Model::where('purchase1_id',$id1)->get();
                    // // return $sales1;
                    // foreach ($sales1 as $key ) {
                    //     $key->status = "";
                    //     $key->purchase1_id = null;
                    //     $key->save();
                    // }
                    $sales1 = Sales1Model::where('purchase1_id',$id1)->get();
                    $sales1->map(function($sales) {
                        $sales->status = "" ;
                        $sales->purchase1_id = null;
                        $sales->save();
                    });
                    // return $sales1;

                    $data['purchase1'] = purchase1::find($id1);
                    $data['purchase2'] = purchase2::where('purchase1_id',$id1);
                    $data['purchase3'] = purchase3::where('purchase1_id',$id1);

                    $data['purchase1']->delete();
                    $data['purchase2']->delete();
                    $data['purchase3']->delete();


                return "di hapus !!" ;
                break;
            case 'tabelAddEdit': //OBAK (order button add klik ) ketika tombol btnadd maka buka form create Sales1 
                // return url()->current();
                // return $idarr[0]."_".$id2;
                // $data['jenisinput'] = "purchaseAdd";
                // $data['sales1']=  Sales1Model::whereNot('status', "Sudah di PO")->orderBy('lbnosales', 'desc')->get();
                // $data['sales1']=  Sales1Model::with('TokoModel')->whereNot('status', "Sudah di PO")->orderBy('lbnosales', 'desc')->get();
                
                // $pabrik = Sales2Model::with('Pemilik')->where('idsales2', 1 )->get();
                // return $pabrik;
                //ambil sales1 yang statusnya selain/bukan "Sudah di PO"
                //selain itu mabil juga Toko dan sales2
                $data['sales1']=  Sales1Model::with('TokoModel')->get()->reject(function ($sales1p) {
                    return $sales1p->status === "Sudah di PO";
                });
                // return $data['sales1'];

                //ambil kode_salesnya saja
                // $kode_sales1 = $data['sales1']->map(function($sales1){
                //     return $sales1->kode_sales1;                    
                // } );
                $kode_sales1 = $data['sales1']->pluck("kode_sales1");
                // return $kode_sales1;

                //ambil sales2 yg belum di PO
                $sales2 = Sales2Model::with('BrandModel')->whereIn('kode_sales2', $kode_sales1 )->get();
                // return $sales2 ;
                $sales2 = $sales2->filter(function ($key) use ($id1) {
                    return $key->BrandModel->kode_brand==$id1;
                });
                // return $sales2;
                // $sales2 = $sales2->map(function($sales1){
                //     return $sales1->kode_sales2;                    
                // } );
                $sales2 = $sales2->pluck('kode_sales2');
                // return $sales2;
                // $sales2Double = $sales2->duplicates();

                // $data['sales1'] = $data['sales1']->whereIn('kode_sales1', $sales2);
                // return $data['sales1'];

                // $data['sales1']=  Sales1Model::with('TokoModel', 'Sales2Model')->get()->reject(function ($sales1p) {
                //     return $sales1p->status === "Sudah di PO";
                // });
                $a=array(); 
                // $b = [9,2];
                // $i=0;
                $data['sales1'] =$data['sales1']->filter(function($sales1) use ($a,$sales2,$i ) {
                    // if ($sales1->kode_sales1==$b){
                    //     $a[] = $sales1;
                    // }
                    foreach ($sales2 as $key ) {
                        if ($sales1->kode_sales1==$key){
                                $a[] = $sales1;
                            }
                    }
                    return $a;                    
                } );

                // return $data['sales1'];

                // foreach ($data['sales1'] as $item) {

                //    foreach ($item->Sales2Model as $item2) {
                //     $kode_sales2 = $item2->kode_sales2;
                //     return $kode_sales2;
                //    }
                // }
                // $sales2 = $data['sales1'][1]->Sales2Model[0]->kode_sales2;
                
                $data['sales1_2']=  Sales1Model::with('TokoModel')->whereIn("kode_sales1",$idygdikirim )->get();
                // $data['sales1']=  Sales1Model::with('TokoModel')->get()->reject(function ($sales1p) {
                //     return $sales1p->status === "Sudah di PO";
                // })->map(function ($sales1p) {
                //     return $sales1p;
                // });
                // return $data['sales1_2'];
                return view('Purchase.tabelAddEdit', compact('data'));
                break;
            
            case 'tabelPreview': //OBAK (order button add klik ) ketika tombol btnadd maka buka form create Sales1 
                // return url()->current();
                // return $idarr[0]."_".$id2;
                // $data['sales1'] = sales1Model::whereIn('id', $idygdikirim)->get();
                $data['sales2'] = sales2Model::whereIn('kode_sales2', $idygdikirim)->get();
                // $data['sales3'] = sales3Model::whereIn('kode_sales3', $idygdikirim)->get();
                // return $data['sales2'];

                $POpersepatu = array();
                     //mengelompokkan yang punya idsepatu2 yang sama 
                    foreach ( $data['sales2'] as $item2) {
                        // $POpersepatu[$item2->idsepatu2]= isset($POpersepatu[$item2->idsepatu2] ) ?( ($POpersepatu[$item2->idsepatu2])+1) : 1;  
                        $POpersepatu[$item2->idsepatu2]= $item2->idsales2;  
                    }
                    // return $POpersepatu;
                    //mengelompokkan  yang punya idsepatu3 dan dan size lalu menjumlhkan qty nya
                    // foreach ($data['sales3']  as $item3) {
                    //     $qtypersize[$item3->idsepatu3][$item3->size] = (isset($qtypersize[$item3->idsepatu3][$item3->size])) ? $qtypersize[$item3->idsepatu3][$item3->size] + $item3->qty : $item3->qty;  
                    // }
                    // return $qtypersize;
                                 
                
                // $data['sales2'] =Sales2Model::with( 'Sales1Model','Sepatu2Model','Sepatu1Model','BrandModel')->where('kode_sales2', $id1)->get(); 
                // $data['sales2'] =Sales2Model::with( 'Sales1Model','Sepatu2Model','Sepatu1Model','BrandModel')->whereIn('kode_sales2', $idygdikirim)->get();
                $data['sales2'] =Sales2Model::with( 'Sales1Model','Sepatu1Model','Sepatu2Model')->whereIn('idsales2', $POpersepatu)->get();
                // return $data['sales2'];
                
                // $data['sales3'] = Sales3Model::where('kode_sales3',$id1)->get();
                $data['sales3'] = Sales3Model::whereIn('kode_sales3', $idygdikirim)->get();
                // $data['sales3'] = Sales3Model::with('Sepatu2Model')->whereIn('idsepatu3', $POpersepatu)->get();
                // return $data['sales3'];
                $data['sizemin']=$data['sales3']->min('size');
                $data['sizemax']=$data['sales3']->max('size');
                foreach($data['sales3'] as $item){
                    $data['qtysales'][$item->idsepatu3][$item->size] = isset($data['qtysales'][$item->idsepatu3][$item->size]) ?$data['qtysales'][$item->idsepatu3][$item->size] + $item->qty  : $item->qty;
                }
                // return $data['qtysales'];
                return view('Purchase.tabelPreview', compact('data'));
                break;
        }

    }

    public function store(Request $request)
    {
        // return $request->jenisinput;
        // ddd($request->all());
        // return redirect()->action([PurchaseOrderController::class, 'index']);
        $jenisinput = $request->jenisinput;
        switch ($jenisinput) 
        {
            
            case 'orderCreateDetail':
                // return "jenisinput dari inputDataSales3 ada inputan jenisinput yg di hidden (di bawah Btn save), dia di set saat btnAdd di klik (di controllee di OBAK)";
                // return $request;
                // return $request->checkbox;
                // dd($request->all());

                //menyiapkan data yang akan di input
                $tgl = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d');
                $tahun = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y');
                $nomax = (purchase1::where('tahun',$tahun )->max('noPo') !=NULL)? (purchase1::where('tahun',$tahun )->max('noPo')): 0;
                $nomax++;
                $lbnoPo = 'PO'.substr( $tahun,2,2).'-'.sprintf("%03d", $nomax);
                // return $lbnoPo;

                
                //menambah data baru di tabel purchase1
                $purchase1 = new purchase1;
                $purchase1->tahun =  $tahun;
                $purchase1->nopo=  $nomax;
                $purchase1->lbnoPo =  $lbnoPo;
                $purchase1->tanggal =  $tgl;  
                $purchase1->brand_id=  $request->brand_id;
                $purchase1->ket =  $request->ket;   
                $purchase1->save();
              
                $purchase1_id=  (purchase1::all()->max('id')!=null )? purchase1::all()->max('id') : 1;
                
                //merubah status di tabel sales1
                if(isset($request->checkbox))
                {
                    $sales1 = sales1Model::whereIn('kode_sales1', $request->checkbox)->get();

                    $sales2 = sales2Model::whereIn('kode_sales2', $request->checkbox)->get();
                    $sales3 = sales3Model::whereIn('kode_sales3', $request->checkbox)->get();

                    // $sepatu2 = $sales2->load('Sepatu2Model');

                   
           
                    foreach ($sales1 as $item) {
                        $item->status = "Sudah di PO";
                        $item->purchase1_id = $purchase1_id;
                        $item->save();

                    }
                    // return $sales2;
                    $POpersepatu = array();
                     //mengelompokkan yang punya idsepatu2 yang sama 
                    foreach ($sales2 as $item2) {
                        // if(!(in_array($item->idsepatu2, $array1))){
                            // $POpersepatu[$item2->idsepatu2][$item2->idsepatu2]= isset($POpersepatu[$purchase1_id][$item2->idsepatu2] ) ? ($POpersepatu[$purchase1_id][$item2->idsepatu2])+1 : 1;
                            $POpersepatu[$item2->idsepatu2]= isset($POpersepatu[$item2->idsepatu2] ) ?( ($POpersepatu[$item2->idsepatu2])+1) : 1;
                            // $idsepatu[] = $item2->idsepatu2;
                            // $purchase2 = new purchase2;
                            // $purchase2->purchase1_id =  $purchase1_id;
                            // $purchase2->sepatu2_id =  $item2->idsepatu2;
                            // $purchase2->save();
                    }
                    // return $POpersepatu;
                    //masukkan data ke purchase2
                    foreach ($POpersepatu as $itemSales2 => $value) {
                        $purchase2 = new purchase2;
                        $purchase2->purchase1_id =  $purchase1_id;
                        $purchase2->sepatu2_id =  $itemSales2;
                        $purchase2->save();
                    }
                    // return $purchase2;
                    $qtypersize = array();

                    //mengelompokkan  yang punya idsepatu3 dan dan size lalu menjumlhkan qty nya
                    foreach ($sales3 as $item3) {
                        $qtypersize[$item3->idsepatu3][$item3->size] = (isset($qtypersize[$item3->idsepatu3][$item3->size])) ? $qtypersize[$item3->idsepatu3][$item3->size] + $item3->qty : $item3->qty;  
                    }
                    // return $qtypersize;
                    //setelah di kelompokkan maka masukkan ke tabel purchase3
                    $idsepatuKey = array_keys($qtypersize);
                    $j=0;

                    // return $idsepatuKey;
                    foreach ($qtypersize as $key ) {
                   

                        $index = array_keys($key);
                        $isi = array_values($key);
                        // $baru = array_combine($index, $isi);
                        // return count($key);
                        for ($i=0; $i < count($key) ; $i++) { 
                            $purchase3 = new purchase3;
                            $purchase3->purchase1_id =  $purchase1_id;
                            $purchase3->sepatu2_id = $idsepatuKey[$j];
                            $purchase3->size = $index[$i];
                            $purchase3->qty = $isi[$i];
                            $purchase3->save();
                        }

                                                        
                        $j++;

                    }
                    //     return $purchase3;

                
                }
                return redirect()->action([PurchaseOrderController::class, 'index']);
                break;

            case 'Edit':
                //menyiapkan data yang akan di input
                $tgl = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y-m-d');
                $tahun = date_format(date_create_from_format('d M Y', $request->tanggal), 'Y');
                $nomax = (purchase1::where('tahun',$tahun )->max('noPo') !=NULL)? (purchase1::where('tahun',$tahun )->max('noPo')): 0;
                $nomax++;
                $lbnoPo = 'PO'.substr( $tahun,2,2).'-'.sprintf("%03d", $nomax);
                // return $lbnoPo;

                
                //menambah data baru di tabel purchase1
                $purchase1 = purchase1::find($request->idPO1);
                // return $purchase1;
                $purchase1->tahun =  $tahun;
                $purchase1->nopo=  $nomax;
                $purchase1->lbnoPo =  $lbnoPo;
                $purchase1->tanggal =  $tgl;  
                $purchase1->brand_id=  $request->brand_id;
                $purchase1->ket =  $request->ket;   
                // $purchase1->save();
                
                $purchase1_id=  $request->idPO1;
                // $purchase1_id=3;
                //merubah status di tabel sales1
                if(isset($request->checkbox))
                {
                    $sales1 = sales1Model::whereIn('kode_sales1', $request->checkbox)->get();
                    $sales2 = sales2Model::whereIn('kode_sales2', $request->checkbox)->get();
                    // $sepatu2 = $sales2->load('Sepatu2Model');
                    $sales3 = sales3Model::whereIn('kode_sales3', $request->checkbox)->get();

                    $idyglama = explode("_", $request->idyangdikirim);
                    // return $sales1->where("kode_sales1", 2)->all();
                    
                    //ambil kode_sales1 dari SO yg di centang
                    $sales1ID = $sales1->map(function($sales1){
                        return $sales1->kode_sales1;
                    });
                    // return $sales1;

                    //ambil kode_sales1 hanya yg baru saja 
                    $idygbaru = $sales1ID->diff($idyglama);
                  
                    
                    //ubah status dan purchase1_id di SO yg id baru
                    $sales1->whereIn("kode_sales1", $idygbaru)->map(function($sales1) use ($purchase1_id ){
                        $sales1->status = "Sudah di PO" ;
                        $sales1->purchase1_id = $purchase1_id;
                        $sales1->save();
                    });
                    // return $sales1;

                    //ambil kode_sales1 yang lama yg  di pilih 
                    $idyglamadipilihlagi = $sales1ID->diff($idygbaru)->toArray();
                    // return $idyglamadipilihlagi;
                    
                    //ambil kode_sales1 yang lama yg tidak di pilih
                    $idlamatakdipilih =array_diff($idyglama, $idyglamadipilihlagi);
                    //ubah status dan purchase1_id di SO 
                    $ygtakdipilih = Sales1Model::whereIn("kode_sales1", $idlamatakdipilih)->get();
                    $ygtakdipilih->map(function($sales1) use ($purchase1_id ){
                        $sales1->status = "" ;
                        $sales1->purchase1_id = null;
                        $sales1->save();
                    });
                    // return $ygtakdipilih;
                   
                    // return $idygbaru;
                    $idsepatu2diselect = array();
                        //mengelompokkan yang punya idsepatu2 yang sama 
                    foreach ($sales2 as $item2) {
                        // $idsepatu2diselect[$item2->idsepatu2]= isset($idsepatu2diselect[$item2->idsepatu2] ) ?( ($idsepatu2diselect[$item2->idsepatu2])+1) : 1;                            
                        $idsepatu2diselect[$item2->idsepatu2]= $item2->idsepatu2;
                    }
                    // return $idsepatu2diselect;

                    //ini Id sales1 bukan id sepatu2
                    $idsepatulama = purchase2::where('purchase1_id',$request->idPO1 )->get()->map(function($purchase2){
                        return $purchase2->sepatu2_id ;
                    })->toArray();
                    // return $idsepatulama;

                   if(!empty($idsepatulama ) ) {
                       
                       $idsepatu2lamatakdipilih = array_diff ($idsepatulama, $idsepatu2diselect);
                       // return $idsepatu2lamatakdipilih;
                       $purchase2IdDelete = purchase2::whereIn('sepatu2_id', $idsepatu2lamatakdipilih)->where("purchase1_id", $purchase1_id)-> get();
                       // return $purchase2IdDelete;
                       foreach ($purchase2IdDelete as $key => $value) {
                           // $purchase2 = purchase2::where("sepatu2_id", $value)->get();
                              $value->delete(); 
                        }
                        
                        
                        $idsepatubr = array_diff($idsepatu2diselect, $idsepatulama);
                      //    return $idsepatubr;
                      foreach ($idsepatubr as $itemSales2 => $value) {
                        $purchase2 = new purchase2;
                        $purchase2->purchase1_id =  $purchase1_id;
                        $purchase2->sepatu2_id =  $value;
                        $purchase2->save();
                      }
                      //menghapus purchase3 yang lama
                      $purchase3 = purchase3::whereIn('sepatu2_id', $idsepatulama)->where("purchase1_id", $purchase1_id)-> get();
                      // return $sales3;
                    //   return $purchase3;
  
                      foreach ($purchase3  as  $value) {
                          $value->delete();
                      }
                    //   return " ini di idsepatu2 lama tidak empty";
                   }else{
                        $idsepatubr = $idsepatu2diselect;

                        foreach ($idsepatubr as $itemSales2 => $value) {
                            $purchase2 = new purchase2;
                            $purchase2->purchase1_id =  $purchase1_id;
                            $purchase2->sepatu2_id =  $value;
                            $purchase2->save();
                        }
                        // return "ini di idsepatu2 lama empty ..!";
                   }
                //    return "Data berhasil di simpan ..!";

                   //menyimpan di purchase3
                    $qtypersize = array();
                    $sales3 = sales3Model::whereIn('kode_sales3', $request->checkbox)->get();
                    // return $sales3;
                  
                    //mengelompokkan  yang punya idsepatu3 dan dan size lalu menjumlhkan qty nya
                    foreach ($sales3 as $item3) {
                        $qtypersize[$item3->idsepatu3][$item3->size] = (isset($qtypersize[$item3->idsepatu3][$item3->size])) ? $qtypersize[$item3->idsepatu3][$item3->size] + $item3->qty : $item3->qty;  
                    }
                    // return $qtypersize;
                    //setelah di kelompokkan maka masukkan ke tabel purchase3
                    $idsepatuKey = array_keys($qtypersize);
                    $j=0;

                    // return $idsepatuKey;
                    foreach ($qtypersize as $value) {
                        // $index = array_keys($key);
                        // $isi = array_values($key);
                        // $baru = array_combine($index, $isi);
                        // return count($key);
                        foreach ($value as $key => $value2) {
                            $purchase3 = new purchase3;
                            $purchase3->purchase1_id =  $purchase1_id;
                            $purchase3->sepatu2_id = $idsepatuKey[$j];
                            $purchase3->size = $key;
                            $purchase3->qty = $value2;
                            // $purchase3->size = $index[$i];
                            // $purchase3->qty = $isi[$i];
                            $purchase3->save();
                        }                                
                        $j++;
                    }
                        return $purchase3;
                }else{
                    return "Tidak ada SO yg di pilih silahkan pilih SO, jika tidak ada yg di pilih data akan tetap seperti sebelumnya";
                }
                return redirect()->action([PurchaseOrderController::class, 'index']);
                break;

              


        }
    }
}