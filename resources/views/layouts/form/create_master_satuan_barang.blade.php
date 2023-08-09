<div class="form-horizontal">
  <form id="form1" action="{{ route('master-satuan-barang.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')

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
        <input type="text" name="nama" id="form-field-1" placeholder="Nama Satuan Baru.." class="col-xs-10 col-sm-5" />
      </div>
    </div>

    <!-- Keterangan -->
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
        Keterangan
      </label>
      <div class="col-sm-9">
        <input type="text" name="keterangan" id="form-field-1" placeholder="Ketarangan Satuan Baru.." class="col-xs-10 col-sm-5" />
      </div>
    </div>
    
  </form>

  <div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
      <a href="{{ route('master-satuan-barang.index') }}" class="btn btn-warning" type="reset">
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