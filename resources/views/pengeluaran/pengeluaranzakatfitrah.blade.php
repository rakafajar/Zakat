@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
    <li class="breadcrumb-item active">Pengeluaran Zakat Fitrah</li>
</ol>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                Pembagian Wilayah
              </div>
              <div class="card-body">
                <form action="{{ route('pengeluaranzakatfitrah.store') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="col-sm-12">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Total Kas Fitrah</span>
                      </div>
                      <input type="text" class="form-control" value="Rp. <?php echo format_uang($kas->jml_kas); ?>" readonly>
                      <input type="hidden" class="form-control" name="jml_kas" id="jml_kas" onkeyup="sum();" value="{{ $kas->jml_kas }}" readonly>
                      <input type="hidden" class="form-control" name="jml_kas_int" id="jml_kas_int" value="{{ $kas_int->jml_kas_int }}" readonly>
                      <input type="hidden" class="form-control" name="jml_kas_eks" id="jml_kas_eks" value="{{ $kas_eks->jml_kas_eks }}" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-light">% Int</span>
                      </div>
                      <input type="number" class="form-control" name="persen_int" id="persen_int" onkeyup="sum();" value="0" required>
                      <input type="text" class="form-control" name="hsl_persen_int" id="hsl_persen_int" value="" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-light">% Eks</span>
                      </div>
                      <input type="number" class="form-control" name="persen_eks" id="persen_eks" onkeyup="sum();" value="0" required>
                      <input type="text" class="form-control" name="hsl_persen_eks" id="hsl_persen_eks" value="" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-calculator"></i> Hitung</button>
                    <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
                  </div>              
                </form>
              </div>
            </div>
            
            <form action="{{ URL::to('pengeluaranzakatfitrah/reset') }}" method="POST">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-sync-alt"></i> Reset Kas</button>
            </form>
          </div>
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                Pengeluaran Zakat Fitrah Internal
              </div>
              <div class="card-body">
                <form action="{{ route('pengeluaranzakatfitrahint.store') }}" method="POST">
                {{ csrf_field() }}
                  <div class="col-sm-12">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Total Kas Internal</span>
                      </div>
                      <input type="text" class="form-control" value="Rp. <?php echo format_uang($kas_int_update->jml_kas_int); ?>" readonly>
                      <input type="hidden" class="form-control" name="jml_kas_int_update" id="jml_kas_int" onkeyup="" value="{{ $kas_int_update->jml_kas_int }}" readonly>
                      <input type="hidden" class="form-control" name="jml_kas_int" id="jml_kas_int" onkeyup="sumInt();" value="{{ $kas_int->jml_kas_int }}" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light">Golongan</span>
                        </div>
                        <select class="form-control search" name="gol_int">
                            <option value="">-- Pilih Golongan --</option>
                            @foreach ($golongan as $list)
                            <option value="{{ $list->id_golongan}}">{{ $list->nama_golongan }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-light">%</span>
                      </div>
                      <input type="number" class="form-control" name="persen_gol_int" id="persen_gol_int" onkeyup="sumInt();" value="0" required>
                      <input type="text" class="form-control" name="hsl_gol_int" id="hsl_gol_int" value="" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
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
          </div>
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                Pengeluaran Zakat Fitrah Eksternal
              </div>
              <div class="card-body">
                <form action="{{ route('pengeluaranzakatfitraheks.store') }}" method="POST">
                {{ csrf_field() }}
                  <div class="col-sm-12">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-light">Total Kas Eksternal</span>
                      </div>
                      <input type="text" class="form-control" value="Rp. <?php echo format_uang($kas_eks_update->jml_kas_eks); ?>" readonly>
                      <input type="hidden" class="form-control" name="jml_kas_eks" id="jml_kas_eks" onkeyup="sumEks();" value="{{ $kas_eks->jml_kas_eks }}" readonly>
                      <input type="hidden" class="form-control" name="jml_kas_eks_update" id="jml_kas_eks" onkeyup="" value="{{ $kas_eks_update->jml_kas_eks }}" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light">Golongan</span>
                        </div>
                        <select class="form-control search" name="gol_eks">
                            <option value="">-- Pilih Golongan --</option>
                            @foreach ($golongan as $list)
                            <option value="{{ $list->id_golongan}}">{{ $list->nama_golongan }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-light">%</span>
                      </div>
                      <input type="number" class="form-control" name="persen_gol_eks" id="persen_gol_eks" onkeyup="sumEks();" value="0" required>
                      <input type="text" class="form-control" name="hsl_gol_eks" id="hsl_gol_eks" value="" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
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
          </div>
        </div>
        
        <div class="card mb-3">
          <div class="card-header">
            <button onclick="deleteAll()" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button> 
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <form method="post" id="form-pengeluaranzakatfitrah">
                  {!! csrf_field() !!}
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="20"><input type="checkbox" value="1" id="select-all"></th>
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
                    <td><input type="checkbox" name="id[]" value="{{ $list->id_peng_zfitrah }}"></td>
                    <td>{{ $no }}</td>
                    <td>{{ $list->wilayah }}</td>
                    <td>{{ $list->nama_golongan }}</td>
                    <td>{{ $list->jml_golongan }}</td>
                    <td>Rp. <?php echo format_uang($list->jml_peng_zfitrah); ?></td>
                    <td>Rp. <?php echo format_uang($list->peng_zfitrah_org); ?></td>
                    {{--  <td>{{$list->keterangan}}</td>  --}}
                    <td><?php echo tanggal_indonesia($list->created_at); ?></td>
                    <th style="text-align: center;">
                      <a href="{{ URL::to('pengeluaranzakatfitrah/invoicezakatfitrah/'.$list->id_peng_zfitrah) }}" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                      <a href="{{ route('pengeluaranzakatfitrah.edit', $list->id_peng_zfitrah) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                      <a href="{{ URL::to('pengeluaranzakatfitrah/destroy/'.$list->id_peng_zfitrah) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </form>
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

        var persen_int = parseInt(document.getElementById('persen_int').value) / 100;
        var persen_eks = parseInt(document.getElementById('persen_eks').value) / 100;

        var hsl_persen_int = parseFloat(total_zfitrah) * parseFloat(persen_int);
        if (!isNaN(hsl_persen_int)) {
            document.getElementById('hsl_persen_int').value = parseInt(hsl_persen_int);
        }

        var hsl_persen_eks = parseFloat(total_zfitrah) * parseFloat(persen_eks);
        if (!isNaN(hsl_persen_eks)) {
            document.getElementById('hsl_persen_eks').value = parseInt(hsl_persen_eks);
        }
    }

    //perhitungan untuk golongan internal
    function sumInt() {
      var jml_kas_int = document.getElementById('jml_kas_int').value;
      var persen_gol_int = parseInt(document.getElementById('persen_gol_int').value) / 100;

      var hsl_gol_int = parseFloat(jml_kas_int) * parseFloat(persen_gol_int);
        if (!isNaN(hsl_gol_int)) {
          document.getElementById('hsl_gol_int').value = parseInt(hsl_gol_int);
        }
    }


    function sumEks() {
      var jml_kas_eks = document.getElementById('jml_kas_eks').value;
      var persen_gol_eks = parseInt(document.getElementById('persen_gol_eks').value) / 100;

      var hsl_gol_eks = parseFloat(jml_kas_eks) * parseFloat(persen_gol_eks);
        if (!isNaN(hsl_gol_eks)) {
          document.getElementById('hsl_gol_eks').value = parseInt(hsl_gol_eks);
        }
    }

    $('#select-all').click(function(){
    $('input[type="checkbox"]').prop('checked', this.checked);
  });

  //Menghapus Semua Data yang dicentang
  function deleteAll(){
    if ($('input:checked').length<1) {
      alert('Pilih data yang akan di hapus!')
    } else if (confirm("Apakah yakin akan menghapus semua data terpilih?")){
      $.ajax({
        url: "pengeluaranzakatfitrah/hapus",
        type: "POST",
        data: $('#form-pengeluaranzakatfitrah').serialize(),
        success: function(data){
          location.reload();
        },
        error: function(data){
          alert("Tidak Dapat Menghapus Data!");
        }
      });
    }
  }
</script>
@endsection