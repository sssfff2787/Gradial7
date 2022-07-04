<?php
extract($data);
$YgDipilih = isset($selected)?$selected : '';
$kode_brand = isset($brand->kode_brand)?$brand->kode_brand: '';
$namabrand = isset($brand->namabrand)?$brand->namabrand: '';


?>

<form id="formAddBrand" class="text-center border border-light p-2" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-head btn-info">
            <h4 id='judul'> Input Data Sepatu </h4>
        </div>
        <div class="card-body ">
            <input type="hiddenx" id="jenisinput" name="jenisinput" value="{{ $jenisinput }}">
          
            <input type="hiddenx" id="kode_brand" name="kode_brand" value="">


            {{-- <div class="row form-group" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label for="kode_brand" class="active text-primary">Nama Brand</label>
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
                    <label class="active text-primary" for="namabrand"> Nama Brand </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="namabrand" name="namabrand">
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
            if (jenisinput=="brandEdit") {
                $('#kode_brand').val('{{$kode_brand}}');
                $('#namabrand').val('{{$namabrand}}');
                


                console.log(jenisinput);
            }else{
                
            }
        });

       
    </script>
