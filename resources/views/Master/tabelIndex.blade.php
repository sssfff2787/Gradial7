<?php
extract($data);
?>

<table id="tabelSepatu2" class="table table-sm table-striped table-bordered pr-2" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="text-center t_order1_col0">No</th>
            
            <th class="th-sm text-center t_order1_col1">ID Sepatu</th>
            <th class="text-center t_order1_col0">Nama Style</th>
            <th class="th-sm text-center t_order1_col1">Kode Art</th>
            <th class="th-sm text-center t_order1_col1">Warna</th>
            <th class="th-sm text-center t_order1_col3x">Keterangan</th>

            <th class="th-sm text-center t_order1_col3x">Action</th>
        </tr>
    </thead>
    <?php $i = 0; ?>
    @foreach ($sepatu2 as $item)
        <tr class="">

            <td class="mr-0 py-1 ">{{ ++$i }}</td>

            <td class="mr-0 py-1 ">{{ $item->idsepatu }}</td>
            <td class="mr-0 py-1 ">{{ $item->Sepatu1Model->namastyle }}</td>
            <td class="mr-0 py-1 ">{{ $item->kodeart }}</td>
            <td class="mr-0 py-1 ">{{ $item->warna }}</td>
            <td class="mr-0 py-1 ">{{ $item->ketsepatu }}</td>

            <td class=" text-align-center  mr-0 py-1 ">
             

                    <a class="btnShow btn btn-info text-center btn btn-info  btn-sm  mr-0 py-1 "
                        kode="{{ $item->idsepatu }}">Show</a>
                    <a class="btnEdit btn btn-info text-center btn btn-info  btn-sm  mr-0 py-1 "
                        kode="{{ $item->idsepatu }}">Edit</a>
                    @csrf
                    <button type="button" kode="{{ $item->idsepatu  }}"
                        class="btnhapus btn btn-danger px-3 text-center btn btn-danger btn-sm ml-0 mr-0 my-0 py-1">
                        Delete</button>
            </td>

        </tr>
    @endforeach

</table>


<script>
    
        // Tabledit
      $(document).ready(function() {
            const brand = '{"1": "Gradial", "2": "Gardial2", "3": "Gardial3"}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $("input[name=_token]").val()
                }
            });

            $('#tabelSepatu2').Tabledit({
                // Hide the column that has the identifier
                hideIdentifier: true,
                // editButton: false,
                url: '{{ route('tabledit.action') }}',
                dataType: "json",
                	 
                
                columns: {
                    identifier: [1, 'idsepatu'],
                    editable: [
                        [2, 'namastyle', brand],
                        [3, 'kodeart'],
                        [4, 'warna'],
                        [5, 'ketsepatu']
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
            $('#tabelSepatu2').DataTable({
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
                    // $("#tabelSepatu2").show();
                    // $("#loadingtabelSepatu2").hide();
                }
            });


            $('#tabelSepatu2_wrapper').find('label').each(function() {
                $(this).parent().append($(this).children());
            });
            $('#tabelSepatu2_wrapper').find('label').each(function() {
                $(this).addClass('col-12');
            });

            $('#tabelSepatu2_wrapper .dataTables_filter input').attr("placeholder", "Cari Data ");
            $('#tabelSepatu2_wrapper .dataTables_filter input').attr("id", "searchPattern1");
            $('#tabelSepatu2_wrapper .dataTables_filter input').removeClass('form-control-sm');
            $('#tabelSepatu2_wrapper .dataTables_length').addClass('d-flex flex-row ml-2');
            $('#tabelSepatu2_wrapper .dataTables_filter').addClass('md-form mt-0 mb-0 mr-3 float-right');
            $('#tabelSepatu2_wrapper select-wrapper').removeClass('select-dropdown');
            // $('#tabelSepatu2_wrapper select-wrapper').addClass('mdb-select');
            // $('#tabelSepatu2_wrapper select').css("display", "block !important");;
            $('#tabelSepatu2_paginate').addClass('float-right');
            // $('#tabelSepatu2_wrapper .mdb-select').material_select();
            $('#tabelSepatu2_wrapper .dataTables_filter').find('label').remove();
            /*Set Judul Tabel custom dewe*/
            //var judultabel = $('#judultabelSepatu2').html();
            $('#tabelSepatu2_wrapper .row .pr-0').html("");
            $('#tabelSepatu2_wrapper .dataTables_filter').addClass('mt-2');

            $('#tabelSepatu2_wrapper .tabledit-delete-button').removeClass("btn-default");
            $('#tabelSepatu2_wrapper .tabledit-delete-button').addClass('btn-info');
            $('#tabelSepatu2_wrapper .tabledit-edit-button').removeClass('btn-default');
            $('#tabelSepatu2_wrapper .tabledit-edit-button').addClass('btn-info');
        });

        $(document).on('click', '.btnEdit', function (e) {
            e.preventDefault();
            var kode = $(this).attr('kode');
            console.log(kode);
            var baseurl = '{{url('/')}}';
            $.get(baseurl+'/master/sepatu2Edit_'+kode, function (data) {
                console.log(data);
                $('#div1').hide();
                $('#div2').html(data);
                $('#div3').hide();
                $('#div2').show();
                
            })
            
        });



        
</script>