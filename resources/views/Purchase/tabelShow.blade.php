<!DOCTYPE html>
<html lang="en">

<head>

    {{-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title> --}}

    {{-- <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> --}}

    <!-- Custom styles for this template-->
    {{-- <link href="{{ asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{url('/')}}/MDB/css/mdb.css"> --}}

    <link rel="stylesheet" href="{{url('/')}}/MDB/css/bootstrap.min.css?12"> 
    <link rel="stylesheet" href="{{url('/')}}/MDB/css/mdb.min.css"> 
    <!-- Plugin file -->
    <link rel="stylesheet" href="{{url('/')}}/MBD/css/addons/datatables.min.css">
    <link rel="stylesheet" href="{{url('/')}}/MDB/css/style.css"> 
    {{-- <link rel="stylesheet" href="{{url('/')}}/css/select2.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}




</head>


<?php
extract($data); 
?>
{{-- <h1> judul </h1> --}}
<table class="table table-sm table-hover table-bordered mb-0 mt-2 table-striped" id="tabelShowData">
    <thead class=" mdb-color lighten-3">
        <tr>
            <th class="text-center" style="width:35px;">No</th>
            <th class="text-center">ID Sales2</th> {{-- sales1->lbnosales  --}}

            <th class="text-center" style="width:90px;">Tanggal</th> {{-- sales1->tanggal  --}}
            <th class="text-center">Kode Artikel</th> {{-- sepatu2->kodeart  --}}
            <th class="text-center">Style</th> {{-- sepatu1->namastyle  --}}
            <th class="text-center">Warna</th>{{-- sepatu2->warna  --}}
                    
               
               @for ($i = $sizemin; $i <= $sizemax; $i++)
                    <?php $totalsize[$i] = 0;?> {{-- untuk menampung total di setiap size--}}
                    <th class="text-center">{{$i}}</th>
               @endfor
            
            
            <th class="text-center" style="width: 70px;">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; $total=0;?>
        @foreach ($sales2 as $item)
            <tr class="">
                <td class="align-middle text-center  ">
                {{$i+1}}  
                </td>
                <td class="align-middle text-center  ">
                    {{$item->idsales2}}
                </td>
                <td class="align-middle text-center  ">
                    {{$item->Sales1Model->tanggal}} 
                    {{-- {{$sales1->tanggal}} --}}
                </td>
                <td class="align-middle text-center  ">
                    {{$item->Sepatu2Model->kodeart}}
                </td>
                <td class="align-middle  ">
                    {{$item->Sepatu1Model->namastyle}}
                    {{-- {{$item->Sepatu2Model->Sepatu1Model->namastyle}} --}}
                    <br>
                    {{-- {{$sepatu1[$i]->namastyle}} ini yang di rubah--}} 
                 
                </td>
                <td class="align-middle  ">
                    {{$item->Sepatu2Model->warna}}
                </td>

                <?php $subtot = 0; ?>
                
                @for ($j = $sizemin; $j <= $sizemax; $j++)
                    @if (isset($qtysales[$item->idsepatu2][$j ] ))
                        <?php
                            $subtot += $qtysales[$item->idsepatu2][$j];
                            $totalsize[$j] += $qtysales[$item->idsepatu2][$j];
                        ?>
                            <td class="align-middle  ">
                                {{$qtysales[$item->idsepatu2][$j] }}
                            </td>
                    @else
                    <td class="align-middle  ">
                        {{"" }}
                    </td>
                    @endif 

                 @endfor
                    <?php $total +=$subtot; ?>
                <td class="align-middle text-center ">
                    <b>
                        {{$subtot}}
                    </b>
                </td>
            </tr>
        
             <?php $i++; ?>                            
        @endforeach


    
            
        <tr>
            <td colspan="6" class="align-middle text-center">
                Total
            </td>
            
            @for ($j = $sizemin; $j <= $sizemax; $j++)

                @if (isset($totalsize[$j]  ))
                <td class="align-middle  ">
                    {{$totalsize[$j]}}
                </td>
                @else
                <td class="align-middle  ">
                    {{"" }}
                </td>
                @endif 

            @endfor
            <td class="text-center align-middle">
                <b>{{$total}}</b>
            </td>
            
        </tr>
    </tbody>
</table>
 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset('template/vendor/jquery/jquery.min.js')}}"></script>
 <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{ asset('template/js/sb-admin-2.min.js')}}"></script>

 <!-- Page level plugins -->
 <script src="{{ asset('template/vendor/chart.js/Chart.min.js')}}"></script>

 <!-- Page level custom scripts -->
 <script src="{{ asset('template/js/demo/chart-area-demo.js')}}"></script>
 <script src="{{ asset('template/js/demo/chart-pie-demo.js')}}"></script>
 <script type="text/javascript" src="{{url('/')}}/MDB/js/mdb.min.js"></script>

 <script type="text/javascript" src="{{url('/')}}/MDB/js/jquery.min.js"></script>
 <script type="text/javascript" src="{{url('/')}}/MDB/js/popper.min.js"></script>
 <script type="text/javascript" src="{{url('/')}}/MDB/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="{{url('/')}}/MDB/js/mdb.min.js"></script>
 <!-- Plugin file -->
 <script src="{{url('/')}}/MDB/js/addons/datatables.min.js"></script>
 <script src="{{url('/')}}/js/select2.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script type="text/javascript">
     (function () {
 
         var beforePrint = function () {
             console.log("aaaaaaa")
             alert('Functionality to run before printing.');
         };
 
         var afterPrint = function () {
             console.log("ok");
             var jmprint=document.getElementById("jmprint").value; 
             console.log(jmprint) ;
             jmprint++;
             document.getElementById("jmprint").value = jmprint; 
             alert('Functionality to run after printing');
         };
 
         if (window.matchMedia) {
             var mediaQueryList = window.matchMedia('print');
 
             mediaQueryList.addListener(function (mql) {
                 //alert($(mediaQueryList).html());
                 if (mql.matches) {
                     beforePrint();
                 } else {
                     afterPrint();
                 }
             });
         }
 
         //window.onbeforeprint = beforePrint;
         //window.onafterprint = afterPrint;
 
     }());


