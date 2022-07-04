<?php
    extract($data); 
?>
  <?php $idGoi=1; // ini untuk membuat nomer?>  


    <tr class="baris" name="bariske-{{$idGo}}" id="bariske-{{$idGo}}">
        <?php  $size=$sepatu2->Sepatu1Model->sizemin;?>
        <td class="text-center mt-5" id="no_{{$idGo}}">{{$idGo}} </td>
        <td class="text-center">
            {{-- <img src="{{url('/')}}/public/UPLOADED_FILE/sepatu2/{{$sepatu2->Sepatu1Model->namafile}}" style="height: 60px;" class="rounded mx-auto"> --}}
            <img src="{{url('/')}}/public/UPLOADED_FILE/sepatu2/123.jpg" style="height: 60px;" class="rounded mx-auto">
        </td>
        <td>  
            <div class=""> 
                <span > {{$sepatu2->kodeart. ' '. $sepatu2->warna}}</span>  
                
                <div class="row">
                    <div class="input-group mx-3" id='qty1'>
                            <?php $jmhpengulangan = (($sepatu2->Sepatu1Model->sizemax - $sepatu2->Sepatu1Model->sizemin)+1) ?>
                            <input type="hiddenx" name="idsepatu_{{$idGo}}" id="idsepatu_{{$idGo}}" value="{{$sepatu2->idsepatu}}"> 
                            <input type="hidden" name="sizemin_{{$idGo}}" id="sizemin_{{$idGo}}" value="{{$sepatu2->Sepatu1Model->sizemin}}">
                            <input type="hidden" name="sizemax_{{$idGo}}" id="sizemax_{{$idGo}}" value="{{$sepatu2->Sepatu1Model->sizemax}}">
                            <input type="hiddenx" name="status_{{$idGo}}" id="status_{{$idGo}}" value="new" >
                            {{-- <input type="hidden" name="idsales2_{{$idGo}}" id="idsales2_{{$idGo}}" value="{{$sales2->idsales2}}"> --}}
                        @for ($i = 0; $i < $jmhpengulangan; $i++) 
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">{{$size}}</span>
                            </div>
                            <input type="number"  id='{{$idGo.'-'.$size}}' idGo='{{$idGo}}' name='qty-{{$idGo.'-'.$size}}' class="form-control qty" aria-label="Username" aria-describedby="basic-addon1" value=""> 
                  
                            {{-- <input type="hidden" name="idsales3_{{$idGo}}_{{$size}}" id="idsales3_{{$i}}" value=""> --}}
                            <?php $size++ ?>  
                        @endfor
                    </div>
                </div>                
                
            </div>       
        </td>

        <td value=1 class="subtotal text-center" >
            <b id='subtotal_{{$idGo}}'></b>
		    <input type="hidden" name="subtot_{{$idGo}}" id="subtot_{{$idGo}}">            
        </td>
        <td > 
            <a  class="deletebarisTambah" id="deletebarisTambah_{{$idGo}}" baris={{$idGo}}><i class="fas fa-trash"></i></a>
            <a  class="deletebarisUndo" id="deletebarisUndo_{{$idGo}}"  baris={{$idGo}} style="display: none"><i class="fas fa-undo"></i></a>
            <input type="hiddenx" name="deletebariske-{{$idGo}}" id="deletebariske-{{$idGo}}" value="{{$idGo}}"> 
        </td>
    </tr>
    <?php $idGo++; ?>





        
<script>


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
