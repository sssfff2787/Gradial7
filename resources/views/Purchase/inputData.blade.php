
<?php
    extract($data); 
    $idyangdikirim = (isset($idyangdikirim)) ?$idyangdikirim : "";
    $purchase1_id = (isset($purchase1->id) )? $purchase1->id : "";
    $lbnoPo = (isset($purchase1->lbnoPo) )? $purchase1->lbnoPo : "";
?>

<?php $jmhbaris = isset($sales2) ? $sales2->count() : 0; ?>
<div class="card text-center" >
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" id='tabpanel1' href="#">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  id='tabpanel2' href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled"  id='tabpanel2'href="#">Disabled</a>
      </li>
    </ul>
  </div>


  <form  id="FormInputPo"  class="text-center bpurchase bpurchase-light p-2" enctype="multipart/form-data" >
    @csrf
  <div class="card-head btn-info" >
    <h4 id='judul'> Input Data {{$url}}   </h4>
  </div>

  <div class="card-body" id='tabpanel1'>
       <div class="row ">

        <div class="col-3 md-form " id="DivnamaPO"> 
          <input  type="text" id="namaPO" name="namaPO" readonly class="form-control " value='{{$lbnoPo}}'>
          <label for="tanggal" class="active ml-3 text-primary">Nama PO</label>
        </div>

        <div class="col-3 md-form "> <?php $hariini = ($jenisinput=="Edit")? date_format(date_create_from_format('Y-m-d', $purchase1->tanggal), 'd M Y') : date('j M Y')?> 
        <input  type="text" id="tanggal" name="tanggal" class="form-control " value='{{$hariini}}'>
        <label for="tanggal" class="active ml-3 text-primary">Tanggal</label>
        </div>

        <div class="col-6 md-form "> <?php $ket = ($jenisinput=="Edit") ? $purchase1->ket: ""; ?>
        <input  type="text" id="ket" name="ket" class="form-control "  value="{{$ket}}">
        <label for="ket" class="active ml-3 text-primary" >Keterangan</label>
        </div>
    </div>
    <div class="row" id="editTambah">
      <button class="btn btn-info mt-4 " id="Edittambahklik"  > Tambah </button>
    </div>
    <div class="row" id='barisbrand'>
        <div class="col-3 md-form" id="divbrand2" disabled > <?php $i=1; $kode_brand = ($jenisinput=="Edit") ? $purchase1->brand_id: ""; ?>
          <select class="mdb-select3 md-form px-0 py-0" id="selectBrand" name="brand_id" searchable="Search here..">
                @foreach ($brand as $item) 
                  @if($kode_brand==$item->kode_brand){
                    <option class='text-primary' value="{{$item->kode_brand;}}" selected>{{$i++.".".$item->namabrand;}}</option> 
                  }@else{
                  <option class='text-primary' value="{{$item->kode_brand;}}">{{$i++.".".$item->namabrand;}}</option> 
                  }
                  @endif 
                @endforeach 
          </select>
          <label for="selectBrand" class="active ml-3 text-primary">Brand</label>
        </div>
    </div> 

    <div class="row" id='tabelnfooter'> 
     
        <div class="col-12  " id="tabel"  style="display: none" >
        </div>
        <div class="col-12  " id="preview"   >
          <button type="button" id="btnPreview" disabled class="btn btn-sm btn-default  float-center"> <i class="fa fa-check" aria-hidden="true"></i> Preview</button>
        </div>
        <div class="col-12  " id="tabel2"  style="display: none" >
        </div>
        

    </div>
      
    <div class="card-footer" id='footer' style="display: none">
        <a href="{{url('/')}}/purchase"> <button type="tbkembali button" id="batal" class="btn btn-grey  float-left btn-sm">Batal</button>	</a>
        <button type="submit" id="savePO" disabled class="btn btn-sm btn-default  float-right"> <i class="fa fa-check" aria-hidden="true"></i> Simpan</button>
        
        <input  type="hiddenX" id="jenisinput" name="jenisinput" class="form-control ml-3" value="{{$jenisinput}}"> 
        <input  type="hiddenX" id="idPO1" name="idPO1" class="form-control ml-3" value="{{$purchase1_id}}"> 
        <input  type="hiddenX" id="idyangdikirim" name="idyangdikirim" class="form-control ml-3" value="{{$idyangdikirim}}"> 
        {{-- <input  type="hiddenx" id="jmhsepatu" name="jmhsepatu" class="form-control ml-3" value=0> 
        <input  type="hiddenx" id="idsepatuDipilih" name="idsepatuDipilih" class="form-control ml-3" value=0> 
        <input  type="hiddenX" id="idyangdikirim" name="idyangdikirim" class="form-control ml-3" value={{$idyangdikirim}}>  --}}
      </div>


    </div>
  
  </form>


