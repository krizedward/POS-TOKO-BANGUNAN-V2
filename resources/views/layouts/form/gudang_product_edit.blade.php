<form class="form-horizontal" action="{{ route('owner.product.store','gudang') }}" method="post" enctype="multipart/form-data">
	@csrf
	@method('POST')
	<!-- nama barang -->
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1" place> Nama </label>
		<div class="col-xs-10 col-sm-4">
			<select class="chosen-select" id="form-field-select-3" data-placeholder="nama barang" name="product_masters_id">
				@foreach ($product as $data)
					<option value="{{ $data->id }}">{{ $data->name }}</option>
				@endforeach														
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah </label>
		<div class="col-sm-9">
			<input type="number" min="0" name="first_stock" id="form-field-1" placeholder="jumlah.." class="col-xs-10 col-sm-5" />
		</div>
	</div>
	<!-- kategori -->
	<!-- <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kategori </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="kategori" class="col-xs-10 col-sm-5" />
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
		</div>
	</div>
</form>