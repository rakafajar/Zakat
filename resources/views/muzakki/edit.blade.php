@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Muzakki</li>
</ol>

<div class="card">
  <div class="card-header">Form Edit Muzakki</div>
  <div class="card-body">
    <div class="col-md-8">
      <form action="{{ route('muzakki.update', $muzakki->id_muzakki) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH') }}
        <div class="form-group{{$errors->has('id_kk') ? ' has-error' : ''}}">
          <select name="id_kk" id="id_kk" class="form-control input-lg dynamic search" data-dependent="id_anggotakk+nama_lengkap">
            <option value="">-- Pilih No KK --</option>
            @foreach($view_anggotakk as $list)
              <option value="{{$list->id_kk}}">{{$list->no_kk}}</option>
            @endforeach
          </select>
          @if($errors->has('id_kk'))
          <span class="help-block">{{$errors->first('id_kk')}}</span>
          @endif
        </div>
        <div class="form-group{{$errors->has('id_anggotakk') ? ' has-error' : ''}}">
            <select name="id_anggotakk" id="id_anggotakk" class="form-control input-lg search">
            <option value="">-- Pilih NIK --</option>
          </select>
          @if($errors->has('id_anggotakk'))
          <span class="help-block">{{$errors->first('id_anggotakk')}}</span>
          @endif
        </div>
          {{ csrf_field() }}
          <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
          <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
          <a href="{{ route('muzakki.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>
@endsection
  
@section('script')
<script>
  $(document).ready(function(){
    $('.dynamic').change(function(){
      if($(this).val() != '')
        {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{ route('muzakki.fetch')}}",
              method:"POST",
              data:{select:select, value:value, _token:_token, dependent:dependent},
              success:function(result)
              {
                var a = dependent.split("+");
                $('#'+a[0]).html(result);
              }
            })
        }
    });

    $('#').change(function(){
      $('#no_kk').val('');
      $('#nama_lengkap').val('');
    });
  });

    {{-- Java Script Search --}}
    $(document).ready(function() {
      $('.search').select2();
    });
</script>
@endsection