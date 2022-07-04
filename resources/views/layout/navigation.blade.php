<header>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark double-nav fixed-top scrolling-navbar ">

        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <!-- Breadcrumb-->
        <div class="breadcrumb-dn mr-auto">
            <p><a href="{{ url('/') }}"><b>e r p . g r a d i a l s h o e s . c o m</b></a> &nbsp;&nbsp;
            @if (isset($konfigurasi))
                @if($konfigurasi->status==1)
                <i class="fa fa-shield" aria-hidden="true" style="position: relative;top:2px;"></i>
                @endif
            @endif
            </p>
        </div>

        <!-- Links -->
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
            <!-- Dropdown -->
           
            
            @guest
                
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="" data-toggle="modal" data-target="#darkModalForm"><i class="fa fa-sign-in"></i><span class="clearfix d-none d-sm-inline-block">&nbsp; {{ __('Login') }}</span></a>
                </li>
                
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        @if (Auth::user()->username=="aziz")
                            <i class="fa fa-user text-danger"></i> <span class="clearfix d-none d-sm-inline-block text-secondary">aziz</span>                          
                            @else 

                        <i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block"> {{ Auth::user()->username }} - {{ Auth::user()->bagian }}</span> 
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item changepass"><span class="fa fa-key"></span>&nbsp; <b>Ganti Password</b></a>

                        <a class="dropdown-item " onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>&nbsp; <b>Logout</b></a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>

    </nav>
    <!--/.Navbar-->


    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav fixed sn-bg-0">
        <ul class="custom-scrollbar list-unstyled">
          <!-- Logo -->
          {{-- <li>
            <div class="logo-wrapper waves-light ">
              <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
            </div>
          </li> --}}
          <!--/. Logo -->
          
          <!-- Logo -->
          <li class="logo-sn waves-effect">
              <div class=" text-center">
                  <a href="#" class="pl-0">
                      <img src="{{url("/")}}/my-img/gpp-erp.png" class="">
                  </a>
              </div>
          </li>
          <!--/. Logo -->
          <!--Search Form-->
          {{-- <li>
            <form class="search-form" role="search">
              <div class="md-form my-0 waves-light">
                <input type="text" class="form-control py-2" placeholder="Search">
              </div>
            </form>
          </li> --}}
          <!--/.Search Form-->
          <!-- Side navigation links -->
          <li style="    border-top: 1px solid rgba(255, 255, 255, 0.3);"></li>
          <li>
            @guest
                <ul class="collapsible collapsible-accordion">
                    <li class="text-center">You are not log in</li>
                </ul>
            @else
            <ul class="collapsible collapsible-accordion">
                @if (Auth::user()->bagian=="Beacukai")

                <li>
                    <a href="{{url('/')}}/lkite" class="waves-effect">
                        <i class="fa fa-copy"></i> Laporan KITE
                    </a>
                </li>
                @endif
                @if (Auth::user()->bagian=="Programmer")

                <li>
                    <a href="{{url('/')}}/lkite" class="waves-effect">
                        <i class="fa fa-copy"></i> Laporan KITE
                    </a>
                </li>
                @endif
                @if (Auth::user()->bagian=="Programmerxxx")
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-user"></i> Admininstrator1<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{url("/")}}/user" class="waves-effect"><i class="fa fa-vcard" aria-hidden="true"></i>User dan Hak Akses</a>
                                </li>
                                <li><a href="{{url("/")}}/mbarang/prod" class="waves-effect"><i class="fa fa-vcard" aria-hidden="true"></i>Master Barang Produksi</a>
                                </li>
                                <li><a href="{{url("/")}}/mbarang/umum" class="waves-effect"><i class="fa fa-vcard" aria-hidden="true"></i>Master Barang Umum</a>
                                </li>
                                <li><a href="{{url("/")}}/coa" class="waves-effect"><i class="fa fa-vcard" aria-hidden="true"></i>Master COA</a>
                                </li>
                                <li><a href="{{url("/")}}/supplier" class="waves-effect"><i class="fa fa-vcard" aria-hidden="true"></i>Master Supplier</a>
                                </li>
                                <li><a href="{{url("/")}}/purchasereq" class="waves-effect"><i class="fa fa-vcard" aria-hidden="true"></i>Purchase Request</a>
                                </li>
                                <li><a href="{{url("/")}}/purchaseord" class="waves-effect"><i class="fa fa-vcard" aria-hidden="true"></i>Purchase Order</a>
                                </li>
                                <li><a href="{{url("/")}}/halaman1" class="waves-effect"><i class="fa fa-vcard" aria-hidden="true"></i>Halaman</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>

                @endif
                <?php
                    $id = Auth::user()->id;
                    $halaman2 = App\vhalaman2::where('kode_user','=',$id)->get();
                ?>
                @if ($halaman2->where('kelompok','=','administrator')->where('tampil','=','1')->count()>0)
                    {{-- expr --}}
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-user"></i> Admininstrator<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                @foreach ($halaman2 as $data)
                                @if ($data->tampil == "1" && $data->kelompok == "administrator") 
                                    
                                <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                </li>
                                @endif
                                
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
                @if ($halaman2->where('kelompok','=','master')->where('tampil','=','1')->count()>0)
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-briefcase"></i> Master<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "master") 
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                @endforeach
                               
                            </ul>
                        </div>
                    </li>
                @endif

                @if ($halaman2->where('kelompok','=','marketing')->where('tampil','=','1')->count()>0)
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-globe"></i> Marketing<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                                
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "marketing") 
                                        
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                @endforeach
                        </ul>
                    </div>
                </li>
                @endif          

                @if ($halaman2->where('kelompok','=','finance')->where('tampil','=','1')->count()>0)
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-globe"></i> Finance<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                                
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "finance") 
                                        
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                @endforeach
                        </ul>
                    </div>
                </li>
                @endif        

                @if ($halaman2->where('kelompok','=','admin')->where('tampil','=','1')->count()>0)
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-globe"></i> Admin<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                                
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "admin") 
                                        
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                @endforeach
                        </ul>
                    </div>
                </li>
                @endif            

                @if ($halaman2->where('kelompok','=','purchasing')->where('tampil','=','1')->count()>0)
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-shopping-cart"></i> Purchasing<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                                
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "purchasing") 
                                        
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                @endforeach
                        </ul>
                    </div>
                </li>
                @endif
                @if ($halaman2->where('kelompok','=','gudang')->where('tampil','=','1')->count()>0)
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-warehouse"></i> Gudang Bahan Baku<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                                
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "gudang") 
                                        
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                
                                @endforeach
                        </ul>
                    </div>
                </li>
                @endif
                
                @if (Auth::user()->bagian=="Programmer")
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-warehouse"></i> Gudang Hasil Produksi<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                                
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "gudangjadi") 
                                        
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                
                                @endforeach
                        </ul>
                    </div>
                </li>
                @endif
                @if ($halaman2->where('kelompok','=','produksi')->where('tampil','=','1')->count()>0)
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-city"></i> Produksi<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                                
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "produksi") 
                                        
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                
                                @endforeach
                        </ul>
                    </div>
                </li>
                @endif
                @if ($halaman2->where('kelompok','=','ppic')->where('tampil','=','1')->count()>0)
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user-cog"></i> PPIC<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                                
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "ppic") 
                                        
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                
                                @endforeach
                        </ul>
                    </div>
                </li>
                @endif
                
                @if ($halaman2->where('kelompok','=','laporan')->where('tampil','=','1')->count()>0)
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-copy"></i> Laporan<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                               
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "laporan") 
                                        
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                
                                @endforeach
                        </ul>
                    </div>
                </li>
                @endif
                <style type="text/css">
                  .tabel0_textit {
                                    position: relative;
                                    font-family: sans-serif;
                                    /*text-transform: uppercase;*/
                                    font-size: 2em;
                                    letter-spacing: 4px;
                                    overflow: hidden;
                                    background: linear-gradient(90deg, #fff, #fff, #fff);
                                    background-repeat: no-repeat;
                                    background-size: 80%;
                                    animation: animate 3s linear infinite;
                                    -webkit-background-clip: text;
                                    -webkit-text-fill-color: rgba(255, 255, 255, 0);
                                    }

                @keyframes animate {
                  0% {
                    background-position: -500%;
                  }
                  100% {
                    background-position: 500%;
                  }
                }
                </style>
                @if ($halaman2->where('kelompok','=','it')->where('tampil','=','1')->count()>0)
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-desktop"></i> IT<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "it") 
                                        
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="tabel0_textit waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                
                                @endforeach
                        </ul>
                    </div>
                </li>
                @endif
                @if ($halaman2->where('kelompok','=','development')->where('tampil','=','1')->count()>0)
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-clipboard"></i> Development<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                                @foreach ($halaman2 as $data)
                                    @if ($data->tampil == "1" && $data->kelompok == "development") 
                                        
                                        <li><a href="{{url('/')}}/{{$data->linkhal}}" class="waves-effect">{{$data->namahal}}</a>
                                        </li>
                                    @endif
                                
                                @endforeach
                        </ul>
                    </div>
                </li>
                @endif
                
                @if (Auth::user()->bagian=="Programmer")

                <li>
                    <a href="{{url('/')}}/mdevart" class="waves-effect">
                        <i class="fa fa-adjust"></i> Development Artikel
                    </a>
                </li>

                <li>
                    <a href="{{url('/')}}/lasting" class="waves-effect">
                        <i class="fa fa-adjust"></i> Lasting
                    </a>
                </li>

                <li>
                    <a href="{{url('/')}}/pattern" class="waves-effect">
                        <i class="fa fa-adjust"></i> Master Pattern
                    </a>
                </li>

                <li>
                    <a href="{{url('/')}}/sample" class="waves-effect">
                        <i class="fa fa-adjust"></i> Sample Request
                    </a>
                </li>

                <li>
                    <a href="{{url('/')}}/bjopname" class="waves-effect">
                        <i class="fa fa-adjust"></i> Opname Produksi
                    </a>
                </li>

                <li>
                    <a href="{{url('/')}}/order" class="waves-effect">
                        <i class="fa fa-adjust"></i> Order Produksi
                    </a>
                </li>

                <li>
                    <a href="{{url('/')}}/spk" class="waves-effect">
                        <i class="fa fa-adjust"></i> SPK
                    </a>
                </li>


                @endif
                {{-- <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-copy"></i> Laporan<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{url('/')}}/purchasereq/report" class="waves-effect">Lap. Purchase Request</a>
                            </li>
                            <li><a href="{{url('/')}}/purchaseord/report" class="waves-effect">Lap. Purchase Order</a>
                            </li>
                            <li><a href="{{url('/')}}/gudang/ks" class="waves-effect">Lap. Kartu Stock</a>
                            </li>
                            <li><a href="{{url('/')}}/gudang/ksrp" class="waves-effect">Lap. Kartu Stock (Rp)</a>
                            </li>
                            <li><a href="{{url('/')}}/akutansi/jurnal" class="waves-effect">Lap. Jurnal Umum</a>
                            </li>
                            <li><a href="{{url('/')}}/akutansi/jurnal" class="waves-effect">Lap. Buku Besar</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-copy"></i> Laporan<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{url('/')}}/purchasereq/report" class="waves-effect">Lap. Purchase Request</a>
                            </li>
                            <li><a href="{{url('/')}}/purchaseord/report" class="waves-effect">Lap. Purchase Order</a>
                            </li>
                            <li><a href="{{url('/')}}/gudang/ks" class="waves-effect">Lap. Kartu Stock</a>
                            </li>
                            <li><a href="{{url('/')}}/gudang/ksrp" class="waves-effect">Lap. Kartu Stock (Rp)</a>
                            </li>
                            <li><a href="{{url('/')}}/akutansi/jurnal" class="waves-effect">Lap. Jurnal Umum</a>
                            </li>
                            <li><a href="{{url('/')}}/akutansi/jurnal" class="waves-effect">Lap. Buku Besar</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-leanpub"></i> BUKU BESAR<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{url('/')}}/bukubesar/barang" class="waves-effect">BB. Barang</a>
                            </li>
                            <li><a href="{{url('/')}}/bukubesar/hutang" class="waves-effect">BB. Hutang</a>
                            </li>
                            <li><a href="{{url('/')}}/bukubesar/ppnmasuk" class="waves-effect">BB. PPn Masukan</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
            
            @endguest
          </li>
          <!--/. Side navigation links -->
        </ul>

        <!-- Mask -->
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
</header> 


