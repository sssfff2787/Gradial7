<?php
    extract($data); 
?>

    <tr name="bariske-{{$idGo}}" id="bariske-{{$idGo}}">
        <?php  $size=$model2->sizemin;?>
        <td class="text-center mt-5" id=''>{{$idGo}} </td>
        <td class="text-center">
            {{-- <img src="{{url('/')}}/public/UPLOADED_FILE/sepatu2/{{$model2->namafile}}" style="height: 60px;" class="rounded mx-auto"> --}}
            <img src="{{url('/')}}/public/UPLOADED_FILE/sepatu2/123.jpg" style="height: 60px;" class="rounded mx-auto">
        </td>
        <td>  
            <div class=""> 
                <span > {{$model->kodeart. ' '. $model->warna}}</span>  
                
                <div class="row">
                    <div class="input-group mx-3" id='qty1'>
                            <?php $jmhpengulangan = (($model2->sizemax - $model2->sizemin)+1) ?>
                            <input type="hidden" name="idsepatu_{{$idGo}}" id="idsepatu_{{$idGo}}" value="{{$model->idsepatu}}"> 
                            <input type="hidden" name="sizemin_{{$idGo}}" id="sizemin_{{$idGo}}" value="{{$model2->sizemin}}">
                            <input type="hidden" name="sizemax_{{$idGo}}" id="sizemax_{{$idGo}}" value="{{$model2->sizemax}}">
                        @for ($i = 0; $i < $jmhpengulangan; $i++) 
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">{{$size}}</span>
                            </div>
                            <input type="number" id='{{$idGo.'-'.$size}}' idGo='{{$idGo}}' name='qty-{{$idGo.'-'.$size}}' class="form-control qty" aria-label="Username" aria-describedby="basic-addon1">
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
            <a  class="deletebaris mt-4 " baris={{$idGo}}>X</a>
            <input type="hidden" name="deletebariske-{{$idGo}}" id="deletebariske-{{$idGo}}" value="{{$idGo}}"> 
        </td>
    </tr>





        
<script>


</script>
