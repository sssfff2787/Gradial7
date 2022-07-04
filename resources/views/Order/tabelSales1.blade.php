<?php
extract($data);
?>

<!-- Begin Page Content -->
<div class="container-fluid ">


    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">


            <!-- Card Body -->
            <div class="">
                <style type="text/css">
                    /*pengaturan lebar kolom*/
                    .t_order1_col0 {
                        width: 1.5cm;
                        height: 1cm;
                         !important;
                    }

                    .t_order1_col1 {
                        width: 200px !important;
                    }

                    .t_order1_col2 {
                        width: 90px !important;
                    }

                    .t_order1_col2x {
                        width: 3cm !important;
                    }

                    .t_order1_col3 {
                        width: 60px !important;
                    }

                    .t_order1_col4 {
                        width: 80px !important;
                    }

                    .t_order1_col3x {
                        min-width: 200px !important;
                    }

                    /*.tablePattern1_lembar3{width: 90px !important;}*/

                    .select-wrapper input.select-dropdown {
                        margin:0 !important;
                        font-family: inherit;
                        font-size: inherit;
                        line-height: inherit;
                        position: relative;
                        cursor: pointer;
                        background-color: transparent;
                        border: none;
                        border-bottom: 1px solid #ced4da;
                        outline: 0;
                        height: 2.9rem;
                        line-height: 2.9rem;
                        width: 100%;
                        font-size: 1rem;
                        margin: 0 0 0rem;
                        padding: 0;
                        display: block;
                    }

                </style>

                <table id="tabel1" class="table table-sm table-hover table-bordered  mx-2  white"
                    style="margin-top: 10px; width: 98%; heigth:1cm;">
                    <thead class=" ">
                        {{-- <thead class="thead-dark thead-striped "> --}}
                        <tr>
                            <th class="text-center t_order1_col0">No </th>
                            <th class="th-sm text-center  t_order1_col1">No Sales Order</th>
                            <th class="th-sm text-center  t_order1_col1">Tanggal</th>
                            <th class="th-sm text-center t_order1_col2x">Nama Toko</th>
                            <th class="th-sm text-center t_order1_col3x">Keterangan</th>

                            <th class="th-sm text-center t_order1_col3x">Action</th>
                            {{-- <th width="th-sm  float-center t_order1_col2x">Action</th> --}}
                        </tr>
                    </thead>
                    <?php $i = 0; ?>
                    @foreach ($sales1 as $sales)
                        <tr class="text-center py-1 " style="padding-right:1px" ;>
                            <td class="mr-0 py-1 ">{{ ++$i }}</td>
                            <td class="mr-0 py-1 ">{{ $sales->lbnosales }}</td>
                            <td class="mr-0 py-1 ">{{ $sales->tanggal }}</td>
                            <td class="mr-0 py-1 ">{{ $sales->TokoModel->namatoko }}</td>
                            <td class="mr-0 py-1 ">{{ $sales->ketsales }}</td>

                            <td class="text-center py-1 " style="padding-right:1px" ;>
                                <form action="" method="POST">

                                    <a class="btnTableOrderShow text-center btn btn-info  btn-sm  mr-0 py-1 "
                                        kode="{{ $sales->kode_sales1 }}">Show</a>
                                    <a class="btnTableOrderEdit text-center btn btn-info btn-sm mr-0 py-1"
                                        kode="{{ $sales->kode_sales1 }}">Edit</a>
                                    {{-- <a class="btn btn-info" onclick="myFunction()" name="tombolShow">Show</a> --}}
                                    {{-- <a class="btEdit btn btn-primary" href="{{url('/')}}/siswa/{{$sales->id_siswa}}/edit">Edit</a> --}}
                                    {{-- <a class="btn btn-primary" href="{{url('/')}}/siswa">Edit Baru</a> --}}
                                    @csrf

                                    <a type="button" kode="{{ $sales->kode_sales1 }}"
                                        class="btnTableOrderDelete px-3 text-center btn btn-danger btn-sm ml-0 mr-0 my-0 py-1 ">
                                        Delete</a>


                                </form>
                            </td>

                        </tr>
                    @endforeach

                </table>




            </div>

        </div>

    </div>




