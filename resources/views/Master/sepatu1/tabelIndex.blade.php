<?php
extract($data);
?>

<table id="tabelSepatu1" class="table table-sm table-striped table-bordered pr-2" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="text-center t_order1_col0">No</th>
            
            <th class="th-sm text-center t_order1_col1">Kode Sepatu</th>
            <th class="text-center t_order1_col0">Brand</th>
            <th class="th-sm text-center t_order1_col1">Nama Style</th>
            <th class="th-sm text-center t_order1_col1">Size min</th>
            <th class="th-sm text-center t_order1_col3x">Size max</th>

            <th class="th-sm text-center t_order1_col3x">Action</th>
        </tr>
    </thead>
    <?php $i = 0; ?>
    @foreach ($model as $item)
        <tr class="">

            <td class="mr-0 py-1 ">{{ ++$i }}</td>

            <td class="mr-0 py-1 ">{{ $item->kode_sepatu1 }}</td>
            <td class="mr-0 py-1 ">{{ $item->BrandModel->namabrand }}</td>
            <td class="mr-0 py-1 ">{{ $item->namastyle }}</td>
            <td class="mr-0 py-1 ">{{ $item->sizemin }}</td>
            <td class="mr-0 py-1 ">{{ $item->sizemax }}</td>

            <td class=" text-align-center  mr-0 py-1 ">
             

                    {{-- <a class="btnShow btn btn-info text-center btn btn-info  btn-sm  mr-0 py-1 "
                        kode="{{ $item->kode_sepatu1 }}">Show</a> --}}
                    <a class="btnEdit btn btn-info text-center btn btn-info  btn-sm  mr-0 py-1 "
                        kode="{{ $item->kode_sepatu1 }}">Edit</a>
                    @csrf
                    <button type="button" kode="{{ $item->kode_sepatu1  }}"
                        class="btnhapus btn btn-danger px-3 text-center btn btn-danger btn-sm ml-0 mr-0 my-0 py-1">
                        Delete</button>
            </td>

        </tr>
    @endforeach

</table>


<script>
    
        // Tabledit
      $(document).ready(function() {
            const brand = '{"1": "Gradial", "2": "Enkai", "3": "Bobobux"}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $("input[name=_token]").val()
                }
            });

            $('#tabelSepatu1').Tabledit({
                // Hide the column that has the identifier
                hideIdentifier: true,
                // editButton: false,
                url: '{{ route('tabledit.action') }}',
                dataType: "json",
                	 
                
                columns: {
                    identifier: [1, 'kode_sepatu1'],
                    editable: [
                        [2, 'brand', brand],
                        [3, 'namastyle'],
                        [4, 'sizemin'],
                        [5, 'sizemax']
                    ],
                    
                },
                buttons: {
                    edit: {
                        class: 'text-center btn btn-info  btn-sm px-2 mr-0 py-1 px-1',
                        html: '<i class="fas fa-pencil-alt"></i> edit',
                        // html: '<img src="{{ asset('assets/master/feather/edit-3.svg')}}" alt="" id="pen-edit" class="edit"> edit',
                        action: 'edit'
                    },

                    delete: {
                        class: 'text-center btn btn-danger  btn-sm  px-2 mr-0 py-1',
                        html: 'delete',
                        action: 'delete'
                    },
                    save: {
                        class: 'text-center btn btn-primary  btn-sm  px-2 mr-0 py-1',
                        html: 'save',
                        action: 'save'
                    }
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


        // datatable
        $(document).ready(function() {
            $('#tabelSepatu1').DataTable({
                lengthMenu: [
                    [10, 50, -1],
                    [10, 50, "All"]
                ],
                lengthChange: false,
                // ordering : false,
                // searching: false,
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
                    // $("#tabelSepatu1").show();
                    // $("#loadingtabelSepatu1").hide();
                }
            });


            $('#tabelSepatu1_wrapper').find('label').each(function() {
                $(this).parent().append($(this).children());
            });
            $('#tabelSepatu1_wrapper').find('label').each(function() {
                $(this).addClass('col-12');
            });

            $('#tabelSepatu1_wrapper .dataTables_filter input').attr("placeholder", "Cari Data ");
            $('#tabelSepatu1_wrapper .dataTables_filter input').attr("id", "searchPattern1");
            $('#tabelSepatu1_wrapper .dataTables_filter input').removeClass('form-control-sm');
            $('#tabelSepatu1_wrapper .dataTables_length').addClass('d-flex flex-row ml-2');
            $('#tabelSepatu1_wrapper .dataTables_filter').addClass('md-form mt-0 mb-0 mr-3 float-right');
            $('#tabelSepatu1_wrapper select-wrapper').removeClass('select-dropdown');
            // $('#tabelSepatu1_wrapper select-wrapper').addClass('mdb-select');
            // $('#tabelSepatu1_wrapper select').css("display", "block !important");;
            $('#tabelSepatu1_paginate').addClass('float-right');
            // $('#tabelSepatu1_wrapper .mdb-select').material_select();
            $('#tabelSepatu1_wrapper .dataTables_filter').find('label').remove();
            /*Set Judul Tabel custom dewe*/
            //var judultabel = $('#judultabelSepatu1').html();
            $('#tabelSepatu1_wrapper .row .pr-0').html("");
            $('#tabelSepatu1_wrapper .dataTables_filter').addClass('mt-2');

            $('#tabelSepatu1_wrapper .tabledit-delete-button').removeClass("btn-default");
            $('#tabelSepatu1_wrapper .tabledit-delete-button').addClass('btn-info');
            $('#tabelSepatu1_wrapper .tabledit-edit-button').removeClass('btn-default');
            $('#tabelSepatu1_wrapper .tabledit-edit-button').addClass('btn-info');
        });

        $(document).on('click', '.btnEdit', function (e) {
            e.preventDefault();
            var kode = $(this).attr('kode');
            console.log(kode);
            var baseurl = '{{url('/')}}';
            $.get(baseurl+'/{{$url}}/sepatu1Edit_'+kode, function (data) {
                console.log(data);
                $('#div1').hide();
                $('#div2').html(data);
                $('#div3').hide();
                $('#div2').show();
                
            })
            
        });



        
</script>