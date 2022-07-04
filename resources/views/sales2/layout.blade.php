<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 CRUD School Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"> --}}
    <link rel="stylesheet" href="{{url('/')}}/MDB/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/MDB/css/mdb.min.css">
    <!-- Plugin file -->
    <link rel="stylesheet" href="{{url('/')}}/MBD/css/addons/datatables.min.css">
    <link rel="stylesheet" href="{{url('/')}}/MDB/css/style.css">
</head>
<body>
  {{-- {{ __FILE__ ."" }} <br>
  url sekarang : {{url()->current();}} <br>
 <?php 
    $url = url()->current();

    echo "url curent : ".$url."<br>";

    $url = explode("/",$url); //di jadikan array
    $i=0;
    foreach ($url as $key) {
      
      echo "url [".$i."] = ".$key."<br>";
      $i++;
    }

    echo "array terakhir = ".$url[count($url)-1];
 ?> --}}
 <!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Navbar</a>
  
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
      aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">
  
      <!-- Links -->
      <ul class="navbar-nav mr-auto">
      
        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Data</a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{url('/')}}/siswa">Data Siswa</a>
            <a class="dropdown-item" href="{{url('/')}}/buku">Data Buku</a>
            <a class="dropdown-item" href="{{url('/')}}/bukusiswa">Data buku Siswa</a>
          </div>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
  
  
      </ul>
      <!-- Links -->
  
      <form class="form-inline">
        <div class="md-form my-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        </div>
      </form>
    </div>
    <!-- Collapsible content -->
  
  </nav>
  <!--/.Navbar-->
    


<div class="container">
    @yield('content')
</div>



<script type="text/javascript" src="{{url('/')}}/MDB/js/jquery.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/MDB/js/popper.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/MDB/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/MDB/js/mdb.min.js"></script>
<!-- Plugin file -->
<script src="{{url('/')}}/MDB/js/addons/datatables.min.js"></script>

<div class="container">
  @yield('tambahanJs')   
</div>



</body>
</html>