</div>




<script>

//datepicker
 $('#tanggal').pickadate({
    showMonthsShort: true,
    format: "d mmm yyyy",
    min: new Date(),
    max: +270,
    footer: false,
    useCurrent: true,
    //agar tidak terkurung didalam modal
    // container: '#content_index',
})



    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').material_select();        
      });
        // Material Select Initialization
        $(document).ready(function () {
        $('.mdb-select3').material_select();        
      });

      //saat halaman pertama kali di load
      $(document).ready(function() {
        var jenisinput = "{{$jenisinput}}";
        console.log(jenisinput);
        
        $("#tabelnfooter").hide();
        $("#footer").hide();
        $("#editTambah").hide();
        $("#DivnamaPO").hide();
        // $("#barisbrand").hide()
        

          if (jenisinput=="Edit") {
            $("h4").html("Edit Data "+"{{$url}}");
            $("#editTambah").show();
            $("#preview").hide();
            $("#barisbrand").hide();
            $("#DivnamaPO").show(); 
            // $("#selectBrand").attr("readonly", true); 

            var jmhsepatu = "{{$jmhbaris}}"; //dideklarasikan di atas 
            var jmhsepatu = parseInt(jmhsepatu);
            $("#jmhsepatu").val(jmhsepatu);
            $('#btnGo').attr("kodeGo", jmhsepatu);
            // var idgoo = $('#btnGo').attr("kodeGo");
            // console.log("ini kodeGo");
            // console.log(idgoo);

            // $('#barisbrand').hide();//baris brand, toko dan btnGo
            $("#tabelnfooter").show();        
            // kode_artikel mengmbalikan idsepatu tabel sepatu1Model
            // var idGo = $("#btnGo").attr("kodeGo");
            // console.log(idGo);
            
            var kode_brand =$("#selectBrand").val();
            var idyangdikirim = "{{$idyangdikirim}}"
            var baseurl = '{{url('/')}}';
                $.get(baseurl+'/purchase/tabelPreview_'+kode_brand+"_"+idyangdikirim, function (data) {
                  console.log(data);
                  // $("#isitabel").append(data);
                  // $("#tabel").show();
                  // $("#peringatan").show();
                  // $("#footer").show();
                  // $('#savePO').removeAttr('disabled'); 
                  // $('#barisbrand').show();

                  $("#tabel2").html(data);
                  $("#tabel2").show();
                  $("#footer").show();
                  $("#savePO").removeAttr('disabled');
                });
          }else{
            // var jmhsepatu = "{{$jmhbaris}}";
            // var jmhsepatu = parseInt(jmhsepatu);
            // var jmhsepatu = 10; // ini tidak ngaruh karena event terjadi saat btnGo di klik
            $("#jmhsepatu").val(10);
            $('#btnGo').attr("kodeGo", 0);
          }
        // idGo++;
      });



  

      



        $(document).on('click','.deletebarisTambah, .deletebarisEdit, .deletebarisUndo', function(e){

            var deletebariske = $(this).attr('baris');
            console.log("Baris yang mau di delete " +deletebariske);

            var classBaris = $(this).attr('class');
            console.log("Class Baris yang mau di delete " +classBaris);   
            
            var jenisinput = "{{$jenisinput}}";
            console.log("jenis input = "+ jenisinput);

            var sizemin = $('#sizemin_'+deletebariske).val();             
            var sizemax = $('#sizemax_'+deletebariske).val(); 
            
          if (classBaris=="deletebarisEdit") {
            
            $('#status_'+deletebariske).val('delete'); 
            $('#status_'+deletebariske).attr("readonly", true); 
            // $('#status_'+deletebariske).attr("disabled", true); 
            
            //ini g dipake hapus juga class qty_sepatu
            // var jmhpengulangan = $(".qty_sepatu_"+deletebariske).length;
            // console.log("jumlah pengulangan = "+jmhpengulangan);

    
            for (let index = sizemin; index <= sizemax ; index++) {
              $('#'+deletebariske+"-"+index ).attr("readonly", true); 
            }

            $(this).hide();
            $("#deletebarisUndo_"+deletebariske).show();
            var baris= $("#deletebarisUndo_"+deletebariske).attr('baris');
            console.log("deletebarisUndo_"+deletebariske+" baris = "+baris);

          }else if (classBaris=="deletebarisTambah"){

            // $('#bariske-'+deletebariske).remove();
            $('#status_'+deletebariske).val('tambahDelete'); 
            $('#status_'+deletebariske).attr("readonly", true); 
            console.log("Class Baris yang mau di delete = " +classBaris);
            // $('#status_'+deletebariske).attr("disabled", true); 
            for (let index = sizemin; index <= sizemax ; index++) {
              $('#'+deletebariske+"-"+index ).attr("readonly", true); 
            }


            $(this).hide();
            $("#deletebarisUndo_"+deletebariske).show();

          }else{
            console.log( "ini di undo");
            
            for (let index = sizemin; index <= sizemax ; index++) {
              console.log( "ini di pengulangan undo");
              $('#'+deletebariske+"-"+index ).removeAttr('readonly'); 
              
            }
               $(this).hide();

              if (jenisinput == "Edit") {
                $("#deletebarisEdit_"+deletebariske).show();
                $('#status_'+deletebariske).val(''); 
                // $('#status_'+deletebariske).removeAttr("disabled"); 
                $('#status_'+deletebariske).removeAttr("disabled"); 
              }else{

                $("#deletebarisTambah_"+deletebariske).show();
                $('#status_'+deletebariske).val('new'); 
                // $('#status_'+deletebariske).removeAttr("disabled"); 
                $('#status_'+deletebariske).removeAttr("disabled"); 
              }
          }


            var jmhbaris= $('.baris') ;
            jmhbaris = parseInt(jmhbaris.length++);
            $('#jmhsepatu').val(jmhbaris);
            console.log("jumlah baris = "+jmhbaris);
            
            // var del = $('#btnGo').attr('kodeGo');
            // del--;
            // $('#btnGo').attr('kodeGo', del);

        });

        
        $(document).on('click', '#Edittambahklik', function (e) {
          e.preventDefault();
          $(this).hide();
          $('#barisbrand').show();

          //untuk mengunci brand saat menu order edit
          $(".caret").addClass('disabled');
          $("#divbrand2").addClass('disabled');
          $("#brand2").addClass('disabled');

          var kode_brand =$("#selectBrand").val();
          var jenisinput = $('#jenisinput').val();
            console.log("jenisinput = "+ jenisinput);
            if (jenisinput=="Edit") {
                var idyangdikirim = $('#idyangdikirim').val();
                
            }
            console.log("idyangdikirim = "+idyangdikirim);
          var baseurl = '{{ url('/') }}';
          $.get(baseurl+'/purchase/tabelAddEdit_'+kode_brand+"_"+idyangdikirim, function (data) {

            // $("#sepatu2").html(data);
            // $("#selectsepatu1").show();
            // $("#btnGo2").show();
            $("#isi2").show();
            $("#tabel").html(data);
            $("#tabel").show();
            $("#preview").show();
            $("#tabelnfooter").show();

            // console.log(data);
          });

         
          
        })


</script>

