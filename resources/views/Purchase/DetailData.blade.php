<?php
    extract($data); 
?>
<section id="body">
    <style type="text/css">
     
    </style>

<div class="mb-3">
    <button type="button" class="btn btn-sm pb-1 px-3 my-0 btn-outline-grey black-text waves-effect waves-light" id="print1all">
        <i class="fa fa-print" aria-hidden="true"></i> &nbsp; Print (REKAP BY PO)
    </button>
</div>
<div class="card ">
    <div class="card-body">
        <div class="row mb-2">
			
			<div class="col-sm-12 pl-2">
    			<button type="button" class="tbkembali btn btn-sm unique-color">
                    <i class="fa fa-arrow-left" aria-hidden="true"> </i> &nbsp; Back
                </button>	
                <button type="button" class="btn btn-sm btn-outline-info black-text" id="editso" kode="{{$purchase->id}}">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> &nbsp; Edit Sales Order
                </button>	
    		</div>
		</div>

        <div class="row pr-0 mr-0">

            <div class="col-4 note note-info pl-4 ml-4 mr-4 pr-4 ">
                <div class="row">
                    <div class="col">
                        No Purchase Order 
                    </div>
                    <div class="col">
                        :<strong> {{$purchase->lbnoPo}} </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Tanggal Input
                    </div>
                    <div class="col">
                        : {{$purchase->tanggal}}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    Nama Brand
                    </div>
                    <div class="col">
                        :  {{$purchase->BrandModel->namabrand}} 
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        Keterangan
                    </div>
                    <div class="col">
                        : {{$purchase->ket}}
                    </div>
                </div>
                <div >
                    <hr> {{-- garis pemisah --}}
                </div>
                <div class="row">
                    <div class="col">
                        Status PO
                    </div>
                    <div class="col">
                        : {{$statusSO}}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Status KIK
                    </div>
                    <div class="col">
                        : {{$statusKIK}}
                    </div>
                </div>
                <tr>
                    <button type="button" class="btn btn-sm btn-outline-warning black-text updatestatus" label="{{$purchase->lbnosales}}" kode="111" statusbaru="on going">
                        <i class="fa fa-check mr-2 orange-text" aria-hidden="true"></i> &nbsp; Set Status : On Going
                    </button>
                </tr>

            </div>
            <div class="col-7   ">
                
                        <table id="tabel" class="table table-sm table-hover table-bordered" cellspacing="0" >
                            
                            <thead>
                                <tr>
                                    <td> No</td>
                                    <td> Keterangan</td>
                                    <td> Pilihan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td> Print Rekap Order</td>
                                    <td id="printRekappurchase" value="printRekappurchase"> <a href="#" > <button class=" fas fa-print" id=""></button> </a> </td>
                                </tr>
                                {{-- <tr>
                                    <td>2 </td>
                                    <td>Print Rekap Harga Sales order </td>
                                    <td> <a href="#" > <button class=" fas fa-print" id=""></button> </a> </td>
                                </tr>
                                <tr>
                                    <td> 3</td>
                                    <td> Export to Excel </td>
                                    <td> <a href="#" > <button class=" fas fa-file-excel" id=""></button> </a> </td>
                                </tr>
                                <tr>
                                    <td>4 </td>
                                    <td>Print Inpek Report (Bobux) </td>
                                    <td> <a href="#" > <button class=" fas fa-print" id=""></button> </a> </td>
                                </tr> --}}


                            </tbody>
                            
                        </table>
                
            </div>

        </div>
        <br>


        <a href="" type="button" kode="{{$purchase->id}}" id="btnAddDetail" class="tambahpobaru btn btn-sm btn-outline-danger btn-md mb-1 "><i class="fa fa-plus mr-2" aria-hidden="true"></i> Input PO Baru</a>
        <input  type="hidden" id="kodepurchase" value="{{$purchase->id}}" class=" btn btn-sm btn-outline-danger btn-md mb-1 ">
 
        <br>
        <h5><strong>Rincian Sales Order</strong></h5>
        
        <div id="tabelShow">

        </div>

    </div>
</div>
</section>
<script>
    
//saat pertama kali view Detailpurchase.blade.php di load
// jQuery(document).ready(function($) {
$(document).ready(function () {
    // var kodepurchase = $('#kodepurchase').val();
    var idyangdikirim = "{{$idyangdikirim}}"
    console.log("ini di detail Sales (tombol show klik)");
    var baseurl = '{{url('/')}}';

    $.get(baseurl+'/purchase/tabelPreview_'+1+"_"+idyangdikirim,function (data) {
        console.log(data);
        $("#tabelShow").append(data);
 
        console.log("ini di ajax (tombol show klik)");
    });
    console.log("ini setalah ajax (tombol show klik)");
});
</script>