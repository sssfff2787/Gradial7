@extends('layout.template')

@section('content')
    <?php
    extract($data);
    $idyangdikirim = isset($idyangdikirim) ? $idyangdikirim : "";
    ?>
    <div class="row mt-2" id="content_index" style="min-height: 600px;">

        <div id="loadingdetail" class="preloader-wrapper big active crazy"
            style="width: 100px; height: 100px; display: none;">
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

            <ul class="nav nav-tabs md-tabs mb-20 light-blue" style="margin-bottom: -20px ">

                <li class="nav-item">
                    <a class="tabpanel nav-link active ml-3" data-toggle="tab" href="#panel1" panelke="panel1" id="tabpanel1"
                        role="tab"><b>Draft</b></a>
                </li>

                <li class="nav-item">
                    <a class="tabpanel nav-link " data-toggle="tab" href="#panel2" panelke="panel2" id="tabpanel2"
                        role="tab"><b>On Going</b></a>
                </li>

                <li class="nav-item">
                    <a class="tabpanel nav-link " data-toggle="tab" href="#panel3" panelke="panel3" id="tabpanel3"
                        role="tab"><b>Complete</b></a>
                </li>

            </ul>


            <div class="tab-content card">

                <div class="tab-pane fade in show active" role="tabpanel">

                    <div id="loadingpanel" class="preloader-wrapper big active crazy"
                        style="width: 100px; height: 100px; display: none;">
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
                    <div class="mt-3 ml-3">
                        <button type="button" class="btntambah btn btn-primary" id="btnadd"> Tambah</button>
                        <button type="button" id='printpurchaseIndex' class="btn btn-primary">Print</button>
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
                        <h5 class="modal-title" id="judul">Purchase purchase Baru</h5>
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


        //saat pertama kali url=purchase jalankan tabpanel1.click
        jQuery(document).ready(function($) {
            $("#tabpanel1").click(); //menjalankan function class tabpanel    
        });

        //pertama kali id tabpanel click dijalankan yang class tabpanel, funtion ini sesuai dengan tabpanel yg di klik
        // mengembalikan view sales1.index.blade.php
        $(".tabpanel").click(function() {
            $("#loadingpanel").show();
            var panelke = $(this).attr('panelke');
            $('#tabel1').dataTable().fnDestroy();

            $("#isipanel").html("");
            // console.log("ok1");
            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/purchase/' + panelke, function(data) {
                $("#isipanel").html(data);
                $("#loadingpanel").hide();
                // console.log(data);
            });
        });

        function index() {
            // $("#loadingpanel").show();
            // var panelke = $('#panel1').attr('panelke');
            $('#tabel1').dataTable().fnDestroy();

            $("#isipanel").html("");
            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/purchase/panel1' , function(data) {
                $("#isipanel").html(data);
                $("#loadingpanel").hide();
                // console.log(data);
            });
        }

        //jika tombol btnadd  diklik tampilkan view purchase.index3.blade.php ( tampilkan form input detail)            
        $(document).on('click', '#btnadd, #btnAddDetail', function(e) {
            //  alert('halo');
            e.preventDefault();
            $("#isi2").html("");
            // var myModal = new bootstrap.Modal(document.getElementById('modalCreate'));
            // var kode = $(this).attr('kode');
            $('#loadingpanel').show();
            $('#editTambah').hide();
            console.log("baris");
            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/purchase/OBAK' , function(data) {
                $("#isi2").html(data);

                $("#loadingpanel").hide();
                // $("#isi1").html("");
                $("#isi1").hide();
                $("#isi3").hide();
                $("#isi2").show();
                $("#tabelnfooter").show();
                // console.log(data);

                // $.get(baseurl+'/purchase/tabelAddEdit_'+idyangdikirim, function (data) {

                // // $("#sepatu2").html(data);
                // // $("#selectsepatu1").show();
                // // $("#btnGo2").show();
                // $("#isi2").show();
                // $("#tabel").html(data);
                // $("#tabel").show();
                // $("#preview").show();
                // $("#tabelnfooter").show();

                // // console.log(data);
                // });

            });
        });



        //jika tombol Simpan di detail create sales1 di klik simpan data ke database(tabel sales1, Sales2 & sales3)
        $(document).on('click', '#savePO', function(e) {
            var isvalidate = $("#FormInputPo")[0].checkValidity();
            if (isvalidate) {
                e.preventDefault(); //PENTING
                // $(this).attr("disabled",true); //setelah diklik disable
                // var formData = $('#formInputSales1').serialize();
                var formData = new FormData($("#FormInputPo")[0]); // khusus form dengan file upload
                console.log(formData);
                // console.log('FormInputPo');
                // var jmhbaris = $('.baris');
                // jmhbaris = jmhbaris.length++;
                // console.log(jmhbaris);

                // $('#jmhsepatu').val(jmhbaris);

                $.ajax({
                    type: 'POST',
                    url: "{{ url('/') }}/{{ $url }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        var baseurl = '{{ url('/') }}';
                        console.log(data);

                        alert("Data Berhasil di Simpan ..!!");
                        $("#loadingpanel").hide();
                        // $("#isi1").html(data);
                        $("#isi1").show();
                        $("#isi3").hide();
                        $("#isi2").html("");
                        $("#isi2").hide("");
                        index();

                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
        });



        //jika tombol show di klik
        $(document).on('click', '.btnShowIndex', function(e) {
        
            e.preventDefault();
            $('#loadingpanel').show();
            $('#loadingpanel').hide();

            // var printRekappurchase = $('#printRekappurchase').val();

            var kode = $(this).attr('kode');
            console.log(kode);

            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/purchase/Show_' + kode, function(data) {
                console.log(data);
                // $("#isipanel").html(data);
                $("#isi2").html(data);
                $("#isi2").show();
                $("#isi1").hide();
                $("#isi3").hide();
            });



        });

        $(document).on('click', '.btnEditIndex, #editso', function(e) {
            //  alert('halo');
            e.preventDefault();

            var kode = $(this).attr('kode');
            $('#loadingpanel').show();
            console.log("ini di JS btnEditIndex jika di klik (index.php) ");
            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/purchase/Edit_' + kode, function(data) {
                $("#loadingpanel").hide();
                $("#isi2").html(data);

                $("#loadingpanel").hide();
                $("#isi1").hide();
                $("#isi3").hide();
                $("#isi2").show();
                // console.log(data);

            });
        });

        $(document).on('click', '.btnDeleteIndex', function(e) {
            // e.preventDefault();
            var kodedel = $(this).attr('kode');
            console.log("tombol delete ", kodedel);

            var txt;
            if (confirm("Yakin Anda Ingin Menghapus Data !")) {
                $('#loadiangpanel').show();

                var baseurl = '{{ url('/') }}';
                $.get(baseurl + '/purchase/delete_' + kodedel, function(data) {
                    // alert("tes");
                    console.log(data);

                    // $("#isi1").hide();
                    $("#isi2").hide();
                    $("#isi3").hide();
                    $("#isi1").show();
                    console.log("data berhasil di " + data);
                    $("#tabpanel1").click();
                });



                // $.get(baseurl+'/purchase'+kodedel, function (data) {
                //   $("#tabpanel1").click();
                // });
            } else {

            }


        });


        // //jika tombol edit di klik (ini menggunakan modal)
        // $(document).on('click','.btnTablepurchaseEdit', function(e){
        //   e.preventDefault(); 
        //   $('#loadingpanel').show();
        //   $('#loadingpanel').hide();

        //   var kode= $(this).attr('kode');
        //   console.log(kode);

        //   var baseurl = '{{ url('/') }}';
        //   $.get(baseurl+'/purchase/OBEK_'+kode, function(data){
        //     $('#modalcreateisi').html(data);
        //     console.log('tambah');
        //   });

        //   // $('#show').html('Halo');
        //   $('#modalCreate').modal('show');

        // });

        //untuk tombol back/kembali/batal    
        $(document).on('click', '.tbkembali', function(e) {
            e.preventDefault();
            $('#loadingpanel').show();
            $('#loadingpanel').hide();


            $("#isi1").show();
            $("#isi2").hide();
            $("#isi3").hide();

        });

        


        function purchaseEdit() {

            $('#loadingpanel').show();
            console.log("ini di JS editso di klik di halaman view show (DetailSales1.php) ");
            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/purchase/OBEK_' + kode, function(data) {
                $("#loadingpanel").hide();
                // var jenisinput = "{{ $jenisinput }}";
                // console.log(jenisinput);
                // $("#judul").hide();
                $("#isi2").html(data);

                $("#loadingpanel").hide();
                $("#isi1").hide();
                $("#isi3").hide();
                $("#isi2").show();
                // console.log(data);

            });

        }


        //ini view purchase.tabelSales1.blade.php
        $(document).on('click', '#btnGo', function(e) {
            e.preventDefault();
            // console.log('jalan event 1');
            // console.log(idgoo);
            // $('h4').html("dfdfds");
            var kode_artikel = $("#selectsepatu2").val();
            console.log("kode artikel(id1)" + kode_artikel);

            // ($(this).attr("kodeGo",1));
            var idGo = $(this).attr("kodeGo");
            idGo++;

            console.log("ini idGo " + idGo);


            var jmhbaris = $('.baris');
            jmhbaris = parseInt(jmhbaris.length);

            jmhbaris++;
            $('#jmhsepatu').val(jmhbaris);
            console.log("ini jmhbaris " + jmhbaris);



            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/purchase/tabel_' + kode_artikel + '_' + idGo, function(data) {


                // jmhsepatu++;
                // $('#jmhsepatu').val(jmhsepatu);
                // console.log(data);
                $("#tabelnfooter").show();
                $("#isitabel").append(data);
                $("#tabel").show();
                $("#peringatan").show();
                $("#footer").show();
                // $("#selectsepatu1").hide();
                // $("#btnGo2").hide();
                // $("#sepatu2").html("halo");

                var jenisinput = $("#jenisinput").val();
                console.log("jenis input" + jenisinput);
                if (jenisinput == "purchaseEdit") {
                    $('#status_' + idGo).val('new');
                    $('#status_' + idGo).attr(readonly);
                } else {

                }

            });

            var tes = $("#idsepatuDipilih").val();
            if (kode_artikel !=
                null
            ) { //agar jika select ud tidak ada isi tapi di klik tidak mengasilkan null 0_1_2_3_4_5_6_7_8_9_null
                var tesbaru = tes + "_" + kode_artikel;
                console.log(kode_artikel);
                $("#idsepatuDipilih").val(tesbaru);
            }



            $(this).attr("kodeGo", idGo)
            // console.log(idGo);

            // $("#selectsepatu1").show();
            var jmhsepatu = parseInt($('#jmhsepatu').val());
            if (jmhsepatu > 0 && jmhsepatu != NaN) { //penghapusan select jika ada artikel yg di pilih (jmhsepatu>0)
                const idsepatu = [];
                var idsepatuDipilih = $("#idsepatuDipilih").val();
                // for (let index = 1; index <= jmhsepatu; index++) {
                //   $text = "idsepatu_"+index;
                //   idsepatu[index]= parseInt($('#'+$text).val());
                //   if (index ==jmhsepatu) {
                //     idsepatuDipilih += idsepatu[index];

                //   }else{

                //     idsepatuDipilih += idsepatu[index]+"_";
                //   }
                // }
                console.log("idsepatuDipilih = " + idsepatuDipilih);
            }

            var kode_brand = $("#brand2").val();
            // console.log(kode_brand);
            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/purchase/sepatu2_' + kode_brand + "_" + idsepatuDipilih, function(data) {

                $("#sepatu2").html(data);
                $("#selectsepatu1").show();
                $("#btnGo2").show();

                console.log(data);
            });
        });

        //saat select brand di pilih 
        $(document).on('change','#selectBrand', function(e){
          var kode_brand =$("#selectBrand").val();
          var jenisinput = $('#jenisinput').val();
            console.log("jenisinput = "+ jenisinput);
            if (jenisinput=="Edit") {
                var idyangdikirim = $('#idyangdikirim').val();
                
            }
            console.log("idyangdikirim = "+idyangdikirim);
          console.log( kode_brand);
          $("#tabel").html("");
          var baseurl = '{{url('/')}}';
            $.get(baseurl+'/purchase/tabelAddEdit_'+kode_brand+"_"+idyangdikirim, function (data) {

            // $("#sepatu2").html(data);
            // $("#selectsepatu1").show();
            // $("#btnGo2").show();
            $("#isi2").show();
            $("#tabel").html(data);
            $("#tabel").show();
            $("#preview").show();
            $("#tabelnfooter").show();

            console.log(data);
            });
             
        });
        
       
        //saat checkbox di ceklist tombol save muncul
        $(document).on('change','.checkbox', function(e){


        //   $text=checkbox; //untuk menampung nilai checkbox yg di centang
        //   if (ygdiselect=="") {
        //     $text=checkbox;
        //   }else{
        //     $text=ygdiselect+"_"+checkbox;
        //   }
        //   $('#ygdiselect').val(ygdiselect);
        //   console.log(text);

          $('#btnPreview').removeAttr('disabled'); 
        });


        //jika tombol preview di klik
        $(document).on('click','#btnPreview', function(e){
            // var ygdiselect = $('#ygdiselect').val();

            // console.log("checkbox di pilih");
            // var checkbox = $(this).val();

            var qtybaris = $('.checkbox').length;
            //   console.log("banyak checkbox = "+qtybaris);

            var  text = ""
            for (let i = 1; i <= qtybaris; i++) {
                var ygdiselect2 = $('#ygdiselect').val();
                var check = $("#checkbox_"+i).val();
                if($("#checkbox_"+i).is(':checked') && ygdiselect2==""  ) {
                    text=check;
                     $('#ygdiselect').val(text);
                    var s = $('#ygdiselect').val();
                    // console.log("ini "+text+" yg di select2 "+s);
                }else if($("#checkbox_"+i).is(':checked')){
                    text=text+'_'+check;
                    // console.log("ini else "+text);
                }
                
            }

            //ini jika di menu edit lalu menambah SO di PO yg di edit
            // var jenisinput = $('#jenisinput').val();
            // console.log("jenisinput = "+ jenisinput);
            // if (jenisinput=="Edit") {
            //     var idyangdikirim = $('#idyangdikirim').val();
            //     text = text +"_"+ idyangdikirim;
            // }
            // console.log("text = "+text);

            $('#ygdiselect').val(text);
            $('#ygdiselect').val("");

            var baseurl = '{{url('/')}}';
            var kode_brand =$("#selectBrand").val();
            console.log(baseurl);
            $.get(baseurl+'/purchase/tabelPreview_'+kode_brand+"_"+text, function (data) {
                console.log(data);
                $("#tabel2").html(data);
                $("#tabel2").show();
                $("#footer").show();
                $("#savePO").removeAttr('disabled');
                // $('#ygdiselect').val("");
            });

        });    

        $(document).on('click', '#printpurchaseIndex', function(e) {
            e.preventDefault();
            // var id = $(this).attr('kode');
            msgWindow = window.open("{{ url('/') }}/purchase/panel1", "NameOfWindow",
                "toolbar=no,width=1050,height=650,directories=no,status=no,scrollbars=no,resize=yes,menubar=no")
        });

        $(document).on('click', '#printRekappurchase', function(e) {
            e.preventDefault();
            var kodepurchase = $('#kodepurchase').val();
            // var kodesales1 = $('#kodesales1').val();
            msgWindow = window.open("{{ url('/') }}/purchase/tabelPreview_"+kodepurchase, "NameOfWindow",
                "toolbar=no,width=1050,height=650,directories=no,status=no,scrollbars=no,resize=yes,menubar=no")
        });

       
        
            

        
    </script>
@endsection
