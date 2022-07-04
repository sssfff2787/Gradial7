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
                                <div class="">
                                       
                                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="th-sm">No</th>
                                            <th class="th-sm">ID Sales</th>
                                            <th class="th-sm">Kode Sales</th>
                                            <th class="th-sm">ID Sepatu</th>                                         
                                            <th width="auto">Action</th> 
                                        </tr>
                                </thead>
                                <?php $i=0;?> 
                                    @foreach ($dataDrmodel  as $student)
                                        <tr>
                                            
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $student->idsales2 }}</td>
                                            <td>{{ $student->kode_sales2}}</td>
                                            <td>{{ $student->idsepatu2 }}</td>
                                            
                                            <td>
                                            <form action="" method="POST">
                            
                                                <a class="btShow btn btn-info" kode="{{$student->id_kepemilikan}}">Show</a>
                                                <a class="btEdit btn btn-info" kode="{{$student->id_kepemilikan}}">Edit</a>
                                                {{-- <a class="btn btn-info" onclick="myFunction()" name="tombolShow">Show</a> --}}
                                                {{-- <a class="btEdit btn btn-primary" href="{{url('/')}}/siswa/{{$student->id_siswa}}/edit">Edit</a>   --}}
                                                {{-- <a class="btn btn-primary" href="{{url('/')}}/siswa">Edit Baru</a> --}}
                                                @csrf
                                    
                                                <button type="button"  kode="{{$student->id_buku}}"   class="bthapus btn btn-danger" > Delete</button>

                                                
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

           

        
@endsection


@section('JS')


<script>

<script>
    $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });
</script>



<script type="text/javascript" src="{{url('/')}}/MDB/js/jquery.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/MDB/js/popper.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/MDB/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/MDB/js/mdb.min.js"></script>
<!-- Plugin file -->
<script src="{{url('/')}}/MDB/js/addons/datatables.min.js"></script>



</script>