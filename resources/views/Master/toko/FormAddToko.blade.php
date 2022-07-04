<?php
extract($data);
$YgDipilih = isset($selected)?$selected : '';
$kode_toko = isset($toko->kode_toko)?$toko->kode_toko : '';
$kode_kate = isset($toko->kode_kate2)?$toko->kode_kate2 : '';
$namatoko = isset($toko->namatoko)?$toko->namatoko : '';
$alamat = isset($toko->alamat)?$toko->alamat : '';
$kota = isset($toko->kota)?$toko->kota : '';
$telp = isset($toko->telp)?$toko->telp : '';
$person = isset($toko->person)?$toko->person : '';

?>

<form id="formAddToko" class="text-center border border-light p-2" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-head btn-info">
            <h4 id='judul'> Input Data Sepatu </h4>
        </div>
        <div class="card-body ">
            <input type="hiddenx" id="jenisinput" name="jenisinput" value="{{ $jenisinput }}">
            <?php $kode_toko = ($jenisinput=="tokoEdit")?$toko->kode_toko :"" ;?>
            <input type="hiddenx" id="kode_toko" name="kode_toko" value="">
            <div class="row form-group" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label for="kode_kate" class="active text-primary">Nama Kategori</label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <select class=" " id="kode_kate" name='kode_kate' searchable="Search here..">
                        @foreach ($kate as $item)
                            @if ($YgDipilih==$item->namakate)
                            <option value="{{ $item->kode_kate }}" selected>{{ $item->namakate }}</option>
                            @else
                            <option value="{{ $item->kode_kate }}">{{ $item->namakate }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div>
            {{-- <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="kode_kate2"> Kode Art </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="kode_kate2" name="kode_kate2">
                </div>

            </div> --}}
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="namatoko"> namatoko </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="namatoko" name="namatoko">
                </div>

            </div>
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="alamat"> Alamat </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="alamat" name="alamat">
                </div>
            </div>
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="kota"> Kota </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="kota" name="kota">
                </div>
            </div>
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="telp"> Telepon </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="telp" name="telp">
                </div>
            </div>
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="person"> Person </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="person" name="person">
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
            if (jenisinput=="tokoEdit") {
                $('#kode_toko').val('{{$kode_toko}}');
                $('#kode_kate').val('{{$kode_kate}}');
                $('#namatoko').val('{{$namatoko}}');
                $('#alamat').val('{{$alamat}}');
                $('#kota').val('{{$kota}}');
                $('#telp').val('{{$telp}}');
                $('#person').val('{{$person}}');


                console.log(jenisinput);
            }else{
                
            }
        });

       
    </script>
