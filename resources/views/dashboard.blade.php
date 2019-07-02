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
                @foreach($view_tot_insha as $list)
                <div class="mr-5">
                  <strong>Kas Infaq : <br>Rp. <?php echo format_uang($list->total_kas_insha) ?></strong>
                </div>
                @endforeach
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
                @foreach($view_tot_wakaf as $list)
                <div class="mr-5">
                  <strong>Kas Wakaf : <br>Rp. <?php echo format_uang($list->total_kas_wakaf) ?></strong>
                </div>
                @endforeach
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
                @foreach($view_tot_fidyah as $list)
                <div class="mr-5">
                  <strong>Kas Fidyah : <br>Rp. <?php echo format_uang($list->total_kas_fidyah) ?></strong>
                </div>
                @endforeach
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
                <div class="mr-5">13 New Tickets!</div>
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
                <div class="mr-5">13 New Tickets!</div>
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
        <select class="js-example-basic-single" name="state">
          <option value="AL">Alabama</option>
            ...
          <option value="WY">Wyoming</option>
        </select>

@endsection
