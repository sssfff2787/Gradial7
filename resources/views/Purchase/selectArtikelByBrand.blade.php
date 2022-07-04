<?php
    extract($data); 
?>


 <select class="mdb-select2 md-form spinner-layer spinner-green-only" id="selectsepatu2" searchable="Search here..">
    @foreach ($sepatu2br as $item) {{-- Artinya lakukan penulangan sebanyak jumlah dari $model (dalam ini tabel brand) --}}
        <option class='text-primary'  value="{{$item->idsepatu;}}" id="option_+{{$item->idsepatu}}">{{$item->kodeart.' '.$item->warna;}}</option>  
    @endforeach 
</select>


<script>
      $(document).ready(function () {
        $('.mdb-select2').material_select();        
      });


</script>
