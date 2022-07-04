


<?php
extract($data); 
?>
{{-- <h1> judul </h1> --}}
<table class="display table table-sm table-hover table-bordered mb-0 mt-2 table-striped" id="">
    <thead class=" mdb-color lighten-3">
        <tr>
            <th class="text-center" style="width:35px;">No</th>
            
            <th class="text-center">Kode Artikel</th> {{-- sepatu2->kodeart  --}}
            <th class="text-center">Style</th> {{-- sepatu1->namastyle  --}}
            <th class="text-center">Warna</th>{{-- sepatu2->warna  --}}
                    
               
               @for ($i = $sizemin; $i <= $sizemax; $i++)
                    <?php $totalsize[$i] = 0;?> {{-- untuk menampung total di setiap size--}}
                    <th class="text-center {{$i}} ">{{$i}}</th>
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
                    {{$item->Sepatu2Model->kodeart." = ".$item->Sepatu2Model->idsepatu}}
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
                @if (isset($qtysales[$item->idsepatu2][$j ] ) )
                    <?php
                        $subtot        += $qtysales[$item->idsepatu2][$j];
                        $totalsize[$j] += $qtysales[$item->idsepatu2][$j];
                    ?>
                <td class="align-middle {{$j}} ">
                    {{$qtysales[$item->idsepatu2][$j] }}
                </td>
                @else
                <td class="align-middle {{$j}} ">
                    {{-- {{" ko" }} --}}
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
            <td colspan="4" class="align-middle text-center">
                Total
            </td>
            
            @for ($j = $sizemin; $j <= $sizemax; $j++)

                @if (isset($totalsize[$j]  ))
                <td class="align-middle {{$j}}  ">
                    {{$totalsize[$j]}}
                </td>
                <input type="hidden" value="{{$totalsize[$j]}}" id="totalsize_{{$j}}">
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
<script type="text/javascript">

    jQuery(document).ready(function($a) {
        // $('.27').html("");
        // $('.27').hide();
        // $('.28').hide();
        // $('.29').hide();
        // $('.30').hide();
        // $('.31').hide();
        // $('.32').hide();
        // $('.33').hide();
        // $('.34').hide();
        // $('.35').hide();
        // $('.36').hide();
        // $('.37').hide();
        
        var sizemin = "{{$sizemin}}";
        var sizemax = "{{$sizemax}}";
        // console.log(sizemin);
        for (let index = sizemin; index <= sizemax; index++) {
            var kolomkosong = $('#totalsize_'+index).val();
            if (kolomkosong == 0) {
                $('.'+index).hide();  
            }
            
        }
       

       
    });

//     $(document).ready(function () {
//     $('table.display').DataTable();
// });

// Material Select Initialization
// $(document).ready(function () {
//     $('.dataTable').material_dataTable();        
//     });

// $('#tabelShowData').DataTable( {
//     lengthMenu: [ [1, 50, -1], [1, 50, "All"] ],
//     // lengthChange: false,
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
//         { searchable: false, orderable: false } //kolom pertama
//       ],
//     order: [[0,'asc']],
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
//         // $("#tabelShowData").show();
//         // $("#loadingtabel1").hide();
//     }
// });


// $('#tabelShowData_wrapper').find('label').each(function () {
//     $(this).parent().append($(this).children());
// });
// $('#tabelShowData_wrapper .dataTables_filter input').attr("placeholder", "Search");
// $('#tabelShowData_wrapper .dataTables_filter input').attr("id", "searchPattern1");
// $('#tabelShowData_wrapper .dataTables_filter input').removeClass('form-control-sm');
// $('#tabelShowData_wrapper .dataTables_length').addClass('d-flex flex-row ml-2');
// $('#tabelShowData_wrapper .dataTables_filter').addClass('md-form mt-0 mb-0 mr-3 float-right');
// $('#tabelShowData_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
// $('#tabelShowData_wrapper select').addClass('mdb-select');
// $('#tabelShowData_paginate').addClass('float-right');
// $('#tabelShowData_wrapper .mdb-select').material_select();
// $('#tabelShowData_wrapper .dataTables_filter').find('label').remove();
//  /*Set Judul Tabel custom dewe*/
// //var judultabel = $('#judultabelShowData').html();
// $('#tabelShowData_wrapper .row .pr-0').html(""); 
// $('#tabelShowData_wrapper .dataTables_filter').addClass('mt-2');
 </script>


