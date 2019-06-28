@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">User</li>
</ol>

<div class="card">
  <div class="card-header">Form User</div>
  <div class="card-body">
    <div class="col-md-8">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      <form class="form-horizontal" role="form" method="POST" action="{{ route('user.store') }}">
        {{ csrf_field() }}
        {{ method_field('post') }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>
            <div class="">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
            <div class="">
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>
            <div class="">
                <input id="password" type="password" class="form-control" name="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
            <div class="">
                <input id="password-confirm" type="password" class="form-control" name="confirm_password">
                @if ($errors->has('confirm_password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('confirm_password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class=" col-md-offset-4">
                <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
            </div>
        </div>
    </form>
    </div>    
</div>
</div>
<br>
@endsection
