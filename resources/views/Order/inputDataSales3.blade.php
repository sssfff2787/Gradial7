
<?php
    extract($data); 
    $kode_brand=isset($sales2[0]->BrandModel->kode_brand) ? $sales2[0]->BrandModel->kode_brand :"";
    echo $kode_brand;
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


  <form  id="orderCreateDetail"  class="text-center border border-light p-2" enctype="multipart/form-data" >
    @csrf
  <div class="card-head btn-info" >
    <h4 id='judul'> Input Data Sales Order   </h4>
  </div>

  <div class="card-body" id='tabpanel1'>
       <div class="row ">

        <div class="col-4 md-form "> <?php $hariini = ($jenisinput=="orderEdit")? date_format(date_create_from_format('Y-m-d', $sales1->tanggal), 'd M Y') : date('j M Y')?> 
        <input  type="text" id="tanggal" name="tanggal" class="form-control " value='{{$hariini}}'>
        <label for="tanggal" class="active ml-3 text-primary">Tanggal</label>
        </div>

        
          <div class=" col-4  px-0 py-0 mx-0 my-0 md-form">
            <select class="mdb-select md-form ml-3 py-0 my-3 " id="toko" name='toko' searchable="Search here..">

              
              {{-- menggunaka @if punya blade laravel --}}
              <?php $kodetoko = ($jenisinput=="orderEdit") ? $sales1->kode_toko2 : 0; ?>
              <?php //$kodetoko = ($jenisinput=="orderEdit") ? $item->TokoModel->kode_toko2 : 0; ?>
              @foreach ($toko as $item) 
                @if ($item->kode_toko==$kodetoko)
                   <option value="{{$item->kode_toko;}}" selected>{{$item->namatoko;}}</option> 
                @else
                   <option value="{{$item->kode_toko;}}" >{{$item->namatoko;}}</option>  
                @endif
              @endforeach

            </select>
            <label for="toko" class="active mt-5 ml-3 text-primary">Nama Toko</label>
          </div>
        

        <div class="col-4 md-form "> <?php $ket = ($jenisinput=="orderEdit") ? $sales1->ketsales : ""; ?>
        <input  type="text" id="ket" name="ket" class="form-control "  value="{{$ket}}">
        <label for="ket" class="active ml-3 text-primary" >Keterangan</label>
        </div>
    </div>

    <div class="row" id="editTambah">
      <button class="btn btn-info mt-4 " id="Edittambahklik"  > Tambah </button>
    </div>

    <div class="row" id='barisbrand'>
        <div class="col-4 md-form" id="divbrand2" disabled> <?php $namabrand = ($jenisinput=="orderEdit") ? 1: 0; ?>
          <select class="mdb-select3 md-form px-0 py-0" id="brand2" searchable="Search here..">
                @foreach ($brand as $item) {{-- Artinya lakukan penulangan sebanyak jumlah dari $model (dalam ini tabel brand) --}}
                  {{-- <option class='text-primary' value="{{$item->kode_brand;}}">{{$item->namabrand;}}</option>   --}}
                  @if($kode_brand==$item->kode_brand){
                    <option class='text-primary' value="{{$item->kode_brand;}}" selected>{{$item->namabrand;}}</option> 
                  }@else{
                  <option class='text-primary' value="{{$item->kode_brand;}}">{{$item->namabrand;}}</option> 
                  }
                  @endif 
                @endforeach 
          </select>
        <label for="brand2" class="active ml-3 text-primary">Brand</label>
        </div>

        <div class="col-4 md-form" id="selectsepatu1" style="display: none" >
          <div id='sepatu2'> </div>
        </div>

        <div class="col-4 md-form text-left " id="btnGo2"  style="display: none" >
          <a href="#" class="btn btn-info mt-4 " kodeGo=1 id='btnGo'>Go </a>
        </div>
    </div> 
    <div class="row" id='tabelnfooter'>  
        <div class="col-12 mt-5 " id="tabel"  style="display: none" >
          <table id="tabelInput" class="table table-sm table-hover table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                <td>No</td>
                <td>Foto </td>
                <td id='judulartikel'>Kode Artikel - Style Warna / Size + Qty </td>
                <td> Sub Total </td>
                <td> </td>
                </tr>
            </thead>
              <tbody id='isitabel'>
              </tbody>

              <tbody  id='Baristotal'>
                
                <tr>
                  <td colspan="3"> Total </td>
                  <td id="total"> </td>
                </tr>
           
              </tbody>
          </table>
        </div>
        <div id='peringatan' style="display: none">
          <i  class="ml-3">NB: Belum ada pengecekan article double, harap hati-hati!</i>
        </div>

      </div>
      <div class="card-footer" id='footer' style="display: none">
        <a href="{{url('/')}}/order"> <button type="tbkembali button" id="batal" class="btn btn-grey  float-left btn-sm">Batal</button>	</a>
        <button type="submit" id="simpanpo" disabled class="btn btn-sm btn-default  float-right"> <i class="fa fa-check" aria-hidden="true"></i> Simpan</button>
        
        <input  type="hiddenX" id="jenisinput" name="jenisinput" class="form-control ml-3" value="{{$jenisinput}}"> 
        <input  type="hiddenx" id="jmhsepatu" name="jmhsepatu" class="form-control ml-3" value=0> 
        <input  type="hiddenx" id="idsepatuDipilih" name="idsepatuDipilih" class="form-control ml-3" value=""> 
        <input  type="hiddenX" id="kode_sales1" name="kode_sales1" class="form-control ml-3" value={{$kode_sales1}}> 
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
        $("h4").html("Edit Data");
        $("#tabelnfooter").show();
        $("#footer").show();
        $("#editTambah").hide();
        

          if (jenisinput=="orderEdit") {
            $("#editTambah").show();

            var jmhsepatu = "{{$jmhbaris}}"; //dideklarasikan di atas 
            var jmhsepatu = parseInt(jmhsepatu);
            $("#jmhsepatu").val(jmhsepatu);
            $('#btnGo').attr("kodeGo", jmhsepatu);
            var idgoo = $('#btnGo').attr("kodeGo");
            console.log("ini kodeGo");
            console.log(idgoo);

            $('#barisbrand').hide();//baris brand, toko dan btnGo
            $("#tabelnfooter").show(); 
            
            
            // kode_artikel mengmbalikan idsepatu tabel sepatu1Model
            var kode_sales1 = "{{$kode_sales1}}"
            var idGo = $("#btnGo").attr("kodeGo");
            // console.log(idGo);
            var baseurl = '{{url('/')}}';
            console.log(baseurl+'/order/tabel2_'+kode_sales1+'_'+idGo);
                $.get(baseurl+'/order/tabel2_'+kode_sales1+'_'+idGo, function (data) {
                  $("#isitabel").append(data);
                  $("#tabel").show();
                  $("#peringatan").show();
                  $("#footer").show();
                  $('#simpanpo').removeAttr('disabled'); 
                  // $('#barisbrand').show();
                });
          }else{
            // var jmhsepatu = "{{$jmhbaris}}";
            // var jmhsepatu = parseInt(jmhsepatu);
            // var jmhsepatu = 10; // ini tidak ngaruh karena event terjadi saat btnGo di klik
            // $("#jmhsepatu").val(10);
            $('#btnGo').attr("kodeGo", 0);
          }
        idGo++;
      });



        $(document).on('change','#brand2', function(e){
          console.log('jalan event');
          // $("#selectsepatu1").show();
          var jmhsepatu = parseInt($('#jmhsepatu').val());
              if (jmhsepatu > 0 && jmhsepatu!=NaN) {
                const idsepatu = [];
                var idsepatuDipilih =""
                for (let index = 1; index <= jmhsepatu; index++) {
                  $text = "idsepatu_"+index;
                  idsepatu[index]= parseInt($('#'+$text).val());
                  if (index ==jmhsepatu ) {
                    idsepatuDipilih += idsepatu[index];
                    
                  }else{

                    idsepatuDipilih += idsepatu[index]+"_";
                  }
                }
                $("#idsepatuDipilih").val(idsepatuDipilih ); //ini agar ketika edit text idsepatuDipilih sudah ada isinya
                console.log("idsepatuDipilih = "+idsepatuDipilih);
              }
            
          var kode_brand = $(this).val();
          // console.log(kode_brand);
          var baseurl = '{{url('/')}}';
              $.get(baseurl+'/order/sepatu2_'+kode_brand+"_"+idsepatuDipilih, function (data) {
 
                $("#sepatu2").html(data);
                $("#selectsepatu1").show();
                $("#btnGo2").show();
 
                console.log(data);
              });

            
              // $(this).attr("disabled", true); 
              // $(this).hide(); 

        });
        
       

        $(document).on('focus, keyup, change','.qty', function(e){
          var kode_brand = $(this).val();
          var idGo =$(this).attr('idGo');

          var status = $('#status_'+idGo).val();
          

          if (status =='new' || status=='delete') {
            
          }else{
            $('#status_'+idGo).val('edit'); 
          }

          var sizemin = parseInt($("#sizemin_"+idGo).val());
          var sizemax = parseInt($("#sizemax_"+idGo).val());

          var subtotal=0;

          for (let i = sizemin; i <= sizemax; i++) {
            $parseNilai = parseInt($("#"+idGo+'-'+i).val()); //menghasilkan (#1-38)
            // $parseNilai = parseInt($("#qty_1-39").val());

            $parseNilai = isNaN($parseNilai) ? 0:$parseNilai;

            subtotal += $parseNilai;
          }
          console.log(subtotal);
          $('#subtotal_'+idGo).html(subtotal);
          $('#subtot_'+idGo).val(subtotal);

          var jmhSubTot = $('.subtotal').length;          

          var total=0;
          for (let index = 1; index <= jmhSubTot; index++) {

              var subtot = parseFloat($("#subtotal_"+index).html()); //ambil dari tag <b>
              // var subtot = parseFloat($("#subtotal_"+index).text());
              // var subtot = parseFloat($("#subtot_"+index).val());
              total +=subtot;
          }
          $('#total').html(total);
          $('#simpanpo').removeAttr('disabled'); 

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

              if (jenisinput == "orderEdit") {
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

          //menampilkan tabelAddEdit
          

          var jmhsepatu = parseInt($('#jmhsepatu').val());
              if (jmhsepatu > 0 && jmhsepatu!=NaN) {
                const idsepatu = [];
                var idsepatuDipilih =""
                for (let index = 1; index <= jmhsepatu; index++) {
                  $text = "idsepatu_"+index;
                  idsepatu[index]= parseInt($('#'+$text).val());
                  if (index ==jmhsepatu ) {
                    idsepatuDipilih += idsepatu[index];
                    
                  }else{

                    idsepatuDipilih += idsepatu[index]+"_";
                  }
                }
                $("#idsepatuDipilih").val(idsepatuDipilih ); //ini agar ketika edit text idsepatuDipilih sudah ada isinya
                console.log("idsepatuDipilih = "+idsepatuDipilih);
              }
            
          var kode_brand = $('#brand2').val();
          // console.log(kode_brand);
          var baseurl = '{{url('/')}}';
              $.get(baseurl+'/order/sepatu2_'+kode_brand+"_"+idsepatuDipilih, function (data) {
 
                $("#sepatu2").html(data);
                $("#selectsepatu1").show();
                $("#btnGo2").show();
 
                console.log(data);
              });
 
          
        })


</script>

