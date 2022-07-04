@extends('layout.template')

@section('content')            
            

<?php
    extract($data); 
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @include('parsial.paging')

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="table-responsive">
                                    <style type="text/css">
                                        /*pengaturan lebar kolom*/
                                            .t_order1_col0{width:1.5cm; height: 0.1cm; !important;}
                                            .t_order1_col1{width:30px height: 0.1cm; !important;}
                                            .t_order1_col2{width:90px height: 0.1cm; !important;}
                                            .t_order1_col2x{width:3cm height: 0.1cm; !important;}
                                            .t_order1_col3{width:60px height: 0.1cm; !important;}
                                            .t_order1_col4{width:80px height: 0.1cm; !important;}
                                            .t_order1_col3x{min-width:200px height: 0.1cm; !important;}
                                            /*.tablePattern1_lembar3{width: 90px !important;}*/
                                    </style>
                                       
                                <table id="tabelSales1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center t_order1_col0" >No</th>
                                            <th class="th-sm text-center t_order1_col1">ID Sepatu</th>
                                            <th class="th-sm text-center t_order1_col1">Kode Sepatu</th>
                                            <th class="th-sm text-center t_order1_col1">Kode Art</th>
                                            <th class="th-sm text-center t_order1_col1">Warna</th>
                                            <th class="th-sm text-center t_order1_col3x">Keterangan</th>
                                            
                                            <th class="th-sm text-center t_order1_col3x">Action</th> 
                                        </tr>
                                    </thead>
                                <?php $i=0;?> 
                                    @foreach ($model  as $sales)
                                        <tr>
                                            
                                            <td class="mr-0 py-1 ">{{ ++$i }}</td>
                                            <td class="mr-0 py-1 ">{{ $sales->idsepatu }}</td>
                                            <td class="mr-0 py-1 ">{{ $sales->kode_sepatu2}}</td>
                                            <td class="mr-0 py-1 ">{{ $sales->kodeart }}</td>
                                            <td class="mr-0 py-1 ">{{ $sales->warna }}</td>
                                            <td class="mr-0 py-1 ">{{ $sales->ketsepatu }}</td>
                                            
                                            <td class="mr-0 py-1 ">
                                            <form action="" method="POST">
                            
                                                <a class="btShow btn btn-info text-center btn btn-info  btn-sm  mr-0 py-1 " kode="{{$sales->id_kepemilikan}}">Show</a>
                                                <a class="btEdit btn btn-info text-center btn btn-info  btn-sm  mr-0 py-1 " kode="{{$sales->id_kepemilikan}}">Edit</a>
                                                {{-- <a class="btn btn-info" onclick="myFunction()" name="tombolShow">Show</a> --}}
                                                {{-- <a class="btEdit btn btn-primary" href="{{url('/')}}/siswa/{{$sales->id_siswa}}/edit">Edit</a>   --}}
                                                {{-- <a class="btn btn-primary" href="{{url('/')}}/siswa">Edit Baru</a> --}}
                                                @csrf
                                    
                                                <button type="button"  kode="{{$sales->kode_sales1}}"   class="bthapus btn btn-danger px-3 text-center btn btn-danger btn-sm ml-0 mr-0 my-0 py-1" > Delete</button>

                                                
                                            </form>
                                            </td>

                                        </tr>
                                    @endforeach 
                                       
                                    </table>

                                  
                

                                </div>
                            </div>
                        </div>

                    </div>

                    
                   

                </div>
                <!-- /.container-fluid -->   
                
                   {{-- <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js ')}}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}""></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js ')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js ')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js ')}}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js ')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/datatables-demo.js ')}}"></script> --}}

        
@endsection

@section('JS')


<script>

$(document).ready(function () {
$('#tabelSales1').DataTable();
$('.dataTables_length').addClass('bs-select');
});




</script>

@endsection