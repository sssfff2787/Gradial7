<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="{{url('/')}}/my-img/gpp2.ico" type="image/x-icon" />
    <title>@yield('title','GPP-ERP')</title>
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

{{--     <link href="{{url('/')}}/css/font/font1.css?12" rel="stylesheet">
    <link href="{{url('/')}}/css/font/font2.css?45" rel="stylesheet"> --}}

    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"> --}}
    <link href="{{url('/')}}/mdb-master/css/fonts.googleapisNunito.css?1334" rel="stylesheet">
    <link href="{{url('/')}}/mdb-master/fontawesome/css/all.css?33" rel="stylesheet">
    
    
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    <!-- Bootstrap core CSS -->
    <link href="{{url('/')}}/mdb-master/css/bootstrap.min.css?113" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{url('/')}}/mdb-master/css/mdb.min.css?12334" rel="stylesheet">
    {{-- <link href="{{url('/')}}/mdb-master/css/addons/datatables.min.css" rel="stylesheet"> --}}
    <link href="{{url('/')}}/mdb-master/custom-addons/datatables/datatables.min.css" rel="stylesheet">
    <link href="{{url('/')}}/mdb-master/custom-addons/select2/select2.min.css?123" rel="stylesheet">
    <link href="{{url('/')}}/mdb-master/custom-addons/fileinput/css/fileinput.min.css?24" rel="stylesheet">
    <link href="{{url('/')}}/mdb-master/custom-addons/fileinput/css/fileinput-rtl.min.css?93" rel="stylesheet">
    <link href="{{url('/')}}/mdb-master/custom-addons/cropper/docs/css/cropper.css?93" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{url('/')}}/mdb-master/css/style.css?243" rel="stylesheet">
    <link href="{{ asset('css/customku.css?1232') }}" rel="stylesheet">
    <link href="{{ asset('css/select2mdb.css?12') }}" rel="stylesheet">
    <link href="{{url('/')}}/daterange/daterangepicker.css" rel="stylesheet">
    <link href="{{url('/')}}/css/uiprev.css?13" rel="stylesheet">
    
    <link href="{{url('/')}}/lightbox/css/viewer.css" rel="stylesheet">
    <link href="{{url('/')}}/lightbox/css/main.css?23" rel="stylesheet">


</head>
{{-- 
white-skin
black-skin
cyan-skin
mdb-skin
deep-purple-skin
navy-blue-skin
pink-skin
indigo-skin
light-blue-skin
grey-skin
 --}}
<body class="fixed-sn mdb-skin">

    {{-- Pre-loader --}}
    <div id="mdb-preloader" class="flex-center" style="display: none;">
        <div >
            <div class="preloader-wrapper big active crazy" style="width: 100px; height: 100px;">
              <div class="spinner-layer spinner-blue-only">
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
        </div>
    </div>

    <!-- Modal -->
    <div class= "modal fade right" data-backdrop="static" id="modalchange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" keyboard="false">
    <div class="modal-dialog modal-sm modal-top" role="document">
        <form name="changeform" id="changeform">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <div class="modal-content">
            @if (Auth::user())
             
              <input type="hidden" name="idsavegantipass" id="idsavegantipass" value="{{ Auth::user()->id }}">
            @endif
       
              <div class="modal-header text-center pb-4">
                  <h3 class="modal-title w-100 orange-text font-weight-bold" id="myModalLabel"><strong>Ganti</strong> <a
              class="red-text font-weight-bold"><strong> Password</strong></a></h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                 
              </div>
              <div class="modal-body">
                  
                      <div class="row">
                        
                        <div class="col-sm-10">
                            <div class="md-form mb-1">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" name="change1" id="change1" class="form-control" value="secret" autocomplete="current-password">
                                <label for="change1">Password Saat Ini</label>
                            </div>
                        </div>
                        <div class="col-sm-2 mt-4">
                                <span toggle="#change1" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                        </div>
                      </div>
                      <div class="row"> 
                        <div class="col-sm-10">
                              <div class="md-form mb-1">
                                  <i class="fa fa-lock prefix"></i>
                                  <input type="password" name="change2" id="change2" class="form-control" value="secret" autocomplete="new-password">
                                  <label for="change2">Password Baru</label>
                              </div>
                               
                        </div>
                        <div class="col-sm-2 mt-4">
                            <span toggle="#change2" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-10">
                            <div class="md-form mb-1">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" name="change3" id="change3" class="form-control" value="secret" autocomplete="new-password">
                                <label for="change3">Konfirmasi Password</label>
                            </div>
                        </div>
                        <div class="col-sm-2 mt-4">    
                                <span toggle="#change3" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                        </div>
                            
                      </div>

              </div>
                     
              
              <div class="modal-footer  float-left">
                 <button type="submit" id="simpanchange" class="btn btn-outline-success btn-rounded btn-block z-depth-0 my-4 waves-effect "> <i class="fa fa-check" aria-hidden="true"></i> Simpan</button>
              </div>
          </div>
        </form>
    </div>
