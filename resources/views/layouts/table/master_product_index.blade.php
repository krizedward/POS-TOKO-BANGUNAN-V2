<div class="table-header">
	Tabel data untuk master barang
</div>
<!-- div.table-responsive -->

<!-- div.dataTables_borderWrap -->
<div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<td class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</td>
				<th>No</th>
				<th>Nama</th>
				<th>Harga Beli</th>
				<th>Harga Jual</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@php
				$no = 1
			@endphp
			@foreach($list_barang as $data)
				<tr>
					<td class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace" />
							<span class="lbl"></span>
						</label>
					</td>
					<td>
						{{$no++}}
					</td>
					<td>{{ $data->name }}</td>
					<td>Rp. {{ number_format ($data->buy_price) }}</td>
					<td>Rp. {{ number_format ($data->sell_price) }}</td>
                    <td class="hidden-480">
                        <span class="label label-sm label-info">Tersedia</span>
                    </td>
                    <td>
                        <div class="hidden-sm hidden-xs action-buttons">
                            <a href="{{ route('owner.product.show',['master', Crypt::encrypt($data->id)] ) }}">
                                <span class="label label-sm label-success">Detail</span>
                            </a>
                            <a href="{{ route('owner.product.edit',['master', Crypt::encrypt($data->id)] ) }}">
                                <span class="label label-sm label-warning">Edit</span>
                            </a>
                            <a href="{{ route('owner.product.destroy',['master', Crypt::encrypt($data->id)] ) }}"
                                onclick="event.preventDefault();
                                    document.getElementById('delete').submit();">
                                <span class="label label-sm label-danger">Delete</span>
                            </a>
                            <form id="delete" action="{{ route('owner.product.destroy',['master', Crypt::encrypt($data->id)] ) }}" method="POST" style="display: none;">
                                @method('DELETE')    
                                @csrf
                            </form>
                        </div>
                    </td>
			    </tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Dokumentasi -->

@section('version_01')
    <div class="table-header">
        Results for "Latest Registered Domains"
    </div>
    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td class="center">
                        <label class="pos-rel">
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                        </label>
                    </td>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1
                @endphp
                @foreach($list_barang as $data)
                    <tr>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td>
                            {{$no++}}
                        </td>
                        <td>{{ $data->name }}</td>
                        <td>Rp. {{ number_format ($data->buy_price) }}</td>
                        <td>Rp. {{ number_format ($data->sell_price) }}</td>
                        <td class="hidden-480">
                            <span class="label label-sm label-info">Tersedia</span>
                        </td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a href="{{ route('owner.product.show',['master', Crypt::encrypt($data->id)] ) }}">
                                    <span class="label label-sm label-success">Detail</span>
                                </a>
                                <a href="{{ route('owner.product.edit',['master', Crypt::encrypt($data->id)] ) }}">
                                    <span class="label label-sm label-warning">Edit</span>
                                </a>
                                <a href="{{ route('owner.product.destroy',['master', Crypt::encrypt($data->id)] ) }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('delete').submit();">
                                    <span class="label label-sm label-danger">Delete</span>
                                </a>
                                <form id="delete" action="{{ route('owner.product.destroy',['master', Crypt::encrypt($data->id)] ) }}" method="POST" style="display: none;">
                                    @method('DELETE')    
                                    @csrf
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection