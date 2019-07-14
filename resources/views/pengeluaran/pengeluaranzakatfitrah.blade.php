@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
    <li class="breadcrumb-item active">Pengeluaran Zakat Fitrah</li>
</ol>

        <div class="card mb-3">
          <div class="card-header">
            Form Pengeluaran Zakat Fitrah
          </div>
          <div class="card-body">
            <form action="{{ route('pengeluaranzakatfitrah.store') }}" method="POST">
              {{ csrf_field() }}
              <div class="col-sm-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light">Total Kas</span>
                  </div>
                  <input type="text" class="form-control" value="Rp. <?php echo format_uang($kas->jml_kas); ?>" readonly>
                  <input type="hidden" class="form-control" name="jml_kas" id="jml_kas" onkeyup="sum();" value="{{ $kas->jml_kas }}" readonly>
                </div>
              </div>
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Wilayah</span>
                    </div>
                    <select class="form-control search" name="wil">
                        <option value="">-- Pilih Wilayah --</option>
                        <option value="Internal">Internal</option>
                        <option value="Eksternal">Eksternal</option>
                    </select>
                </div>
            </div>
              <div class="col-sm-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light">%</span>
                  </div>
                  <input type="number" class="form-control" name="persen_wil" id="persen_wil" onkeyup="sum();" value="" required>
                  <input type="number" class="form-control" name="hsl_persen_wil" id="hsl_persen_wil" value="" readonly>
                </div>
              </div>
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Golongan</span>
                    </div>
                    <select class="form-control search" name="gol">
                        <option value="">-- Pilih Golongan --</option>
                        @foreach ($golongan as $list)
                        <option value="{{ $list->id_golongan}}">{{ $list->nama_golongan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>          
              <div class="col-sm-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light">%</span>
                  </div>
                  <input type="number" class="form-control" name="persen_gol" id="persen_gol" onkeyup="sum();" value="" required>
                  <input type="number" class="form-control" name="hsl_persen_gol" id="hsl_persen_gol" value="" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light">Total Pengeluaran Zakat Fitrah</span>
                  </div>
                  <input type="number" class="form-control" name="jml_peng_zfitrah" id="jml_peng_zfitrah" value="" readonly>
                </div>
              </div>              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="keterangan">Keterangan:</label>
                  <textarea class="form-control" rows="5" name="keterangan" required></textarea>
                </div>
                <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
              </div>              
            </form>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-header">
          	Data Pengeluaran Zakat Maal
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Wilayah</th>
                    <th>Golongan</th>
                    <th>Jumlah Mustahik</th>
                    <th>Total Pengeluaran</th>
                    <th>Pengeluaran Perorang</th>
                    {{--  <th>Keterangan</th>  --}}
                    <th>Tanggal Pengeluaran</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($pengeluaran as $list)
                  <?php $no++; ?>
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $list->wilayah }}</td>
                    <td>{{ $list->nama_golongan }}</td>
                    <td>{{ $list->jml_golongan }}</td>
                    <td>Rp. <?php echo format_uang($list->jml_peng_zfitrah); ?></td>
                    <td>Rp. <?php echo format_uang($list->peng_zfitrah_org); ?></td>
                    {{--  <td>{{$list->keterangan}}</td>  --}}
                    <td><?php echo tanggal_indonesia($list->created_at); ?></td>
                    <th style="text-align: center;">
                        <a href="" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
@endsection

@section('script')
<script>
    function sum()
    {
        //perhitungan untuk wilayah
        var total_zfitrah = document.getElementById('jml_kas').value;

        var persen_wil = parseInt(document.getElementById('persen_wil').value) / 100;

        var hsl_persen_wil = parseFloat(total_zfitrah) * parseFloat(persen_wil);
        if (!isNaN(hsl_persen_wil)) {
            document.getElementById('hsl_persen_wil').value = hsl_persen_wil;
        }

        //perhitungan untuk golongan
        var persen_gol = parseInt(document.getElementById('persen_gol').value) / 100;

        var hsl_persen_gol = parseFloat(hsl_persen_wil) * parseFloat(persen_gol);
        if (!isNaN(hsl_persen_gol)) {
            document.getElementById('hsl_persen_gol').value = hsl_persen_gol;
        }

        var jml_peng_zfitrah = parseInt(hsl_persen_gol);
        if (!isNaN(jml_peng_zfitrah)) {
            document.getElementById('jml_peng_zfitrah').value = jml_peng_zfitrah;
        }
    }
</script>
@endsection