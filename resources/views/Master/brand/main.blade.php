<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Saiful Fitri (WA : 081703006565)">

    <title>PT. Gradial Perdana Perkasa | Dashboard</title>
    <link rel="stylesheet" href="{{ url('/') }}/MDB/css/bootstrap.min.css?1">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css"> --}}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
    {{-- <link rel="stylesheet" href="{{ url('/') }}/MDB/css/mdb.min.css"> --}}
    <link rel="stylesheet" href="{{ url('/') }}/MDB/css/style.css">
    {{-- <link rel="stylesheet" href="{{url('/')}}/MDB/css/mdb.css"> --}}
    <link rel="stylesheet" href="{{url('/')}}/MDB/css/style.css">
    <link rel="stylesheet" href="{{ url('/') }}/MDB/css/customku.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,500&display=swap"
        rel="stylesheet">
    


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>



<div class="container-fluid">
    <div class="row d-flex">
            <div class="">
                @include('Master.sidebar')
            </div>

            <div class="container-fluid hide" id="main">
                @yield('container')
                <div class="card-footer">
                  <?php date_default_timezone_set('Asia/Jakarta'); ?>
                  <small class="text-muted">data ini di akses :  {{date('d-m-Y H:i:s')}}</small>
                </div>
            </div>

    </div>
</div>


    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script> --}}
      {{-- <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script> --}}
      <script type="text/javascript" src="{{ url('/') }}/js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="{{ url('/') }}/MDB/js/popper.min.js"></script>
      <script type="text/javascript" src="{{url('/')}}/MDB/js/bootstrap.min.js"></script>
      {{-- <script type="text/javascript" src="{{url('/')}}/MDB/js/mdb.min.js"></script> --}}
      
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
      
      {{-- <script src="js/dashboard.js"></script> --}}
      <script src="{{ url('/') }}/MDB/js/addons/datatables.min.js?1"></script>
      {{-- <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> --}}
      
      <script type="text/javascript" src="{{url('/')}}/js/tabledit/jquery.tabledit.js"></script>
      <script type="text/javascript" src="{{url('/')}}/js/tabledit/jquery.tabledit.min.js"></script>
        {{-- <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> --}}

  </body>
  @yield('JS')
</html>
