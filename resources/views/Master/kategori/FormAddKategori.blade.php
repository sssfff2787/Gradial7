<?php
extract($data);
$YgDipilih = isset($selected)?$selected : '';
$kode_kate = isset($kate->kode_kate)?$kate->kode_kate: '';
$namakate = isset($kate->namakate)?$kate->namakate: '';
$diskon = isset($kate->diskon)?$kate->diskon: '';


?>

<form id="formAddKategori" class="text-center border border-light p-2" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-head btn-info">
            <h4 id='judul'> Input Data Sepatu </h4>
        </div>
        <div class="card-body ">
            <input type="hiddenx" id="jenisinput" name="jenisinput" value="{{ $jenisinput }}">
          
            <input type="hiddenx" id="kode_kate" name="kode_kate" value="">


            {{-- <div class="row form-group" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label for="kode_kate" class="active text-primary">Nama kate</label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <select class=" " id="kode_sepatu" name='kode_sepatu' searchable="Search here..">
                        @foreach ($sepatu1 as $item)
                            @if ($YgDipilih==$item->namastyle)
                            <option value="{{ $item->kode_sepatu1 }}" selected>{{ $item->namastyle }}</option>
                            @else
                            <option value="{{ $item->kode_sepatu1 }}">{{ $item->namastyle }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div> --}}
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="namakate"> Nama Kategori </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="namakate" name="namakate">
                </div>

            </div>
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="diskon"> Diskon </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="diskon" name="diskon">
                </div>

            </div>


            <div class="d-flex">
                <input type="button" class="btn btn-sm btn-info justify-content-start" id="btnSave"
                    style="text-align: left !important;" value="Save">
            </div>

        </div>
    </div>

    <script>

        $(document).ready(function() {
            
            var jenisinput = '{{$jenisinput}}';
            console.log(jenisinput);
            if (jenisinput=="kategoriEdit") {
                $('#kode_kate').val('{{$kode_kate}}');
                $('#namakate').val('{{$namakate}}');
                $('#diskon').val('{{$diskon}}');
                


                console.log(jenisinput);
            }else{
                
            }
        });

       
    </script>
