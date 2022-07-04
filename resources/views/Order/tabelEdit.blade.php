<?php
    extract($data); 
?>
  <?php $idGoi=1; // ini untuk membuat nomer?>  
@foreach ($sales2 as $item)

    <tr class="baris" name="bariske-{{$idGoi}}" id="bariske-{{$idGoi}}">
        <?php  $size=$item->Sepatu1Model->sizemin;?>
        <td class="text-center mt-5" id="no_{{$idGoi}}">{{$idGoi}} </td>
        <td class="text-center">
            {{-- <img src="{{url('/')}}/public/UPLOADED_FILE/sepatu2/{{$item->Sepatu1Model->namafile}}" style="height: 60px;" class="rounded mx-auto"> --}}
            <img src="{{url('/')}}/public/UPLOADED_FILE/sepatu2/123.jpg" style="height: 60px;" class="rounded mx-auto">
        </td>
        <td>  
            <div class=""> 
                <span > {{$item->Sepatu2Model->kodeart. ' '. $item->Sepatu2Model->warna}}</span>  
                
                <div class="row">
                    <div class="input-group mx-3" id='qty1'>
                            <?php $jmhpengulangan = (($item->Sepatu1Model->sizemax - $item->Sepatu1Model->sizemin)+1) ?>
                            <input type="hiddenX" name="idsepatu_{{$idGoi}}" id="idsepatu_{{$idGoi}}" value="{{$item->idsepatu2}}"> 
                            <input type="hidden" name="sizemin_{{$idGoi}}" id="sizemin_{{$idGoi}}" value="{{$item->Sepatu1Model->sizemin}}">
                            <input type="hidden" name="sizemax_{{$idGoi}}" id="sizemax_{{$idGoi}}" value="{{$item->Sepatu1Model->sizemax}}">
                            <input type="hiddenX" name="idsales2_{{$idGoi}}" id="idsales2_{{$idGoi}}" value="{{$item->idsales2}}">
                            <input type="hiddenx" name="status_{{$idGoi}}" id="status_{{$idGoi}}" value="">
                        @for ($i = 0; $i < $jmhpengulangan; $i++) 
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">{{$size}}</span>
                            </div>
                            <input type="number"  id='{{$idGoi.'-'.$size}}' idGo='{{$idGoi}}' name='qty-{{$idGoi.'-'.$size}}' class="form-control qty  qty_sepatu_{{$idGoi}}" aria-label="Username" aria-describedby="basic-addon1" value="{{$qtysales[$item->idsepatu2][$size]}}"> 
                            <input type="hidden" name="idsales3_{{$idGoi}}_{{$size}}" id="idsales3_{{$i}}" value="{{$idselas3[$item->idsepatu2][$size]}}">
                            <?php $size++ ?>  
                        @endfor
                    </div>
                </div>                
                
            </div>       
        </td>

        <td value=1 class="subtotal text-center" >
            <b id='subtotal_{{$idGoi}}'></b>
		    <input type="hidden" name="subtot_{{$idGoi}}" id="subtot_{{$idGoi}}">            
        </td>
        <td > 
            <a  class="deletebarisEdit" id="deletebarisEdit_{{$idGoi}}" baris={{$idGoi}}><i class="fas fa-trash"></i></a>
            <a  class="deletebarisUndo" id="deletebarisUndo_{{$idGoi}}" baris={{$idGoi}} style="display: none"><i class="fas fa-undo"></i></a>
            <input type="hidden" name="deletebariske-{{$idGoi}}" id="deletebariske-{{$idGoi}}" value="{{$idGoi}}"> 
        </td>
    </tr>
    <?php $idGoi++; ?>
@endforeach




        
<script>


</script>