</div>

    {{-- LOGIN --}}
    <div class="modal fade" id="darkModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered form-dark" role="document">
            <!--Content-->
            <div class="modal-content card card-image" style="background-image: url('{{ asset('my-img/login.jpg?2') }}');">
                <div class="rgba-stylish-strong py-5 px-5 z-depth-4" style="background-color: rgba(255, 255, 255, 0.76);">
                    <!--Header-->
                    <div class="modal-header text-center pb-4">
                        <h3 class="modal-title w-100 font-weight-bold" id="myModalLabel"><strong>LOG</strong> <a class="blue-text font-weight-bold"><strong>IN</strong></a></h3>
                        
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            <div class="md-form mb-3">
                                <input id="username" type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required >
                                <label {{-- data-error="wrong" data-success="right" --}} for="username">Your username</label>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="md-form pb-1">
                                <input id="password" type="password" class="form-control  {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                
                                <label data-error="wrong" data-success="right" for="password">Your password</label>
                                {{-- <div class="form-group mt-4">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label " for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div> --}}
                            </div>

                            <div class="md-form pb-3 pull-right">
                                <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                </button>   
                            </div>


                        </form>

                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Modal -->
    
    <!--Main Navigation-->
    @include('layout.navigation')
    <!--Main Navigation-->

    <!--Main layout-->
    <main>

        <div class="container-fluid">

            @yield('content')

        </div>
        
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer mt-4">

        <!--Copyright-->
        <div class="footer-copyright text-center py-3">
            <div class="container-fluid">
                © 2019 Copyright:
                <a href="#"> PT. GRADIAL PERDANA PERKASA</a>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->
    {{-- fungsi php --}}
    

    <div id="mdb-lightbox-ui"></div>
    
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{url('/')}}/mdb-master/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/mdb-master/js/jquery.color.js"></script>
    <script type="text/javascript" src="{{url('/')}}/mdb-master/js/jquery.serializejson.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{url('/')}}/mdb-master/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{url('/')}}/mdb-master/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{url('/')}}/mdb-master/js/mdb.min.js?123"></script>
    {{-- <script type="text/javascript" src="{{url('/')}}/mdb-master/js/addons/datatables.min.js"></script> --}}
    <script type="text/javascript" src="{{url('/')}}/mdb-master/custom-addons/datatables/datatables.min.js?123"></script>
    <script type="text/javascript" src="{{url('/')}}/mdb-master/custom-addons/select2/select2.min.js?123"></script>
    <script type="text/javascript" src="{{url('/')}}/mdb-master/custom-addons/fileinput/js/fileinput.min.js?13"></script>
    <script type="text/javascript" src="{{url('/')}}/mdb-master/custom-addons/fileinput/js/fileinputedited.js?123"></script>
    <script type="text/javascript" src="{{url('/')}}/mdb-master/custom-addons/cropper/docs/js/cropper.js"></script>
    <script type="text/javascript" src="{{url('/')}}/mdb-master/custom-addons/autonumeric/autoNumeric-min.js?"></script>
    {{-- <script type="text/javascript" src="{{url('/')}}/daterange/daterangepicker.js"></script> --}}
    <script type="text/javascript" src="{{url('/')}}/daterange/moment.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/daterange/daterangepicker.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/daterange/jquery.tabletojson.min.js"></script>
    {{-- HOtkey atau Shortcut --}}
    <script type="text/javascript" src="{{url('/')}}/mdb-master/custom-addons/jquery.hotkeys-master/jquery.hotkeys.js?"></script>
    {{-- <script type="text/javascript" src="{{url('/')}}/lightbox/js/jquery-3.3.1.min.js"></script> --}}
{{--     <script type="text/javascript" src="{{url('/')}}/mdb-master/js/viewer.js"></script>
    <script type="text/javascript" src="{{url('/')}}/mdb-master/js/main.js"></script> --}}
{{--     <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/table-to-json@0.13.0/lib/jquery.tabletojson.min.js" integrity="sha256-AqDz23QC5g2yyhRaZcEGhMMZwQnp8fC6sCZpf+e7pnw=" crossorigin="anonymous"></script> --}}
    <!-- Initializations -->

    <script>
      $('#eta').pickadate({
  
  format: "d mmm yyyy",
  min: -60,
  max: +60,
  footer: false,
  //agar tidak terkurung didalam modal
  container: 'body',
})
    
      // SideNav Initialization
      $(".button-collapse").sideNav();

      var container = document.querySelector('.custom-scrollbar');
      Ps.initialize(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
      });

      // Material Select Initialization
      $(document).ready(function () {
        $('.mdb-select').material_select();        
      });

      $('.select2').select2();
      $('.select2').on('select2:close', function () {
        $('.select2-selection__clear').addClass('float-right');
      });
      $(document).on('focus', '.select2', function (e) {
        if (e.originalEvent) {
          $(this).siblings('select').select2('open');    
        } 
      });
      

      // Data Picker Initialization
      //ditaruk di index masing2
      //$('.datepicker').pickadate();

      // Tooltip Initialization
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
      
      // Popover Initialization
      $(function() {
          $('[data-toggle="popover"]').popover()
      })


      // MDB Lightbox Init (PREVIEW / ZOOM GAMBAR)
      $(function() {
          $("#mdb-lightbox-ui").load("{{url('/')}}/mdb-master/mdb-addons/mdb-lightbox-ui.html");
      });
      new WOW().init();
      /*------ END PRIVIEW */

      /*agar select2 pada model bisa dipilih dengan keyboard*/
      $.fn.modal.Constructor.prototype.enforceFocus = function () {};

        /*Exit Pre-Loader*/
        $(document).ready(function () {
          //$(window).on("load", function(){
          $(window).bind('load', function(){
            $('#mdb-preloader').fadeOut('slow', function() {
              $(this).remove();
            });
            //$('#darkModalForm').delay(1000).show(0);
          });
        });

        /*Exit Pre-Loader*/
        $(document).ready(function () {
          $(window).on("load", function(){
            $('#mdb-preloader').fadeOut('slow', function() {
              $(this).remove();
            });
            //$('#darkModalForm').delay(1000).show(0);
          });
        });


        function pad (str, max) {
          str = str.toString();
          return str.length < max ? pad("0" + str, max) : str;
        }

    </script>

    
    @if ($errors->has('username'))       
        <script type="text/javascript">
            $('#darkModalForm').modal('show');

            $('#darkModalForm').on('shown.bs.modal', function () {
                $('#username').focus();
            })  
        </script>
    @endif
    
    @yield('JS')

<script type="text/javascript">
  $(document).ready(function() {

    @if (!Auth::user())
      $('#darkModalForm').modal('show');
      $('#darkModalForm').on('shown.bs.modal', function () {
          $('#username').focus();
      }) 
    @endif


    $(".changepass").click(function(){
      $('#change1').val('').trigger('change');
      $('#change2').val('').trigger('change');
      $('#change3').val('').trigger('change');
      $('#modalchange').modal('show');
      console.log("berhasil");
    });


    $('#simpanchange').on('click', function(event) {
      event.preventDefault();
        var password = $("#change2").val();
            var confirmPassword = $("#change3").val();
            if (password != confirmPassword) {
                //alert("Passwords Tidak Cocok, Silahkan Diulangi Dari Awal !!!");
                toastr["error"]("Passwords Tidak Cocok, Silahkan Diulangi Dari Awal !!!");
                $('#change1').val('');
                $('#change2').val('');
                $('#change3').val('');
                $('#change1').focus();
                return false;
            }else{
              var id = $('#idsavegantipass').val();
              //tambah
              if ($(this).val() == $('#change1').val()) {
                $('#message').html('Not Match').css('color', 'red');
              } else 
                  var formData = $('#changeform').serialize();
                  console.log(formData);
                  $.ajax({
                  type: 'POST',
                    url: '{{url('/')}}/user',
                    data: formData,
                    success: function(data) {
                      if (data=="gagal") {
                        toastr["warning"]("Passwords Lama Tidak Cocok, Silahkan Diulangi Dari Awal !!!");
                        $('#change1').val('');
                        $('#change2').val('');
                        $('#change3').val('');
                        $('#change1').focus();
                      }else{
                        toastr["success"]("Silahkan Login Kembali");
                        $('#modalchange').modal('hide');
                        $('#change1').val('');
                        $('#change2').val('');
                        $('#change3').val('');
                        window.location.href='{{ url('/') }}';
                      }
                      console.log(data);
                    },//sucsess
                    error: function (request, status, error) {
                        alert(request.responseText);
                    }
                });//ajax
            }
    });
  });
</script>


<script type="text/javascript">
    // disable mousewheel on a input number field when in focus
    // (to prevent Cromium browsers change the value when scrolling)
    $(document).on('focus', 'input[type=number]', function (e) {
    //$('form').on('focus', 'input[type=number]', function (e) {
      $(this).on('mousewheel.disableScroll', function (e) {
        e.preventDefault()
      })
    })
    $(document).on('blur', 'input[type=number]', function (e) {
    //$('form').on('blur', 'input[type=number]', function (e) {
      $(this).off('mousewheel.disableScroll')
    })
</script> 
<script type="text/javascript">
  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

</script>
{{-- <script type="text/javascript">
   $(function () {
            $("#simpanchange").click(function () {
                var password = $("#change2").val();
                var confirmPassword = $("#change3").val();
                if (password != confirmPassword) {
                    alert("Passwords Tidak Cocok, Silahkan Diulangi Dari Awal !!!");
                    
                    toastr["info"]("I was launched via jQuery!");
                    return false;
                }
                return true;
            });
        });
</script> --}}
</body>
</html>