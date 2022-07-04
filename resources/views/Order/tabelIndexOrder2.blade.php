<?php
extract($data);
?>

<div class="row table-responsive ">

    <!-- Area Chart -->
    <div class="col-12   ">
        @csrf
        <style type="text/css">

            .table.dataTable tbody th, table.dataTable tbody td {
                padding: 0px 3px;
            }

            select {
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            display: block ;
           }

             /*pengaturan lebar kolom*/
            .t_order1_col0{width: 1.5cm height: 1cm vertical-align: middle !important;}
            .t_order1_col1{width:200px height: 0.1cm; !important;}
            .t_order1_col2{width:90px height: 0.1cm; !important;}
            .t_order1_col2x{width:3cm height: 0.1cm; !important;}
            .t_order1_col3{width:60px height: 0.1cm; !important;}
            .t_order1_col4{width:80px height: 0.1cm; !important;}
            .t_order1_col3x{min-width:300px height: 0.1cm; !important;}
            /*.tablePattern1_lembar3{width: 90px !important;}*/
        </style>


        <table id="editable" class="table table-sm table-hover table-bordered   white">
            <thead>
                <tr>
                    <th class="text-center t_order1_col0">No </th>
                    <th class="th-sm text-center  t_order1_col1">No Sales Order</th>
                    <th class="th-sm text-center  t_order1_col1">Tanggal</th>
                    <th class="th-sm text-center t_order1_col2x">Nama Toko</th>
                    <th class="th-sm text-center t_order1_col1">Keterangan</th>

                    <th class="th-sm text-center t_order1_col3x">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($sales1 as $sales)
                    <tr class=" text-center  " style=" vertical-align: middle;" ;>
                        <td class="mr-0 py-1 ">{{ ++$i }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->kode_sales1 }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->tanggal }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->TokoModel->namatoko }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->ketsales }}</td>

                        <td class="text-center d-flex justify-content-around"  ;>
                            {{-- <form action="" method="POST"> --}}

                                <a class="btnTableOrderShow text-center btn btn-info  btn-sm   "
                                    kode="{{ $sales->kode_sales1 }}">Show</a>
                                <a class="btnTableOrderEdit text-center btn btn-info btn-sm "
                                    kode="{{ $sales->kode_sales1 }}">Edit</a>

                                @csrf

                                <a type="button" kode="{{ $sales->kode_sales1 }}"
                                    class=" btnTableOrderDelete  text-center btn btn-danger btn-sm " >
                                    Delete</a>


                            {{-- </form> --}}
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $("input[name=_token]").val()
            }
        });

        $('#editable').Tabledit({
            buttons: {
                edit: {
                    class: 'text-center btn btn-info  btn-sm  px-2 mr-0 py-1',
                    html: '<i class="fas fa-pencil-alt"></i>',
                    action: 'edit'
                },
                                
                delete: {
                    class: 'text-center btn btn-info  btn-sm  px-2 mr-0 py-1',
                    html: '<i class="fas fa-trash"></i>',
                    action: 'delete'
                }
            },
            url: '{{ route('tabledit.action') }}',
            dataType: "json",
            columns: {
                identifier: [1, 'kode_sales1'],
                editable: [
                    [2, 'tanggal', '{"1": "Gradial", "2": "Gardial2"}'],
                    [4, 'ket']
                ]
            },
            restoreButton: false,
            onSuccess: function(data, textStatus, jqXHR) {
                // $.each(data,function(){
                // 	var v = this;
                //     console.log(v);

                // });
                // console.log("ini di tabelEdit = "+data);
                if (data.action == 'delete') {
                    $('#' + data.id).remove();
                }
            }




        });

    });

    $('#editable').DataTable({
        lengthMenu: [
            [10, 50, -1],
            [10, 50, "All"]
        ],
        lengthChange: false,
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
            // $("#editable").show();
            // $("#loadingeditable").hide();
        }
    });


    $('#editable_wrapper').find('label').each(function() {
        $(this).parent().append($(this).children());
    });
    $('#editable_wrapper').find('label').each(function() {
        $(this).addClass('col-12');
    });
   
    $('#editable_wrapper .dataTables_filter input').attr("placeholder", "Search");
    $('#editable_wrapper .dataTables_filter input').attr("id", "searchPattern1");
    $('#editable_wrapper .dataTables_filter input').removeClass('form-control-sm');
    $('#editable_wrapper .dataTables_length').addClass('d-flex flex-row ml-2');
    $('#editable_wrapper .dataTables_filter').addClass('md-form mt-0 mb-0 mr-3 float-right');
    $('#editable_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
    $('#editable_wrapper select').addClass('mdb-select');
    $('#editable_paginate').addClass('float-right');
    $('#editable_wrapper .mdb-select').material_select();
    $('#editable_wrapper .dataTables_filter').find('label').remove();
    /*Set Judul Tabel custom dewe*/
    //var judultabel = $('#juduleditable').html();
    $('#editable_wrapper .row .pr-0').html("");
    $('#editable_wrapper .dataTables_filter').addClass('mt-2');

    $('#editable_wrapper .tabledit-delete-button').removeClass("btn-default");
    $('#editable_wrapper .tabledit-delete-button').addClass('btn-info');
    $('#editable_wrapper .tabledit-edit-button').removeClass('btn-default');
    $('#editable_wrapper .tabledit-edit-button').addClass('btn-info');

</script>