</div>


<script type="text/javascript">
    // $(document).ready(function () {
    // $('#tabel1').DataTable();
    // $('.dataTables_length').addClass('bs-select');
    // // "bAutoWidth": false;
    // });

    $('#tabel1').DataTable({
        lengthMenu: [
            [10, 50, -1],
            [10, 50, "All"]
        ],
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
            {
                searchable: false,
                orderable: false
            } //kolom pertama
        ],
        order: [
            [0, 'asc']
        ],
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
            // $("#tabel1").show();
            // $("#loadingtabel1").hide();
        }
    });


    $('#tabel1_wrapper').find('label').each(function() {
        $(this).parent().append($(this).children());
    });
    $('#tabel1_wrapper .dataTables_filter input').attr("placeholder", "Search");
    $('#tabel1_wrapper .dataTables_filter input').attr("id", "searchPattern1");
    $('#tabel1_wrapper .dataTables_filter input').removeClass('form-control-sm');
    $('#tabel1_wrapper .dataTables_length').addClass('d-flex flex-row ml-2');
    $('#tabel1_wrapper .dataTables_filter').addClass('md-form mt-0 mb-0 mr-3 float-right');
    $('#tabel1_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
    $('#tabel1_wrapper select').addClass('mdb-select');
    $('#tabel1_paginate').addClass('float-right');
    $('#tabel1_wrapper .mdb-select').material_select();
    $('#tabel1_wrapper .dataTables_filter').find('label').remove();
    /*Set Judul Tabel custom dewe*/
    //var judultabel = $('#judultabel1').html();
    $('#tabel1_wrapper .row .pr-0').html("");
    $('#tabel1_wrapper .dataTables_filter').addClass('mt-2');






    // $('#tabel1').DataTable( {
    //     lengthMenu: [ [30, 50, -1], [30, 50, "All"] ],
    //     //lengthChange: false,
    //     //ordering : false,
    //     //searching: false
    //     //info: false,
    //     //paging: false,
    //     //scrollY: 400,
    //     //scrollCollapse: true, // pasangan scrolY
    //     //scrollX: true,
    //     autoWidth: false,
    //     columns: [
    //         null,
    //         null,
    //         null,
    //         null,null,null,null,
    //         null,
    //         null //kolom terkahier (jumlah kolom harus sesuai)
    //         ],
    //     order: [[1,'desc']],
    //     /*dom: 'Bfrtip',
    //     buttons: [
    //         'pageLength', 'excel', 'pdf','print','copy'
    //     ],*/
    //     fixedHeader: {
    //         headerOffset: 48
    //     },
    //     responsive: true,
    //     /*columnDefs: [
    //         { searchable: false, targets: 0 },
    //         { width: 60, targets: 0 }, { width: 300, targets: 1 } 
    //     ],*/
    //     initComplete: function(settings, json) {
    //         $("#tabel1").show();
    //         $("#loadingtabel1").hide();
    //     }
    // });


    // $('#tabel1_wrapper').find('label').each(function () {
    //     $(this).parent().append($(this).children());
    // });
    // $('#tabel1_wrapper .dataTables_filter input').attr("placeholder", "Search");
    // $('#tabel1_wrapper .dataTables_filter input').attr("id", "searchPattern1");
    // $('#tabel1_wrapper .dataTables_filter input').removeClass('form-control-sm');
    // $('#tabel1_wrapper .dataTables_length').addClass('d-flex flex-row ml-2');
    // $('#tabel1_wrapper .dataTables_filter').addClass('md-form mt-0 mb-0 text-right');
    // $('#tabel1_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
    // $('#tabel1_wrapper select').addClass('mdb-select');
    // $('#tabel1_wrapper .mdb-select').material_select();
    // $('#tabel1_wrapper .dataTables_filter').find('label').remove();
    //     /*Set Judul Tabel custom dewe*/
    // var judultabel = $('#judultabel1').html();
    // $('#tabel1_wrapper .row .pr-0').html(judultabel); 
    // $('#tabel1_wrapper .dataTables_filter').addClass('mt-2');
</script>
