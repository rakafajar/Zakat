<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - ZISWAF</title>

  <link rel="icon" href="{{ asset('img/logo_ziswaf.png') }}">

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Allerta') }}" rel="stylesheet">
  

  <!-- Page level plugin CSS-->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css ') }}" rel="stylesheet">

  <!-- Custom Search-->
  <link href="{{ asset('css/select2.min.css ') }}" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-info static-top">

    <a class="navbar-brand mr-1 font1" href="{{route('dashboard.index')}}">Aplikasi ZISWAF <img src="{{ asset('img/logo_ziswaf.png') }}" style="width: 30px;" class="img-responsive"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user-circle fa-fw text-white"></i>
      </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard.index')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-id-card"></i>
          <span>Kartu Keluarga</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="{{ route('kartukeluarga.index') }}">Kartu Keluarga</a>
          <a class="dropdown-item" href="{{ route('anggotakeluarga.index') }}">Anggota Keluarga</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('muzakki.index') }}">
          <i class="fas fa-users"></i>
          <span>Muzakki</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('mustahiq.index') }}">
          <i class="fas fa-users"></i>
          <span>Mustahik</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-wallet"></i>
          <span>Zakat</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="{{ route('zakatfitrah.index') }}">Zakat Fitrah</a>
          <a class="dropdown-item" href="{{ route('zakatmaal.index') }}">Zakat Maal</a>
          <a class="dropdown-item" href="{{ route('wakaf.index') }}">Wakaf</a>
          <a class="dropdown-item" href="{{ route('infaqshadaqah.index') }}">Infaq & Shodaqoh</a>
          <a class="dropdown-item" href="{{ route('fidyah.index') }}">Fidyah</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-share-square"></i>
          <span>Pengeluaran</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="{{ route('pengeluaraninsha.index') }}">Pengeluaran Infaq</a>
          <a class="dropdown-item" href="{{ route('pengeluaranwakaf.index') }}">Pengeluaran Wakaf</a>
          <a class="dropdown-item" href="{{ route('pengeluaranfidyah.index') }}">Pengeluaran Fidyah</a>
          <a class="dropdown-item" href="{{ route('pengeluaranzakatmaal.index') }}">Pengeluaran Z Maal</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="{{ route('agama.index') }}">Data Agama</a>
          <a class="dropdown-item" href="{{ route('pendidikan.index') }}">Data Pendidikan</a>
          <a class="dropdown-item" href="{{ route('jenispekerjaan.index') }}">Data Pekerjaan</a>
          <a class="dropdown-item" href="{{ route('perkawinan.index') }}">Data Perkawinan</a>
          <a class="dropdown-item" href="{{ route('hubungankeluarga.index') }}">Hubungan Keluarga</a>
          <a class="dropdown-item" href="{{ route('golongan.index') }}">Golongan Mustahik</a>
          <a class="dropdown-item" href="{{ route('jeniswakaf.index') }}">Jenis Wakaf</a>
          <a class="dropdown-item" href="{{ route('harga.index') }}">Harga Beras</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="fas fa-users"></i>
          <span>User</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
        @include('pesan-data')
        @yield('content')


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer badge-default">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Masjid Al-Muhajirin 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>

  <!-- JS SEARCH-->
  <script src="{{ asset('js/select2.min.js') }}"></script>

  @yield('script')

</body>

</html>
