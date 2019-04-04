<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title','Dashboard')</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="{{asset('ea/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/select2-bootstrap.min.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('ea/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('ea/vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css">  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('ea/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('ea/images/favicon.png')}}"/>
</head>
<body>
	<div class="container-scroller">
		<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="{{asset('ea/images/logo.svg')}}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="{{asset('ea/images/logo-mini.svg')}}" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
         
            
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, {{ucfirst(Auth::user()->name)}} !</span>
              <img class="img-xs rounded-circle" src="{{asset('ea/images/faces/face1.jpg')}}" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <div class="container-fluid page-body-wrapper">
   <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="user-wrapper">
            <div class="profile-image">
              <img src="{{asset('ea/images/faces/face1.jpg')}}" alt="profile image">
            </div>
            <div class="text-wrapper">
              <p class="profile-name">{{ ucfirst(Auth::user()->name) }}</p>
              <div>
                <small class="designation text-muted">{{ ucfirst(Auth::user()->level) }}</small>
                <span class="status-indicator online"></span>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/dashboard')}}">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @can('informasi')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="fa fa-home"></i>
          <span class="menu-title">&nbsp;Master</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{url('/informasi')}}"><i class="fa fa-info-circle"></i>&nbsp;Informasi Toko</a>
            </li>            
            <li class="nav-item">
              <a class="nav-link" href="{{url('/karyawan')}}"><i class="fa fa-users"></i>&nbsp;Daftar User</a>
            </li>
          </ul>
        </div>
      </li>
      @endcan     
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
          <i class="fa fa-warehouse"></i>
          <span class="menu-title">&nbsp;Inventory</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic2">
          <ul class="nav flex-column sub-menu">
            @can('unit')
            <li class="nav-item">
              <a class="nav-link" href="{{url('/unit')}}"><i class="fa fa-tasks"></i>&nbsp;Unit</a>
            </li>
            @endcan
            @can('kategori')
            <li class="nav-item">
              <a class="nav-link" href="{{url('/kategori')}}"><i class="fa fa-sort"></i>&nbsp;Kategori</a>
            </li>
            @endcan
            @can('ppn')
            <li class="nav-item">
              <a class="nav-link" href="{{url('/pajak')}}"><i class="fa fa-tags"></i>&nbsp;PPN</a>
            </li>
            @endcan
            @can('barang')
            <li class="nav-item">
              <a class="nav-link" href="{{url('/barang')}}"><i class="fa fa-plus"></i>&nbsp;Tambah Barang</a>
            </li>
            @endcan
          </ul>
        </div>
      </li>
      @can('pos')
      <li class="nav-item">
        <a class="nav-link" href="{{url('/pos')}}">
          <i class="fa fa-cart-arrow-down"></i>
          <span class="menu-title">&nbsp;POS</span>
        </a>
      </li>
      @endcan
    </ul>
  </nav>
  <div class="main-panel">
   <div class="content-wrapper">
    <div class="row">
     @yield('content')
   </div>
 </div>
</div>
</div>
</div>
<script src="{{asset('ea/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('ea/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('ea/js/off-canvas.js')}}"></script>
<script src="{{asset('ea/js/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('ea/js/dashboard.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src=""></script>
@yield('foot-content')
<script type="text/javascript">
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
</body>
</html>