@extends('layout.template')

@section('content')
    <?php
    extract($data);
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
                        <button type="button" id='printOrderIndex' class="btn btn-primary">Print</button>
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
        $(".tabpanel").click(function() {
            $("#loadingpanel").show();
            var panelke = $(this).attr('panelke');
            $('#tabel1').dataTable().fnDestroy();

            $("#isipanel").html("");
            // console.log("ok1");
            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/order/' + panelke, function(data) {
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
            $.get(baseurl + '/order/panel1' , function(data) {
                $("#isipanel").html(data);
                $("#loadingpanel").hide();
                // console.log(data);
            });
        }

        //jika tombol btnadd  diklik tampilkan view Order.index3.blade.php ( tampilkan form input detail)            
        $(document).on('click', '#btnadd', function(e) {
            //  alert('halo');
            e.preventDefault();
            // var myModal = new bootstrap.Modal(document.getElementById('modalCreate'));
            var kode = $(this).attr('kode');
            $('#loadingpanel').show();
            $('#editTambah').hide();
            console.log("baris");
            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/order/OBAK_' + kode, function(data) {
                $("#isi2").html(data);

                $("#loadingpanel").hide();
                $("#isi1").hide();
                $("#isi3").hide();
                $("#isi2").show();
                console.log(data);

            });
        });

        //ketika tombol btnadd di klik (buka form create Sales1 ) ini menggunakan modal
        // $(document).on('click','#btnadd', function(e){
        //   //menggunakan modal
        //   e.preventDefault(); 
        //   $('#loadingpanel').show();
        //   $('#loadingpanel').hide();

        //   var baseurl = '{{ url('/') }}';
        //   $.get(baseurl+'/order/OBAK', function(data){ // OBAK (order Button add klik)
        //     $('#modalcreateisi').html(data);
        //     console.log('tambah');
        //   });

        //   // $('#show').html('Halo');
        //   $('#modalCreate').modal('show');



        //   // $(".btnTableOrderShow").click();

        // });  


        //jika tombol Simpan di form create sales1 di klik simpan data ke database(tabel sales1) menggunakan modal
        // $(document).on('click', '#btnFormOrderSave', function (e) {
        //     var isvalidate = $("#formInputSales1")[0].checkValidity();
        //     if (isvalidate) {
        //         e.preventDefault(); //PENTING
        //         // $(this).attr("disabled",true); //setelah diklik disable
        //         // var formData = $('#formInputSales1').serialize();
        //         var formData = new FormData($("#formInputSales1")[0]); // khusus form dengan file upload
        //         console.log(formData);
        //         console.log('jalan');

        //         $.ajax({
        //             type: 'POST',
        //             url: "{{ url('/') }}/{{ $url }}",
        //             data : formData,
        //             processData: false,
        //             contentType: false,
        //             success: function(data) {
        //               var baseurl = '{{ url('/') }}';
        //               console.log(data);
        //               $('#modalCreate').modal('hide');
        //               $("#loadingpanel").hide();
        //               alert('data berhasil di simpan..!');

        //               $("#tabpanel1").click();

        //             },
        //             error: function (request, status, error) {
        //                 alert(request.responseText);
        //             }
        //         });  
        //     }
        // });

        //jika tombol Simpan di detail create sales1 di klik simpan data ke database(tabel sales1, Sales2 & sales3)
        $(document).on('click', '#simpanpo', function(e) {
            var isvalidate = $("#orderCreateDetail")[0].checkValidity();
            if (isvalidate) {
                e.preventDefault(); //PENTING
                // $(this).attr("disabled",true); //setelah diklik disable
                // var formData = $('#formInputSales1').serialize();
                var formData = new FormData($("#orderCreateDetail")[0]); // khusus form dengan file upload
                console.log(formData);
                // console.log('orderCreateDetail');
                var jmhbaris = $('.baris');
                jmhbaris = jmhbaris.length++;
                console.log(jmhbaris);

                $('#jmhsepatu').val(jmhbaris);

                $.ajax({
                    type: 'POST',
                    url: "{{ url('/') }}/{{ $url }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        var baseurl = '{{ url('/') }}';
                        console.log(data);

                        alert('data berhasil di simpan..!');
                        $("#loadingpanel").hide();
                        $("#isi1").show();
                        $("#isi3").hide();
                        $("#isi2").hide();
                        $("#tabpanel1").click();
                        index();

                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
        });



        //jika tombol show di klik
        $(document).on('click', '.btnTableOrderShow', function(e) {
            // $(document).on('click','.btnTableOrderShow, #printRekapOrder', function(e){
            e.preventDefault();
            $('#loadingpanel').show();
            $('#loadingpanel').hide();

            // var printRekapOrder = $('#printRekapOrder').val();

            var kode = $(this).attr('kode');
            console.log(kode);

            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/order/OBSOK_' + kode, function(data) {
                console.log(data);
                // $("#isipanel").html(data);
                $("#isi2").html(data);
                $("#isi2").show();
                $("#isi1").hide();
                $("#isi3").hide();
            });



        });

        $(document).on('click', '.btnTableOrderEdit, #editso', function(e) {
            //  alert('halo');
            e.preventDefault();

            var kode = $(this).attr('kode');
            $('#loadingpanel').show();
            console.log("ini di JS btnTableOrderEdit jika di klik (index.php) ");
            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/order/OBEK_' + kode, function(data) {
                $("#loadingpanel").hide();
                // var jenisinput = "{{ $jenisinput }}";
                // console.log(jenisinput);
                // $("#judul").hide();
                $("#isi2").html(data);

                $("#loadingpanel").hide();
                $("#isi1").hide();
                $("#isi3").hide();
                $("#isi2").show();
                console.log(data);

            });
        });

        $(document).on('click', '.btnTableOrderDelete', function(e) {
            // e.preventDefault();
            var kodedel = $(this).attr('kode');
            console.log("tombol delete ", kodedel);

            var txt;
            if (confirm("Yakin Anda Ingin Menghapus Data !")) {
                $('#loadiangpanel').show();

                var baseurl = '{{ url('/') }}';
                $.get(baseurl + '/order/OBDEK_' + kodedel, function(data) {
                    // alert("tes");
                    // console.log("ini");

                    // $("#isi1").hide();
                    $("#isi2").hide();
                    $("#isi3").hide();
                    $("#isi1").show();
                    console.log("data berhasil di " + data);
                    $("#tabpanel1").click();
                });



                // $.get(baseurl+'/order'+kodedel, function (data) {
                //   $("#tabpanel1").click();
                // });
            } else {

            }


        });


        // //jika tombol edit di klik (ini menggunakan modal)
        // $(document).on('click','.btnTableOrderEdit', function(e){
        //   e.preventDefault(); 
        //   $('#loadingpanel').show();
        //   $('#loadingpanel').hide();

        //   var kode= $(this).attr('kode');
        //   console.log(kode);

        //   var baseurl = '{{ url('/') }}';
        //   $.get(baseurl+'/order/OBEK_'+kode, function(data){
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

        //untuk tombol editso di klik di halaman view show (DetailSales1.php)
        // $(document).on('click', '#editso', function(e) {
        //     // $(".btnTableOrderEdit").click();
        //     //  alert('halo');
        //     e.preventDefault();

        //     var kode = $(this).attr('kode');
        //     // OrderEdit();
        //     $('#loadingpanel').show();
        //     console.log("ini di JS editso di klik di halaman view show (DetailSales1.php) ");
        //     var baseurl = '{{ url('/') }}';
        //     $.get(baseurl + '/order/OBEK_' + kode, function(data) {
        //         $("#loadingpanel").hide();
        //         // var jenisinput = "{{ $jenisinput }}";
        //         // console.log(jenisinput);
        //         // $("#judul").hide();
        //         $("#isi2").html(data);

        //         $("#loadingpanel").hide();
        //         $("#isi1").hide();
        //         $("#isi3").hide();
        //         $("#isi2").show();
        //         // console.log(data);

        //     });

        // });


        function OrderEdit() {

            $('#loadingpanel').show();
            console.log("ini di JS editso di klik di halaman view show (DetailSales1.php) ");
            var baseurl = '{{ url('/') }}';
            $.get(baseurl + '/order/OBEK_' + kode, function(data) {
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


        //ini view order.tabelSales1.blade.php
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
            $.get(baseurl + '/order/tabel_' + kode_artikel + '_' + idGo, function(data) {
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
                if (jenisinput == "orderEdit") {
                    $('#status_' + idGo).val('new');
                    $('#status_' + idGo).attr(readonly);
                } else {

                }

            });

            var tes = $("#idsepatuDipilih").val();
            if (kode_artikel != null) { //agar jika select ud tidak ada isi tapi di klik tidak mengasilkan null 0_1_2_3_4_5_6_7_8_9_null
               console.log("jmhbaris = "+jmhbaris);
                if(jmhbaris==1){
                    var tesbaru = tes +  kode_artikel;
                }else{
                    var tesbaru = tes + "_" + kode_artikel;
                }
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
            $.get(baseurl + '/order/sepatu2_' + kode_brand + "_" + idsepatuDipilih, function(data) {

                $("#sepatu2").html(data);
                $("#selectsepatu1").show();
                $("#btnGo2").show();

                console.log(data);
            });

              $(".caret").addClass('disabled');
              $("#divbrand2").addClass('disabled');
              $("#brand2").addClass('disabled');
        });



        $(document).on('click', '#printOrderIndex', function(e) {
            e.preventDefault();
            // var id = $(this).attr('kode');
            msgWindow = window.open("{{ url('/') }}/order/panel1", "NameOfWindow",
                "toolbar=no,width=1050,height=650,directories=no,status=no,scrollbars=no,resize=yes,menubar=no")
        });

        $(document).on('click', '#printRekapOrder', function(e) {
            e.preventDefault();
            var kodesales1 = $('#kodesales1').val();
            msgWindow = window.open("{{ url('/') }}/order/tabelShow_" + kodesales1, "NameOfWindow",
                "toolbar=no,width=1050,height=650,directories=no,status=no,scrollbars=no,resize=yes,menubar=no")
        });

       
        
            

        
    </script>
@endsection
