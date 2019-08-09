@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Kartu Keluarga</li>
</ol>

  <div class="card">
    <div class="card-header">Form Edit Kartu Keluarga</div>
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
        <form action="{{ route('kartukeluarga.update', $kartukeluarga->id_kk) }}" method="POST">
              {{ csrf_field() }} {{ method_field('PATCH')}}
        <div class="form-group">
          <label for="nokk">Nomor KK:</label>
          <input type="number" min="0" class="form-control" id="no_kk" name="no_kk" value="{{ $kartukeluarga->no_kk}}">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat:</label>
          <textarea class="form-control" rows="5" id="alamat" name="alamat" >{{ $kartukeluarga->alamat}}
          </textarea>
        </div>
        <div class="form-group">
          <label for="rtrw">RT/RW:</label>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="rt" name="rt" class="form-control" value="{{ $kartukeluarga->rt}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="rw" name="rw" class="form-control" value="{{ $kartukeluarga->rw}}">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="kodepos">Kode Pos:</label>
          <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ $kartukeluarga->kode_pos}}">
        </div>
        <div class="form-group{{$errors->has('id_provinces') ? ' has-error' : ''}}">
          <select name="id_provinces" id="id_provinces" class="form-control input-lg dynamic" data-dependent="id_cities+name_cities">
            <option value="">-- Pilih Provinsi --</option>
            @foreach($dropdown_wilayah as $provinsi)
              <option value="{{$provinsi->id_provinces}}">{{$provinsi->name_provinces}}</option>
            @endforeach
          </select>
          @if($errors->has('id_provinces'))
          <span class="help-block">{{$errors->first('id_provinces')}}</span>
          @endif
        </div>
        <div class="form-group{{$errors->has('id_cities') ? ' has-error' : ''}}">
          <select name="id_cities" id="id_cities" class="form-control input-lg dynamic" data-dependent="district_id+name_district ">
            <option value="">-- Pilih Kota --</option>
          </select>
          @if($errors->has('id_cities'))
          <span class="help-block">{{$errors->first('id_cities')}}</span>
          @endif
        </div>
        <div class="form-group{{$errors->has('district_id') ? ' has-error' : ''}}">
          <select name="district_id" id="district_id" class="form-control input-lg dynamic" data-dependent="id_villages+name_villages">
            <option>-- Pilih Kecamatan --</option>
          </select>
          @if($errors->has('district_id'))
          <span class="help-block">{{$errors->first('district_id')}}</span>
          @endif
        </div>
        <div class="form-group{{$errors->has('id_villages') ? ' has-error' : ''}}">
          <select name="id_villages" id="id_villages" class="form-control input-lg">
            <option>-- Pilih Kecamatan --</option>
          </select>
          @if($errors->has('id_villages'))
          <span class="help-block">{{$errors->first('id_villages')}}</span>
          @endif
        </div>
          {{ csrf_field() }}
          <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
          {{-- <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button> --}}
          <a href="{{ route('kartukeluarga.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
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
              url:"{{ route('kartukeluarga.fetch')}}",
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

    $('#name_provinces').change(function(){
      $('#name_cities').val('');
      $('#name_district').val('');
      $('#name_villages').val('');
     });
    
     $('#name_cities').change(function(){
      $('#name_district').val('');
      $('#name_villages').val('');
     });

     $('#name_district').change(function(){
      $('#name_villages').val('');
     });


  });
</script>
@endsection

