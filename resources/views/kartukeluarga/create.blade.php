@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Kartu Keluarga</li>
</ol>

<form action="{{ route('kartukeluarga.store') }}" method="POST">
  {{ csrf_field() }}
  <div class="card">
    <div class="card-header">Form Kartu Keluarga</div>
    <div class="card-body">
      <div class="col-md-8">
        <form>
          <div class="form-group">
            <label for="nokk">Nomor KK:</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" required="">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" rows="5" id="alamat" name="alamat" required=""></textarea>
          </div>
          <div class="form-group">
            <label for="rtrw">RT/RW:</label>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="rt" name="rt" class="form-control" required="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="rw" name="rw" class="form-control" required="">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="kodepos">Kode Pos:</label>
            <input type="text" class="form-control" id="kode_pos" name="kode_pos" required="">
          </div>
          <div class="form-group">
            <select name="name_provinces" id="name_provinces" class="form-control input-lg dynamic" data-dependent="name_cities">
              <option value="">-- Pilih Provinsi --</option>
              @foreach($dropdown_wilayah as $provinsi)
                <option value="{{$provinsi->name_provinces}}">{{$provinsi->name_provinces}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <select name="name_cities" id="name_cities" class="form-control input-lg dynamic" data-dependent="name_district">
              <option value="">-- Pilih Kota --</option>
            </select>
          </div>
          <div class="form-group">
            <select name="name_district" id="name_district" class="form-control input-lg dynamic" data-dependent="name_villages">
              <option>-- Pilih Kecamatan --</option>
            </select>
          </div>
          <div class="form-group">
            <select name="name_villages" id="name_villages" class="form-control input-lg">
              <option>-- Pilih Kecamatan --</option>
            </select>
          </div>
          {{ csrf_field() }}
          <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
          <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
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
                $('#'+dependent).html(result);
              }
            })
        }
    });
  

  });
</script>
@endsection
