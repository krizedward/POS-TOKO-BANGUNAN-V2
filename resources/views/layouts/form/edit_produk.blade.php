<div class="form-horizontal">
  <form id="form1" action="{{ route('produk.update', [$data->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- jumlah -->
    <!-- <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah </label>
		<div class="col-sm-9">
			<input type="number" min="0" name="first_stock" id="form-field-1" placeholder="jumlah.." class="col-xs-10 col-sm-5" />
		</div>
	  </div> -->

    <!-- Nama Produk -->
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
        Nama
      </label>
      <div class="col-sm-9">
        <input type="text" name="nama" value="{{ $data->nama }}" id="form-field-1" class="col-xs-10 col-sm-5" />
      </div>
    </div>

    <!-- Kategori Produk -->
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-select-1">
        Kategori
      </label>
      @php 
        $selectedKategoriId = $data->kategori_id;
      @endphp
      <div class="col-sm-9">
        <select name="kategori_id" class="col-xs-10 col-sm-5" id="form-field-select-1">
          <option value="">Pilih Kategori</option>
          @foreach ($KategoriProdukDetail as $data)
            <option value="{{ $data->id }}" {{ $data->id == $selectedKategoriId ? 'selected' : '' }}>
              {{ $data->nama }}
            </option>
          @endforeach
        </select>
      </div>
    </div>

    <!-- Satuan Produk -->
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-select-1">
        Satuan
      </label>
      @php 
        $selectedSatuanId = $data->satuan_id;
      @endphp
      <div class="col-sm-9">
        <select name="satuan_id" class="col-xs-10 col-sm-5" id="form-field-select-1">
          <option value="">Pilih Satuan</option>
          @foreach ($ProdukSatuan as $data)
            <option value="{{ $data->id }}" {{ $data->id == $selectedSatuanId ? 'selected' : '' }}>
              {{ $data->nama }}
            </option>
          @endforeach
        </select>
      </div>
    </div>

    <!-- Jumlah Produk -->
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
        Jumlah
      </label>
      <div class="col-sm-9">
        <input type="number" name="jumlah" min="0" id="form-field-1" placeholder="Jumlah Produk.."
          class="col-xs-10 col-sm-5" />
      </div>
    </div>

    <div class="space-4"></div>
  </form>

  <div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
      <button class="btn btn-info" type="submit" id="submitButton">
        <i class="ace-icon fa fa-check bigger-110"></i>
        Submit
      </button>
      &nbsp; &nbsp; &nbsp;
      <button class="btn" type="reset">
        <i class="ace-icon fa fa-undo bigger-110"></i>
        Reset
      </button>
      &nbsp; &nbsp; &nbsp;
      <a href="{{ route('produk.index') }}" class="btn btn-warning" type="reset">
        <i class="ace-icon fa fa-arrow-left  bigger-110"></i>
        Kembali
      </a>
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