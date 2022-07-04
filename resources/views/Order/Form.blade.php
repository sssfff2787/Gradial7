<?php
    extract($data); 
    
?>
<?php
  
?>

  {{-- menampilkan error validasi --}}
  @if (count($errors) > 0)
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
<div class="container-fluid pl-0 ml-0" id='formcreate'> </div>
  <form  method="POST" id="formInputSales1"  class="text-center border border-light p-2" enctype="multipart/form-data" >
    @csrf

      <div class="md-form container-fluid pl-0">
        <div class=" md-form "> <?php $hariini = ($jenisinput=="orderEdit")? date_format(date_create_from_format('Y-m-d', $sales1->tanggal), 'd M Y') : date('j M Y')?> 
          <input  type="text" id="tanggal" name="tanggal" class="form-control ml-3" value='{{$hariini}}'> 
          <label for="tanggal" class="active ml-3 text-primary ">Tanggal</label>
        </div>

        <div class="row ml-1 md-form">
          <div class="md-form">
            <select class="mdb-select md-form ml-3 " id="toko" name='toko' searchable="Search here..">

                  @foreach ($toko as $item) {{-- Artinya lakukan penulangan sebanyak jumlah dari $model (dalam ini tabel brand) --}}
                    
                    {{-- ini if menggunakan php murni --}}
                    {{-- <?php 
                        $kodeSales = ($jenisinput=="orderEdit") ? $sales1->kode_sales1 : 0;
                      if($item->kode_toko==$sales1->$kodeSales ){ ?>
                      <option value="{{$item->kode_toko;}}" selected>{{$item->namatoko;}}</option> 
                    <?php }else { ?>
                      <option value="{{$item->kode_toko;}}" >{{$item->namatoko;}}</option>  
                    <?php } ?> --}}

                      {{-- menggunaka @if punya blade laravel --}}
                      <?php $kodetoko = ($jenisinput=="orderEdit") ? $sales1->kode_toko2 : 0; ?>
                      <?php //$kodetoko = ($jenisinput=="orderEdit") ? $item->TokoModel->kode_toko2 : 0; ?>
                    @if ($item->kode_toko==$kodetoko)
                       <option value="{{$item->kode_toko;}}" selected>{{$item->namatoko;}}</option> 
                    @else
                       <option value="{{$item->kode_toko;}}" >{{$item->namatoko;}}</option>  
                    @endif
                  @endforeach 

            </select>
            <label for="toko" class="active ml-3 text-primary">Nama Toko</label>
          </div>
        </div>

        <div class=" md-form "> 
          <input  type="text" id="ket" name="ket" class="form-control ml-3" >
          <label for="ket" class="active ml-3 text-primary">Keterangan</label>
        </div>
        <div class=" md-form "> {{--<?php $tgl = date_format($sales1->tanggal, "d/m/Y") ?> --}}
          <input  type="hiddenx" id="jenisinput" name="jenisinput" class="form-control ml-3" value="{{$jenisinput}}"> 
          <input  type="hiddenx" id="kode_sales1" name="kode_sales1" class="form-control ml-3" value="{{$kodetoko}}">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" id="btnFormOrderSave" class="btn btn-primary">Simpan</button>
          {{-- <button type="button" id="btnlanjut" class="btn btn-primary">Lanjutkan</button> --}}
        </div>
      </div>
  </form>
</div>
  <script>

    //datepicker
     $('#tanggal').pickadate({
        showMonthsShort: true,
        format: "d mmm yyyy",
        // min: new Date(),
        min: -30,
        max: +1,
        footer: false,
        useCurrent: true,
        //agar tidak terkurung didalam modal
        // container: '#formcreate',
    });

        // Material Select Initialization
        $(document).ready(function () {
        $('.mdb-select').material_select();        
      });

    // $(document).ready(function() {
    //     $('.js-example-basic-single').select2();
    // });

  </script>