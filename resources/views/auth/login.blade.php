<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="icon" href="{{ asset('img/logo.png') }}">
<link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') }}">
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
        <h1 style="text-align: center;"><span id="fl">Aplikasi</span></h1>
        <h6 style="text-align: center;"><span id="fl">ZISWAF</span></h6>
        <hr>
        <div id="my-content" style="text-align: center;">
            <h6><span id="sl">(Zakat, Infaq, Shodaqoh, Wakaf & Fidyah)</span></h6>         
        </div>
        </div>
        <div class="col-md-6 login-form">
        <div class="profile-img" id="my-content">
            <img src="{{ asset('img/logo.png')}}" alt="profile_img" height="140px" width="140px;" class="img img-responsive">
        </div>
        <h3 id="fl">Login Admin</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-info">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</body>
</html>