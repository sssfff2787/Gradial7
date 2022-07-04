<?php
extract($data);
$YgDipilih = isset($selected)?$selected : '';
$kode_sepatu1 = isset($sepatu1->kode_sepatu1)?$sepatu1->kode_sepatu1 : '';
$namastyle = isset($sepatu1->namastyle)?$sepatu1->namastyle : '';
$sizemin = isset($sepatu1->sizemin)?$sepatu1->sizemin : '';
$sizemax = isset($sepatu1->sizemax)?$sepatu1->sizemax : '';

?>

<form id="formAddsepatu1" class="text-center border border-light p-2" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-head btn-info">
            <h4 id='judul'> Input Data Sepatu </h4>
        </div>
        <div class="card-body ">
            <input type="hiddenx" id="jenisinput" name="jenisinput" value="{{ $jenisinput }}">
            <?php $kode_sepatu1 = ($jenisinput=="sepatu1Edit")?$sepatu1->kode_sepatu1 :"" ;?>
            <input type="hiddenx" id="kode_sepatu1" name="kode_sepatu1" value="">


            <div class="row form-group" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label for="kode_brand" class="active text-primary">Nama Brand</label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <select class=" " id="kode_brand" name='kode_brand' searchable="Search here..">
                        @foreach ($brand as $item)
                            @if ($YgDipilih==$item->namabrand)
                            <option value="{{ $item->kode_brand}}" selected>{{ $item->namabrand }}</option>
                            @else
                            <option value="{{ $item->kode_brand}}">{{ $item->namabrand }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="namastyle"> Nama Style </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="namastyle" name="namastyle">
                </div>

            </div>
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="sizemin"> Size min </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="sizemin" name="sizemin">
                </div>

            </div>
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="sizemax"> Size max </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="sizemax" name="sizemax">
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
            if (jenisinput=="sepatu1Edit") {
                $('#kode_sepatu1').val('{{$kode_sepatu1}}');
                $('#namastyle').val('{{$namastyle}}');
                $('#sizemin').val('{{$sizemin}}');
                $('#sizemax').val('{{$sizemax}}');


                console.log(jenisinput);
            }else{
                
            }
        });

       
    </script>
