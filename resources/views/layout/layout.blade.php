<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 CRUD School Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"> --}}
    <link rel="stylesheet" href="{{url('/')}}/MDB/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/MDB/css/mdb.min.css?123">
    <link rel="stylesheet" href="{{url('/')}}/MDB/css/bootstrap-datepicker.min.css">
    <!-- Plugin file -->
    <link rel="stylesheet" href="{{url('/')}}/MBD/css/addons/datatables.min.css">
    <link rel="stylesheet" href="{{url('/')}}/MDB/css/style.css">
</head>
<body>

    


<div class="container-fluid" id='content_index'>
    @include('parsial.navbar')
    @yield('content')
</div>

<footer class="page-footer mt-4">

    <!--Copyright-->
    <div class="footer-copyright text-center py-3">
        <div class="container-fluid">
            © 2022 Copyright:
            <a href="#"> PT. GRADIAL PERDANA PERKASA</a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>

<script type="text/javascript" src="{{url('/')}}/MDB/js/jquery.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/MDB/js/popper.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/MDB/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/MDB/js/mdb.min.js?123"></script>
<script type="text/javascript" src="{{url('/')}}/MDB/js/bootstrap-datepicker.min.js"></script>
<!-- Plugin file -->
<script src="{{url('/')}}/MDB/js/addons/datatables.min.js"></script>

<div class="container">
  @yield('JS')   
</div>



</body>
</html>