// Material Select Initialization
$(document).ready(function () {
    $('.dataTable').material_dataTable();        
    });

$('#tabelShowData').DataTable( {
    lengthMenu: [ [1, 50, -1], [1, 50, "All"] ],
    // lengthChange: false,
    // ordering : false,
    // searching: false
    //info: false,
    //paging: false,
    //scrollY: 400,
    //scrollCollapse: true, // pasangan scrolY
    //scrollX: true,
    autoWidth: false,
    columns: [
        null,
        null,
        null,
        null,
        null,
        { searchable: false, orderable: false } //kolom pertama
      ],
    order: [[0,'asc']],
    /*dom: 'Bfrtip',
    buttons: [
        'pageLength', 'excel', 'pdf','print','copy'
    ],*/
    fixedHeader: {
        headerOffset: 48
    },
    responsive: true,
    /*columnDefs: [
        { searchable: false, targets: 0 },
        { width: 60, targets: 0 }, { width: 300, targets: 1 } 
    ],*/
    initComplete: function(settings, json) {
        // $("#tabelShowData").show();
        // $("#loadingtabel1").hide();
    }
});


$('#tabelShowData_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
});
$('#tabelShowData_wrapper .dataTables_filter input').attr("placeholder", "Search");
$('#tabelShowData_wrapper .dataTables_filter input').attr("id", "searchPattern1");
$('#tabelShowData_wrapper .dataTables_filter input').removeClass('form-control-sm');
$('#tabelShowData_wrapper .dataTables_length').addClass('d-flex flex-row ml-2');
$('#tabelShowData_wrapper .dataTables_filter').addClass('md-form mt-0 mb-0 mr-3 float-right');
$('#tabelShowData_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
$('#tabelShowData_wrapper select').addClass('mdb-select');
$('#tabelShowData_paginate').addClass('float-right');
$('#tabelShowData_wrapper .mdb-select').material_select();
$('#tabelShowData_wrapper .dataTables_filter').find('label').remove();
 /*Set Judul Tabel custom dewe*/
//var judultabel = $('#judultabelShowData').html();
$('#tabelShowData_wrapper .row .pr-0').html(""); 
$('#tabelShowData_wrapper .dataTables_filter').addClass('mt-2');
 </script>


</html>