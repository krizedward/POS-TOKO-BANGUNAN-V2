<!-- PAGE CONTENT BEGINS -->

<div class="row" style="display: none;">
  <div class="col-xs-12">
    <table id="simple-table" class="table  table-bordered table-hover" data-step="3"
      data-intro="Langkah 3: tabel ini untuk menampilkan data barang">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Harga Modal</th>
          <!-- <th>Harga Lusin</th> -->
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        @php
        $no = 1
        @endphp
        @foreach($data as $d)
        @php
        $stok = $d->stok;
        $ecer = $d->ecer;
        $modal = $d->modal;
        $toko = $d->toko;
        $lusin = $d->lusin;
        @endphp
        <tr>
          <td class="center">
            <div class="action-buttons">
              <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                <i class="ace-icon fa fa-angle-double-down"></i>
                <span class="sr-only">Details</span>
              </a>
            </div>
          </td>
          <td>{{ $d->nama }}</td>
          <td>
            Rp. {{ number_format (0) }}
          </td>

          <!-- menampilkan one to many -->
          <!-- <td class="hidden-480">3,330</td>
          <td>Feb 12</td>

          <td class="hidden-480">
            <span class="label label-sm label-warning">Expiring</span>
          </td> -->

        </tr>

        @endforeach
      </tbody>
    </table>
  </div><!-- /.span -->
</div><!-- /.row -->

<div class="row">
  <div class="col-xs-12">
    <!-- <h3 class="header smaller lighter blue">jQuery dataTables</h3> -->

    <!-- <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div> -->
    <div class="table-header">
      Tabel Master Barang
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <!-- <tr>
            <th class="center">
              <label class="pos-rel">
                <input type="checkbox" class="ace" />
                <span class="lbl"></span>
              </label>
            </th>
            <th>Domain</th>
            <th>Price</th>
            <th class="hidden-480">Clicks</th>

            <th>
              <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
              Update
            </th>
            <th class="hidden-480">Status</th>

            <th></th>
          </tr> -->
          <tr>
            <th class="center">No</th>
            <th>Nama</th>
            <th>None</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Id Barang</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @php
          $no = 1
          @endphp

          @foreach($data as $d)
          @php
          $stok = $d->stok;
          $ecer = $d->ecer;
          $modal = $d->modal;
          $toko = $d->toko;
          $lusin = $d->lusin;
          @endphp
          <tr>
            <td class="center">{{ $no++ }}</td>
            <td>{{ $d->nama }}</td>
            <td>none</td>
            <td>{{ $d->kategori->nama }}</td>
            <td>{{ $d->keterangan }}</td>
            <td>{{ $d->id }}</td>
            <td>
              <div class="hidden-sm hidden-xs action-buttons">
                <a class="blue" href="{{ route('master-barang.show',[$d->id]) }}">
                  <i class="ace-icon fa fa-search-plus bigger-130"></i>
                </a>

                <a class="green" href="{{ route('master-barang.edit',[$d->id]) }}">
                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>

                <a class="red" href="#" onclick="hapusAlert(event)">
                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a>
              </div>

              <div class="hidden-md hidden-lg">
                <div class="inline pos-rel">
                  <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                  </button>

                  <ul
                    class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                    <li>
                      <a href="{{ route('master-barang.show',[$d->id]) }}" class="tooltip-info" data-rel="tooltip" title="View">
                        <span class="blue">
                          <i class="ace-icon fa fa-search-plus bigger-120"></i>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a href="{{ route('master-barang.edit',[$d->id]) }}" class="tooltip-success" data-rel="tooltip" title="Edit">
                        <span class="green">
                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a href="#" onclick="hapusAlert(event)" class="tooltip-error" data-rel="tooltip" title="Delete">
                        <span class="red">
                          <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </span>
                      </a>
                      <form id="delete" action="{{ route('master-barang.destroy',[$d->id]) }}" method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                      </form>
                    </li>
                  </ul>

                </div>
              </div>
            </td>
          </tr>
          <script>
            function hapusAlert(event) {
              event.preventDefault();
              Swal.fire({
                title: 'Apa Anda Yakin?',
                text: "Mengahapus kategori Akan Berakibat Kehilangan Data!",
                type: 'warning',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus Data!',
                dangerMode: true,
              }).then((result) => {
                if (result.value) {
                  document.getElementById('delete').submit();
                }
              })
            }
          </script>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>

<!-- PAGE CONTENT ENDS -->