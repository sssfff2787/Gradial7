@extends('Master.main')

@section('container')
    <?php
    extract($data);
    ?>


<style type="text/css">
        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: collapse !important;
            border-spacing: 0;
        }
        select {
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            /* display: block !important; */
        }

    /*pengaturan lebar kolom*/
        .t_order1_col0{width:3cm; height: 0.1cm; !important;}
        .t_order1_col1{width:30px height: 0.1cm; !important;}
        .t_order1_col2{width:90px height: 0.1cm; !important;}
        .t_order1_col2x{width:3cm height: 0.1cm; !important;}
        .t_order1_col3{width:60px height: 0.1cm; !important;}
        .t_order1_col4{width:80px height: 0.1cm; !important;}
        .t_order1_col3x{min-width:200px height: 0.1cm; !important;}
        /*.tablePattern1_lembar3{width: 90px !important;}*/
</style>
<button class="btnTambah btn btn-primary mt-2 mb-2" id="btnTambah"> Tambah </button>
<div id="div1">
    
</div>

<div id="div2"> </div>
<div id="div3"> </div>

@endsection

@section('JS')
    <script>
        // console.log('ok1');
        const menu = document.getElementById('menu-label');
        const sidebar = document.getElementsByClassName('sidebar')[0];
        const main = document.getElementById('main');


        menu.addEventListener('click', function() {
            // console.log('ok');
            sidebar.classList.toggle('hide');
            // main.classList.remove('col-10');
            main.classList.toggle('hide');
        });

        $(document).ready(function () {
            tabelIndex();
        });

      

        $(document).on('change', '.tabledit-input' , function(){
            $(this).addClass('mt-2');
        });

        $(document).on('click', '#btnTambah' , function(e){
            e.preventDefault();
            e.preventDefault(); 
            console.log("fsdfdsf");
            var baseurl = '{{ url('/')}}';
            $.get(baseurl+'/{{$url}}/brandAdd', function(data){
                console.log('data ='+data);
                $('#div1').hide();
                $('#div2').html(data);
                $('#div3').hide();
                
                $('#div2').show();
            });
            

            $(this).addClass('mt-2');
        });



        $(document).on('click', '#btnSave', function(e) {
            var isvalidate = $("#formAddBrand")[0].checkValidity();

            if (isvalidate) {
                e.preventDefault();
                var formData = new FormData($("#formAddBrand")[0]); // khusus form dengan file upload
                // console.log(formData);
                // alert("klklkl");
                // console.log('jkjkjk');

                $.ajax({
                    type: 'POST',
                    url: "{{ url('/') }}/{{$url}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        var baseurl = '{{ url('/') }}';
                        console.log(data);
                        tabelIndex();
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
        });


        function tabelIndex() {
            var baseurl = '{{ url('/')}}';
            $.get(baseurl+'/{{$url}}/tabelIndex', function(data){
                $('#div1').html(data);
                $('#div2').hide();
                $('#div3').hide();
                $('#div1').show()
            });   
            
        }

        $(document).on('click', '.btnhapus', function(e) {
            // e.preventDefault();
            var kodedel = $(this).attr('kode');
            console.log("tombol delete ", kodedel);

            var txt;
            if (confirm("Yakin Anda Ingin Menghapus Data !")) {
              

                var baseurl = '{{ url('/') }}';
                $.get(baseurl + '/{{$url}}/branddelete_' + kodedel, function(data) {
                    tabelIndex();
                    // $('#div1').html(data);
                    // $('#div2').hide();
                    // $('#div3').hide();
                    // $('#div1').show()
                });



                // $.get(baseurl+'/order'+kodedel, function (data) {
                //   $("#tabpanel1").click();
                // });
            } else {

            }


        });

    </script>
@endsection
