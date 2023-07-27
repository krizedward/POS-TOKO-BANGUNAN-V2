<form class="form-horizontal" action="{{ route('produk.update', [$data[0]->id]) }}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')

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
			<input type="text" name="nama" value="{{ $data[0]->nama }}" id="form-field-1" class="col-xs-10 col-sm-5" />
		</div>
	</div>

  <!-- Modal Barang -->
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 
      Modal 
    </label>
		<div class="col-sm-9">
			<input type="text" name="modal" value="{{ $data[0]->modal }}" id="form-field-1" placeholder="Modal Barang.." class="col-xs-10 col-sm-5" />
		</div>
	</div>

  <!-- Jumlah Barang -->
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 
      Jumlah 
    </label>
		<div class="col-sm-9">
			<input type="number" name="jumlah" value="{{ $data[0]->jumlah }}" min="0" id="form-field-1" placeholder="Jumlah Barang.." class="col-xs-10 col-sm-5" />
		</div>
	</div>

  <!-- Tanggal Barang Masuk -->
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 
      Tanggal Barang Masuk 
    </label>
		<div class="col-sm-9">
			<input type="date" name="tanggal_masuk" value="{{ $data[0]->tanggal_masuk }}" id="form-field-1" class="col-xs-10 col-sm-5" />
		</div>
	</div>

  <!-- Harga Toko -->
	<!-- <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 
      Harga Toko 
    </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="jumlah.." class="col-xs-10 col-sm-5" />
		</div>
	</div> -->

  <!-- jumlah -->
	<!-- <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah </label>
		<div class="col-sm-9">
			<input type="number" min="0" name="first_stock" id="form-field-1" placeholder="jumlah.." class="col-xs-10 col-sm-5" />
		</div>
	</div> -->

  <!-- <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
		<div class="col-sm-9">
			<input type="text" name="nama_produk" id="form-field-1" placeholder="Nama Barang.." class="col-xs-10 col-sm-5" />
		</div>
	</div> -->
	<!-- copy -->
				
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit">
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
</form>