<div class="form-horizontal">
  <form id="form1" action="{{ route('master-barang.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <!-- jumlah -->
    <!-- <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah </label>
		<div class="col-sm-9">
			<input type="number" min="0" name="first_stock" id="form-field-1" placeholder="jumlah.." class="col-xs-10 col-sm-5" />
		</div>
	  </div> -->

    <!-- Nama Barang -->
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
        Nama
      </label>
      <div class="col-sm-9">
        <input type="text" name="nama" id="form-field-1" placeholder="Nama Barang.." class="col-xs-10 col-sm-5" />
      </div>
    </div>

    <!-- keterangan Barang -->
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
        Keterangan
      </label>
      <div class="col-sm-9">
        <input type="text" name="keterangan" id="form-field-1" placeholder="Opsional tidak harus diisi inputan.." class="col-xs-10 col-sm-5" />
      </div>
    </div>

    <!-- Kategori Barang -->
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-select-1">
        Kategori
      </label>
      <div class="col-sm-9">
        <select name="kategori_id" class="col-xs-10 col-sm-5" id="form-field-select-1">
          <option value="">Pilih Kategori</option>
          @foreach ($MasterKategoriBarang as $data)
          <option value="{{ $data->id }}">{{ $data->nama }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <!-- Kategori Barang -->
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-select-1">
        Satuan
      </label>
      <div class="col-sm-9">
        <select name="satuan_id" class="col-xs-10 col-sm-5" id="form-field-select-1">
          <option value="">Pilih Satuan</option>
          @foreach ($MasterSatuanBarang as $data)
          <option value="{{ $data->id }}">{{ $data->nama }}</option>
          @endforeach
        </select>
      </div>
    </div>

  </form>

  <div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
      <a href="{{ route('master-barang.index') }}" class="btn btn-warning" type="reset">
        <i class="ace-icon fa fa-arrow-left  bigger-110"></i>
        Kembali
      </a>
      &nbsp; &nbsp; &nbsp;
      <button class="btn btn-info" type="submit" id="submitButton">
        <i class="ace-icon fa fa-check bigger-110"></i>
        Simpan
      </button>
      &nbsp; &nbsp; &nbsp;
      <!-- <button class="btn" type="reset">
        <i class="ace-icon fa fa-undo bigger-110"></i>
        Reset
      </button> -->
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#submitButton').click(function() {
      // Kirim Form 2
      $('#form2').submit();
      // Kirim Form 1
      $('#form1').submit();
    });
  });
</script>