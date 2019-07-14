@extends('master')
@section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-money-check"></i>
                </div>
                <div class="mr-5">
                  <strong>Kas Infaq : <br>Rp. <?php echo format_uang($kas_infaq->jml_kas) ?></strong>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('infaqshadaqah.index')}}">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-money-check"></i>
                </div>
                <div class="mr-5">
                  <strong>Kas Wakaf : <br>Rp. <?php echo format_uang($kas_wakaf->jml_kas) ?></strong>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('wakaf.index')}}">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-money-check"></i>
                </div>
                <div class="mr-5">
                  <strong>Kas Fidyah : <br>Rp. <?php echo format_uang($kas_fidyah->jml_kas) ?></strong>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('fidyah.index')}}">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-money-check"></i>
                </div>
                <div class="mr-5">
                  <strong>Kas Zakat Fitrah : <br>Rp. <?php echo format_uang($kas_zfitrah->jml_kas) ?></strong>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-money-check"></i>
                </div>
                <div class="mr-5">
                  <strong>Kas Zakat Maal : <br>Rp. <?php echo format_uang($kas_zmaal->jml_kas) ?></strong>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
@endsection
