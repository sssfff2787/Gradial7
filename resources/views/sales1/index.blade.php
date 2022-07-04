@extends('layout.template')

@section('content')            
            

<?php
    extract($data); 
?>
<div class="row mt-2" id="content_index" style="min-height: 600px;">
   
  <div id="loadingdetail" class="preloader-wrapper big active crazy" style="width: 100px; height: 100px; display: none;">
    <div class="spinner-layer spinner-green-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div>
      <div class="gap-patch">
        <div class="circle"></div>
      </div>
      <div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>   
  

  <div class="col-md-12" id="isi1">
      <input type="hidden" name="kode_ord1" id="kode_ord1" value="">

      <ul class="nav nav-tabs md-tabs  light-blue">
          
          <li class="nav-item">
              <a class="tabpanel nav-link active"  data-toggle="tab" href="#panel1" panelke="panel1" id="tabpanel1" role="tab"><b>Draft</b></a>
          </li>
          
          <li class="nav-item">
              <a class="tabpanel nav-link "  data-toggle="tab" href="#panel2" panelke="panel2" id="tabpanel2" role="tab"><b>On Going</b></a>
          </li>

          <li class="nav-item">
              <a class="tabpanel nav-link "  data-toggle="tab" href="#panel3" panelke="panel3" id="tabpanel3" role="tab"><b>Complete</b></a>
          </li>

      </ul>


      <div class="tab-content card">

          <div class="tab-pane fade in show active" role="tabpanel">

              <div id="loadingpanel" class="preloader-wrapper big active crazy" style="width: 100px; height: 100px; display: none;">
                <div class="spinner-layer spinner-red-only">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                    <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>
              </div>   
              <div>
                <button type="button"   class="btntambah btn btn-primary" id="btnadd" > Tambah</button>
              </div>
              <div id="isipanel" class="row" style="margin-bottom: 30px;">

                 

              </div>

          </div>

      </div>
  </div>

  <div class="col-md-12 col-sm-12" id="isi2" style="display: none;">
          
  </div>

  <div class="col-md-12 col-sm-12" id="isi3" style="display: none;">
          
  </div>

<!-- Modal -->
<div class="modal fade " id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-md" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdlcrejudul">Sales Order Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id='modalcreateisi'> </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" id="btnlanjut" class="btn btn-primary">Lanjutkan</button> --}}
      </div>
    </div>
  </div>
</div>



</div>

@endsection

@section('JS')


<script>



//Selec2
// $(document).ready(function() {
//     $('.js-example-basic-single').select2();
//     $('#label').hidden();
// });

//saat pertama kali url=order jalankan tabpanel1.click
jQuery(document).ready(function($) {
    $("#tabpanel1").click(); //menjalankan function class tabpanel    
});

//pertama kali id tabpanel click dijalankan yang class tabpanel, funtion ini sesuai dengan tabpanel yg di klik
// mengembalikan view sales1.index.blade.php
$(".tabpanel").click(function(){
    $("#loadingpanel").show();
    var panelke = $(this).attr('panelke');
    $('#tabel1').dataTable().fnDestroy();
    
    $("#isipanel").html("");    
    // console.log("ok1");
    var baseurl = '{{url('/')}}';
    $.get(baseurl+'/order/'+panelke, function (data) {
      $("#isipanel").html(data);
      $("#loadingpanel").hide();
      // console.log(data);
    });
});

//ketika tombol btnadd di btnadd buka form create Sales1 
$(document).on('click','#btnadd', function(e){
  e.preventDefault(); 
  $('#loadingpanel').show();
  $('#loadingpanel').hide();

  var baseurl = '{{url('/')}}';
  $.get(baseurl+'/order/OBAK', function(data){
    $('#modalcreateisi').html(data);
    console.log('tambah');
  });
  
  // $('#show').html('Halo');
  $('#modalCreate').modal('show');
  
});


  


//jika tombol Simpan di form create sales1 di klik simpan data ke database(tabel sales1)
$(document).on('click', '#posimpan', function (e) {
    var isvalidate = $("#formInputSales1")[0].checkValidity();
    if (isvalidate) {
        e.preventDefault(); //PENTING
        // $(this).attr("disabled",true); //setelah diklik disable
        // var formData = $('#formInputSales1').serialize();
        var formData = new FormData($("#formInputSales1")[0]); // khusus form dengan file upload
        console.log(formData);
        console.log('jalan');

        $.ajax({
            type: 'POST',
            url: "{{url('/')}}/{{$url}}",
            data : formData,
            processData: false,
            contentType: false,
            success: function(data) {
              var baseurl = '{{ url('/') }}';
              console.log(data);
              $('#modalCreate').modal('hide');
              $("#loadingpanel").hide();
              alert('data berhasil di simpan..!');
              
              $("#tabpanel1").click();
              // $.get(baseurl + "/"+url+'/tampil' , function(data) {
              //   console.log(data);
              //   // document.getElementById('isitabel').appendChild(WthIsi);
              //   $("#isitabel").html(data);
              // });

              //untuk update / edit
              // var baseurl = '{{ url('/') }}';
              // $.post(baseurl + '/order/posimpan', function(data) {
              //   console.log(data);
              //   $("#isipanel").html(data);
              //   $("#loadingpanel").hide();
              //   });

            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });  
    }
});


//jika tombol show di dalam tabel diklik tampilkan view Order.index3.blade.php ( tampilkan form input sales2)            
$(document).on('click','.btnshow', function(e){
  //  alert('halo');
  e.preventDefault();
  // var myModal = new bootstrap.Modal(document.getElementById('modalCreate'));

  $('#loadingpanel').show();
  console.log("baris");
  var baseurl = '{{url('/')}}';
    $.get(baseurl+'/order/pobarutampil', function (data) {
      $("#isi2").html(data);
      // myModal.hide();
      
      $("#loadingpanel").hide();
      $("#isi1").hide();
      $("#isi3").hide();
      $("#isi2").show();
      console.log(data);
      // $('#show').html("halo");
      $('#modalCreate').modal('hide');
    });
});

//jika tombol edit di klik
$(document).on('click','.btnEdit', function(e){
  e.preventDefault(); 
  $('#loadingpanel').show();
  $('#loadingpanel').hide();

  var kode= $(this).attr('kode');
  console.log(kode);

  var baseurl = '{{url('/')}}';
  $.get(baseurl+'/order/editDataSales1', function(data){
    $('#modalcreateisi').html(data);
    console.log('tambah');
  });
  
  // $('#show').html('Halo');
  $('#modalCreate').modal('show');
  
});

      


       


</script>

@endsection