
@extends('sales2.layout')


<?php
    extract($data);
?>

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Laravel 9 CRUD School Application</h2>
            </div>
            <div class="float-end">
                {{-- <a class="btn btn-primary" href="{{url('/')}}/siswa/create">Data Baru</a>  ini merujuk ke function create di conroller, karena url terdiri dari namaController/namaFunction method GET lihat di dokument laravel --}}

                <button type="button" class="btCreate btn btn-primary"> Create Data Siswa</button>
            </div>
        </div>
    </div>



    <table id="dtBasicExample1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">No</th>
            <th class="th-sm">ID Sales</th>
            <th class="th-sm">Kode Sales</th>
            <th class="th-sm">ID Sepatu</th>                                         
            <th width="auto">Action</th> 
        </tr>
        </thead>

        <?php $i = 0; ?>
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

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDelete">
        Launch demo modal 1{{-- jika ini diklik akan ke  data-target="#modalDelete karena dia menggunakan  data-toggle="modal" --}}
    </button>

    <!-- Central Modal Small -->
    <form method="POST" action="{{ URL::to('siswa') }}">
        @csrf
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">

            <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog modal-lg" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel">Konfirmasi Hapus</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">



                        <input type="text" id="kodehapus" name="id_siswa" value="">
                        <input type="text" id="namahapus" name="nama" value="">
                        <input type="text" id="alamat" name="alamat" value="">
                        <input type="text" id="no_hp" name="no_hp" value="">

                        {{-- <input type="hidden" id="no_hp" name="no_hp" value="" disabled> jika disabled maka saat di submit data tidak muncul --}}


                        <input type="hidden" name="jenisinput" value="hapus"> <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" id="situsLink" class="btn btn-primary btn-sm">hapus</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Central Modal Small -->
    </form>


    <form method="POST" action="{{ URL::to('siswa') }}">

        @csrf
        <!-- Central Modal Large -->
        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">

            <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog modal-lg" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="judulModalC" name="judulModalC" value=""></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="text" id="id_siswaC" name="id_siswa" value=""> <br>
                        Nama <input type="text" id="namaC" name="nama" value=""> <br>
                        Alamat <input type="text" id="alamatC" name="alamat" value=""> <br>
                        Telepon <input type="text" id="no_hpC" name="no_hp" value=""> <br>
                        Status <input type="text" id="status" name="status" value=""> <br>
                        <input type="text" id="jenisinput" name="jenisinput" value=""> <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Central Modal Large  -->
    </form>

    <form method="POST" action="{{ URL::to('siswa') }}">
        @csrf
        <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">

            <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog modal-lg" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel">Detail Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                      <div id="isimodel">
                           
                      </div>


                        <input type="hidden" name="jenisinput" value="show"> <br>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Central Modal Small -->
    </form>

    <form method="POST" action="{{ URL::to('siswa') }}">

        @csrf
        <!-- Central Modal Large -->
        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">

            <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog modal-lg" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="judulModalC" name="judulModalC" value=""></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div id="isimodelUpdate">
                    </div>
                    <input type="hidden" name="jenisinput" value="updatestatus"> <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Central Modal Large  -->
    </form>
@endsection



@section('tambahanJs')
    {{-- <div class="primary-color">
        <p>  ini di section 2 </p>
    </div> --}}

    <script>

        $(document).ready(function () {
        $('#dtBasicExample1').DataTable();
        $('.dataTables_length').addClass('bs-select');
        });

        $(".bthapusx").click(function() {
            var kode = $(this).attr("kode");
            var nama = $(this).attr("nama");
            var alamat = $(this).attr("alamat");
            var no_hp = $(this).attr("no_hp");


            $("#kodehapus").val(kode);
            $("#namahapus").val(nama);
            $("#alamat").val(alamat);
            $("#no_hp").val(no_hp);


            $("#kodetampil").val(kode);
            $("#namatampil").val(nama);
            $("#alamattampil").val(alamat);
            $("#no_hptampil").val(no_hp);

            // $("#alamathapus").val(alamat);
            // $("#no_hphapus").val(no_hp);

            console.log(kode);
        });


        //$(document).on('click', '.bthapus', function (e) {
        $(".btCreate").click(function(e) {
            e.preventDefault();




            $("#judulModalC").html("Create Data Siswa");

            $("#id_siswaC").val("");
            $("#namaC").val("");

            $("#alamatC").val("");
            $("#no_hpC").val("");
            $("#jenisinput").val("create");
            $('#modalCreate').modal('show');

        });


        $(".btShow").click(function(e) {
            e.preventDefault();
            var kode = $(this).attr('kode');
            // console.log(kode);
            var baseurl = '{{ url('/') }}';

            // $.get(baseurl+'/siswa/ajax_'+kode, function (data) {
            //     console.log(data); 
            //       $("#judulModalC").html("Detail Data Siswa");


            //       $("#namaC").val(data.nama);
            //       $("#alamatC").val(data.alamat);
            //       $("#no_hpC").val(data.no_hp);

            //     $('#modalCreate').modal('show');
            // });

            $.get(baseurl + '/siswa/bukusiswa_' + kode, function(data) {
                console.log(data);
                $("#judulModalC").html("Detail Data Siswa");


                $("#isimodel").html(data);
                // $("#namaC").val(data.nama);
                // $("#alamatC").val(data.alamat);
                // $("#no_hpC").val(data.no_hp);

                $('#modalShow').modal('show');
            });


        });

        $(".btEdit").click(function(e) {
            e.preventDefault();
            var kode = $(this).attr('kode');
            // console.log(kode);
            var baseurl = '{{ url('/') }}';

            $.get(baseurl + '/siswa/ajax_' + kode, function(data) {
                console.log(data);
                $("#judulModalC").html("Edit Data Siswa");

                $("#id_siswaC").val(data.id_siswa);
                $("#namaC").val(data.nama);
                $("#alamatC").val(data.alamat);
                $("#no_hpC").val(data.no_hp);
                $("#jenisinput").val("edit");


                $('#modalCreate').modal('show');
            });
        });

        
        
        
        
        $(".bthapus").click(function(e) {
            e.preventDefault();
            var kode = $(this).attr('kode');
            console.log(kode);
            var baseurl = '{{ url('/') }}';
            console.log(baseurl);
            $.get(baseurl + '/siswa/ajax_' + kode, function(data) {
                console.log(data);
                
                $("#kodehapus").val(data.id_siswa);
                $("#namahapus").val(data.nama);
                $("#alamat").val(data.alamat);
                $("#no_hp").val(data.no_hp);
                $('#modalDelete').modal('show');
            });
            
        });
        
        $(".btUpdate").click(function(e) {
            e.preventDefault();
            var kode = $(this).attr('kode');
            // console.log(kode);
            var baseurl = '{{ url('/') }}';

            $.get(baseurl + '/siswa/update_' + kode, function(data) {
                console.log(data);
                $("#judulModalC").html("Status Aktif Siswa");

                $("#isimodelUpdate").html(data);


                $('#modalUpdate').modal('show');
            });
        });
        
        // $(document).on('click', '.bthapus', function (e) {
            //     e.preventDefault();
            //     var kode = $(this).attr('kode');
            
            //     var baseurl = '{{ url('/') }}';
            //     $.get(baseurl+'/siswa/ajax_'+kode, function (data) {
                //         console.log(data);
                
                //     });
                
                // });
                </script>
@endsection
