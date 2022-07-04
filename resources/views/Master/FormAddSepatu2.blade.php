<?php
extract($data);
?>

<form id="formAddSepatu2" class="text-center border border-light p-2" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-head btn-info">
            <h4 id='judul'> Input Data Sepatu </h4>
        </div>
        <div class="card-body ">
            <input type="hiddenx" id="jenisinput" name="jenisinput" value="{{ $jenisinput }}">
            <?php $idsepatu = ($jenisinput=="sepatu2Edit")?$sepatu2->idsepatu :"" ;?>
            <input type="hiddenx" id="idsepatu" name="idsepatu" value="">
            <div class="row form-group" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label for="kode_sepatu" class="active text-primary">Nama Style</label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <select class=" " id="kode_sepatu" name='kode_sepatu' searchable="Search here..">
                        @foreach ($sepatu1 as $item)
                            @if ($selected==$item->namastyle)
                            <option value="{{ $item->kode_sepatu1 }}" selected>{{ $item->namastyle }}</option>
                            @else
                            <option value="{{ $item->kode_sepatu1 }}">{{ $item->namastyle }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="kodeart"> Kode Art </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="kodeart" name="kodeart">
                </div>

            </div>
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="warna"> Warna </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="warna" name="warna">
                </div>

            </div>
            <div class="row form-group d-flex" style="text-align: left !important; width:800px;">
                <div class="px-2 " style="width:100px;">
                    <label class="active text-primary" for="ket"> Keterangan </label>
                </div>
                <div class="form-group pr-2" style="text-align: left !important; width:2px; !important">
                    :
                </div>
                <div class="col-2 form-group px-0">
                    <input type="text" class="active md-form " id="ket" name="ket">
                </div>

            </div>

            <div class="d-flex">
                <input type="button" class="btn btn-sm btn-info justify-content-start" id="btnSave"
                    style="text-align: left !important;" value="Save">
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function (e) {
            // saat edit isi form dengan nilai yg sesuai
            var jenisinput = '{{$jenisinput}}';
            console.log(jenisinput);
            if (jenisinput=="sepatu2Edit") {
                $('#idsepatu').val('{{$sepatu2->idsepatu}}');
                $('#kodeart').val('{{$sepatu2->kodeart}}');
                $('#warna').val('{{$sepatu2->warna}}');
                $('#ket').val('{{$sepatu2->ketsepatu}}');
                var kodesepatu = $('#kode_sepatu').val();
                console.log(kodesepatu);
            }
        });
    </script>
