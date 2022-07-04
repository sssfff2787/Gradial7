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

      
        <table id="" class="display table table-sm table-hover table-bordered   white">
            <thead>
                <tr>
                    <th class="text-center t_order1_col0"> </th>
                    <th class="text-center t_order1_col0">No </th>
                    <th class="th-sm text-center  t_order1_col1">No Sales Order</th>
                    <th class="th-sm text-center  t_order1_col1">Tanggal</th>
                    <th class="th-sm text-center t_order1_col2x">Nama Toko</th>
                    <th class="th-sm text-center t_order1_col1">Keterangan</th>

                    {{-- <th class="th-sm text-center t_order1_col3x">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($sales1 as $sales)
                    <tr class=" text-center  " style=" vertical-align: middle;" ;>
                        <td class="mr-0 py-1 "><input class="checkbox" type="checkbox" id="checkbox_{{++$i}}" name="checkbox[]" value="{{ $sales->kode_sales1 }}"></td>
                        <td class="mr-0 py-1 ">{{ $i }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->kode_sales1 }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->tanggal }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->TokoModel->namatoko }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->ketsales }}</td>
                    </tr>
                @endforeach
                <tr class=" text-center datalama "  style=" background-color: rgb(117, 122, 158); vertical-align: middle;" ;>
                    <td colspan="6" id="datalama" class="mr-0 py-1 "> Ini Data PO Sebelumnya</td>
                </tr>
                @foreach ($sales1_2 as $sales)
                    <tr class=" text-center   " style=" vertical-align: middle;"  id="datalama2">
                        <td class="mr-0 py-1 "><input class="checkbox" checked type="checkbox" id="checkbox_{{++$i}}" name="checkbox[]" value="{{ $sales->kode_sales1 }}"></td>
                        <td class="mr-0 py-1 ">{{ $i }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->kode_sales1 }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->tanggal }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->TokoModel->namatoko }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->ketsales }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <input type="hidden" id="ygdiselect">
        </div>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $("input[name=_token]").val()
            }
        });

        
        var jenisinput = $('#jenisinput').val();
        console.log(jenisinput);
        if(jenisinput=="orderCreateDetail" ){
            $(".datalama").hide();

        }else{
            $(".datalama").show();
            $("#datalama2").show();
        }

        // $('#editable2').Tabledit({
        //     buttons: {
        //         edit: {
        //             class: 'text-center btn btn-info  btn-sm  px-2 mr-0 py-1',
        //             html: '<i class="fas fa-pencil-alt"></i>',
        //             action: 'edit'
        //         },
                                
        //         delete: {
        //             class: 'text-center btn btn-info  btn-sm  px-2 mr-0 py-1',
        //             html: '<i class="fas fa-trash"></i>',
        //             action: 'delete'
        //         }
        //     },
        //     url: '{{ route('tabledit.action') }}',
        //     dataType: "json",
        //     columns: {
        //         identifier: [1, 'kode_sales1'],
        //         editable2: [
        //             [2, 'tanggal', '{"1": "Gradial", "2": "Gardial2"}'],
        //             [4, 'ket']
        //         ]
        //     },
        //     restoreButton: false,
        //     onSuccess: function(data, textStatus, jqXHR) {
        //         // $.each(data,function(){
        //         // 	var v = this;
        //         //     console.log(v);

        //         // });
        //         // console.log("ini di tabelEdit = "+data);
        //         if (data.action == 'delete') {
        //             $('#' + data.id).remove();
        //         }
        //     }




        // });

    });

    // $('#editable2').DataTable({
    //     lengthMenu: [
    //         [10, 50, -1],
    //         [10, 50, "All"]
    //     ],
    //     lengthChange: false,
    //     // ordering : false,
    //     // searching: false
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
    //         null,
    //         null,

    //         {
    //             searchable: false,
    //             orderable: false
    //         } //kolom pertama
    //     ],
    //     order: [
    //         [0, 'asc']
    //     ],
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
    //         // $("#editable2").show();
    //         // $("#loadingeditable2").hide();
    //     }
    // });


    // $('#editable2_wrapper').find('label').each(function() {
    //     $(this).parent().append($(this).children());
    // });
    // $('#editable2_wrapper').find('label').each(function() {
    //     $(this).addClass('col-12');
    // });
   
    // $('#editable2_wrapper .dataTables_filter input').attr("placeholder", "Search");
    // $('#editable2_wrapper .dataTables_filter input').attr("id", "searchPattern1");
    // $('#editable2_wrapper .dataTables_filter input').removeClass('form-control-sm');
    // $('#editable2_wrapper .dataTables_length').addClass('d-flex flex-row ml-2');
    // $('#editable2_wrapper .dataTables_filter').addClass('md-form mt-0 mb-0 mr-3 float-right');
    // $('#editable2_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
    // $('#editable2_wrapper select').addClass('mdb-select');
    // $('#editable2_paginate').addClass('float-right');
    // $('#editable2_wrapper .mdb-select').material_select();
    // $('#editable2_wrapper .dataTables_filter').find('label').remove();
    // /*Set Judul Tabel custom dewe*/
    // //var judultabel = $('#juduleditable2').html();
    // $('#editable2_wrapper .row .pr-0').html("");
    // $('#editable2_wrapper .dataTables_filter').addClass('mt-2');

    // $('#editable2_wrapper .tabledit-delete-button').removeClass("btn-default");
    // $('#editable2_wrapper .tabledit-delete-button').addClass('btn-info');
    // $('#editable2_wrapper .tabledit-edit-button').removeClass('btn-default');
    // $('#editable2_wrapper .tabledit-edit-button').addClass('btn-info');

    // $(document).ready(function () {
    //     $('table.display').DataTable();
    // });

</script>
