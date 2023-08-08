<div class="form-horizontal">
  <form id="form1" action="{{ route('master-kategori-barang.update', [$data->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- jumlah -->
    <!-- <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah </label>
		<div class="col-sm-9">
			<input type="number" min="0" name="first_stock" id="form-field-1" placeholder="jumlah.." class="col-xs-10 col-sm-5" />
		</div>
	  </div> -->

    <!-- Nama -->
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
        Nama
      </label>
      <div class="col-sm-9">
        <input type="text" name="nama" value="{{ $data->nama }}" id="form-field-1" placeholder="Nama Produk.." class="col-xs-10 col-sm-5" />
      </div>
    </div>

    <!-- Kategori -->
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-select-1">
        Kategori
      </label>
      @php 
        $selectedKategoriId = $data->kategori_id;
      @endphp
      <div class="col-sm-9">
        <select name="kategori_id" class="col-xs-10 col-sm-5" id="form-field-select-1">
          <!-- <option value="">Pilih Kategori</option> -->
          @foreach ($KategoriUmumProduk as $data)
            <option value="{{ $data->id }}" {{ $data->id == $selectedKategoriId ? 'selected' : '' }}>
              {{ $data->nama }}
            </option>
          @endforeach
        </select>
      </div>
    </div>

  </form>

  <div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
      <a href="{{ route('master-kategori-barang.index') }}" class="btn btn-warning" type="reset">
        <i class="ace-icon fa fa-arrow-left  bigger-110"></i>
        Kembali
      </a>
      &nbsp; &nbsp; &nbsp;
      <button class="btn btn-info" type="submit" id="submitButton">
        <i class="ace-icon fa fa-check bigger-110"></i>
        Submit
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