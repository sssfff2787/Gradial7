@extends('layout.template')

@section('content')    

<?php
    extract($data);
?>
{{-- {{ $model}} --}}

    <div class="row bg-title bg-grey " >
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-3 ">
            <h3 class="page-title"><b>Master Sepatu <span id="judul"></span></b></h3>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 d-flex justify-content-end mt-3">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{url('/')}}">Home</a>
                <a class="breadcrumb-item" href="{{url('/')}}">Administrator</a>
                <span class="breadcrumb-item " >Article</span>
            </nav>
        </div>
    </div>  
  

<style type="text/css">

.bg-grey {

  background-color: #e9ecef;

}
    .table-kosong>thead>tr>th,
    .table-kosong>tbody>tr>th,
    .table-kosong>tfoot>tr>th,
    .table-kosong>thead>tr>td,
    .table-kosong>tbody>tr>td,
    .table-kosong>tfoot>tr>td
    {   
        padding: 0px !important;
        margin: 0px !important;
        border:none !important;
    }

    .table-bordered2
    {
        border: 1px solid #dee2e6;
    }
    .table-bordered2>thead>tr>th,
    .table-bordered2>tbody>tr>th,
    .table-bordered2>tfoot>tr>th,
    .table-bordered2>thead>tr>td,
    .table-bordered2>tbody>tr>td,
    .table-bordered2>tfoot>tr>td
    {   
        border: 1px solid #dee2e6;
        line-height: 15px;
        font-size:13px !important;
        padding: .2rem;
    }
</style>

<style type="text/css">
    .hargaedit,.harga,.hasil{
        padding: .25rem .4rem !important;
        margin-bottom: 0.1rem !important; 
        font-size: 13px;
        line-height: 0.5;
    }
    .qtyx,.qtyxedit,.qtypack,.beratpack,.kartonpack{
        padding: .25rem .1rem !important;
        margin-bottom: .1rem !important; 
        font-size: 13px;
        line-height: 0.5;
    }
    .tdharga,.tdqty{
        padding-top: .2rem;
        padding-bottom: .2rem;
    }
</style>


<meta name="_token" content="{{ csrf_token() }}"/>
<div class="row" style="min-height: 600px;">

    <div id="loadingdetail" class="preloader-wrapper big active crazy" style="width: 100px; height: 100px; ">
      <div class="spinner-layer spinner-green-only">
        <div class="circle-clipper left">
          <div class="circle">loadingdetail</div>
        </div>
        <div class="gap-patch">
          <div class="circle">loadingdetail</div>
        </div>
        <div class="circle-clipper right">
          <div class="circle">loadingdetail</div>
        </div>
      </div>
    </div>   

  <div class="col-md-12 col-sm-12" id="isi1" style="">   
    <div class="row" >
        <div class="col-lg-2" style="margin-top: 10px;">
            <div class="card mb-5" id="isi">
                <div class="card-body p-0">
                    <input type="hidden" name="brandx" id="brandx" value="0">
                    <table class="table table-sm table-bordered table-hover mb-0 t_brand" id="t_brand">
                        <thead class="amber darken-2 white-text">
                            <tr>
                                <td colspan="2" class="align-middle text-center"> isi PILIH BRAND</td>
                            </tr>
                        </thead>
                        <tbody id="tbodytabel1">
                            <tr id="trtb0_all" class="trtb0">
                                <td class="text-left align-middle text-uppercase pointer" id2="all">
                                    <b>Kode Sepatu</b>
                                </td>
                                <td class="text-center align-middle text-uppercase pointer" id2="all">
                                   
                                </td>
                            </tr>
                            @foreach ($model as $data)
                            <tr id="trtb0_{{$data['kode_brand']}}" class="trtb0">
                                <td class="text-left align-middle text-uppercase pointer" id2="{{$data['kode_sepatu']}}">
                                    {{$data['namastyle']}}
                                </td>
                                <td class="text-center align-middle text-uppercase pointer" id2="{{$data['kode_sepatu']}}">
                                    {{$data['kode_sepatu']}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-10" id="isiPattern1" style="margin-top: 10px; display:;">

            <div class="card" id="isi" style="margin-bottom: 5px !important;">
                <div class="card-body pb-0 pt-2">

                    <div class="row">
                        <div class="col-md-7" style="margin-top: 3px; margin-bottom: 3px"; > 
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-2" role="group" aria-label="First group">

                                    {{-- @if ($level_tambah) --}} isiPattern1
                                       
                                        <a href="#" type="button" id="sepatubaru" class=" btn btn-danger btn-md "><i class="fa fa-plus mr-2" aria-hidden="true"></i>Tambah Data</a>
                                    {{-- @endif                                         --}}

                                </div>
                            </div>
                        </div>

                        <div class="col-md-5" >
                            <div style="width: 170px; float: right">   
                                {{-- <select id="filtahun" name="filtahun" required>
                                    @foreach ($groupTahun as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select> --}} isiPattern1
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="card"  style="margin-bottom: 1px !important;">

                <div id="ini" class="card-body pb-0 pt-2">

                    <div id="loadingtabelSepatu" class="preloader-wrapper big active crazy" style="width: 100px; height: 100px; ">
                      <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                          <div class="circle">important</div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle">important</div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle">important</div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle">important</div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle">important</div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle">important</div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle">important</div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle">important</div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle">important</div>
                        </div>
                      </div>
                    </div>

                    <div class="row" style="margin-bottom: 30px; margin-top: 10px;">
                        <div class="col-12" id="content_index">
                            
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

  </div>
</div>

<div class="col-md-12" id="isi2" >
    isi2isi2isi2isi2isi2isi2isi2isi2   
</div>

<div class="col-md-12" id="isi3" > isi3isi3isi3isi3isi3
</div>
@endsection

@section('JS')
    
<script>
$(document).on('click','#sepatubaru', function(e){
    //e.preventDefault();  
   
    // $("#loadingdetail").show();
    // $('#tabelSepatu').dataTable().fnDestroy(); 
    // $('#isi1').hide();
    $('#isi2').hide();
    $('#ini').html('');
    var baseurl = '{{url('/')}}';
    $.get(baseurl+'/sepatu1/tampil', function (data) {
        console.log(data);
        $("#ini").html(data);
        $("#loadingdetail").hide();

    });
    // $('#isi3').show();
    // $('#isi2').show();
    $('#ini').fadeTo(1000, 1 );    
    

});
</script>

@endsection