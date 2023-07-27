<form class="form-horizontal" action="{{ route('barang.master.update', Crypt::encrypt($data->id)) }}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<!-- kode -->
	<!-- <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Barang </label>
		<div class="col-sm-9">
			<input type="text" name="id" value="{{ $data->id }}" id="form-field-1" placeholder="kode barang.." class="col-xs-10 col-sm-5" />
		</div>
	</div> -->
	
	<!-- membuat model dari Version1 -->
	
	<!-- nama -->
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
		<div class="col-sm-9">
			<input type="text" name="name_product" value="{{ $data->name }}" id="form-field-1" placeholder="nama barang.." class="col-xs-10 col-sm-5" />
		</div>
	</div>
				
    <!-- keterangan -->
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
		<div class="col-sm-9">
			<input type="text" name="description" value="{{ $data->description }}" id="form-field-1" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<!-- harga beli -->
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Harga Beli </label>
		<div class="col-sm-9">
			<input type="text" name="buy_price" value="{{ $data->buy_price }}" id="form-field-1" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<!-- harga jual -->
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Harga Jual </label>
		<div class="col-sm-9">
			<input type="text" name="sell_price" value="{{ $data->sell_price }}" id="form-field-1" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<!-- stock awal -->
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Stok Awal </label>
		<div class="col-sm-9">
			<input type="text" name="first_stock" value="{{ $data->product_storages->first_stock }}" id="form-field-1" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<!-- stock akhir -->
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Stok Akhir </label>
		<div class="col-sm-9">
			<input type="text" name="last_stock" value="{{ $data->product_storages->last_stock }}" id="form-field-1" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<!-- masih perbaikan  -->
	<!-- <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Stok Awal </label>
		<div class="col-sm-9">
			<input type="text" name="first_stock" value="{{ $data->first_stock }}" id="form-field-1" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Stok Akhir </label>
		<div class="col-sm-9">
			<input type="text" name="last_stock" value="{{ $data->last_stock }}" id="form-field-1" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1" place> Gambar </label>
		<div class="col-sm-9">
			<input type="file" name="images_product"/>
		</div>
	</div> -->

	<!-- kategori -->
	<!-- <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kategori </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="kategori" class="col-xs-10 col-sm-5" />
		</div>
	</div> -->
	<!-- copy -->

	<!-- <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1" place> Kategori </label>
		<div class="col-xs-10 col-sm-4">
			<select class="chosen-select" id="form-field-select-3" name="detail_categories_id">
				@foreach ($category as $data)
					<option value="{{ $data->id }}">{{ $data->name }}</option>
				@endforeach														
			</select>
		</div>
	</div> -->
	
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
		</div>
	</div>
</form>