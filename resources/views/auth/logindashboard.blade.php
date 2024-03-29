<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="icon" href="{{ asset('img/apple-touch-icon.png') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('https://fonts.googleapis.com/css?family=Allerta') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
  <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js') }}"></script>
  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js') }}"></script>
  <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container login-container">
      <div class="row">
        <div class="col-md-6 ads">
          <h1 style="text-align: center;"><span id="fl">Masjid</span></h1>
          <h6 style="text-align: center;"><span id="fl">Al-Muhajirin</span></h6>
          <hr>
          <div id="my-content">
            <span id="kl"><i class="fa fa-envelope-o"></i> almuhajirin@gmail.com</span><br>
            <span id="kl"><i class="fa fa-phone-square"></i> 022 724561</span><br>
            <span id="kl"><i class="fa fa-home"></i> Komplek Griya Mitra Posindo, Cinunuk, Cileunyi, Kabupaten Bandung</span>            
          </div>
        </div>
        <div class="col-md-6 login-form">
          <div class="profile-img" id="my-content">
            <img src="{{ asset('img/favicon.png')}}" alt="profile_img" height="140px" width="140px;" class="img img-responsive">
          </div>
          <h3 id="fl">Login Dashboard</h3>
          <form>
            <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-info btn-lg btn-block">Sign In</button>
            </div>
            <div class="form-group forget-password">
                <a href="">Forget Password</a>
            </div>
            <div class="form-group forget-password">
                <a href="">Register</a>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>