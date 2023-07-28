<!-- PAGE CONTENT BEGINS -->
<div class="row">
  <div class="col-xs-12">
    <table id="simple-table" class="table  table-bordered table-hover"
      data-step="3" 
      data-intro="Langkah 3: tabel ini untuk menampilkan data produk">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Kategori Produk</th>
          <th>Harga Modal</th>
          <th>Harga Ecer</th>
          <th>Harga Toko</th>
          <th>Harga Lusin</th>
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
          <td>{{ $d->kategori->nama }}</td>
          @foreach($modal as $modalItem)
          <td>
            Rp. {{ number_format ($modalItem->harga) }}
          </td>
          @endforeach
          @foreach($ecer as $ecerItem)
          <td>
            Rp. {{ number_format ($ecerItem->harga) }}
          </td>
          @endforeach
          @foreach($toko as $tokoItem)
          <td>
            Rp. {{ number_format ($tokoItem->harga) }}
          </td>
          @endforeach
          @foreach($lusin as $lusinItem)
          <td>
            Rp. {{ number_format ($lusinItem->harga) }}
          </td>
          @endforeach
          <!-- menampilkan one to many -->
          <!-- <td class="hidden-480">3,330</td>
          <td>Feb 12</td>

          <td class="hidden-480">
            <span class="label label-sm label-warning">Expiring</span>
          </td> -->

          <td>
            <div class="hidden-sm hidden-xs btn-group">
              <!-- <button class="btn btn-xs btn-success">
                <i class="ace-icon fa fa-check bigger-120"></i>
              </button> -->

              <a href="{{ route('produk.show',[$d->id]) }}" class="btn btn-xs btn-info"
                data-step="4" data-intro="Langkah 4: Pilih tombol untuk detail produk">
                <i class="ace-icon fa fa-eye bigger-120"></i>
              </a>

              <a href="{{ route('produk.edit',[$d->id]) }}" class="btn btn-xs btn-warning"
                data-step="5" data-intro="Langkah 5: Pilih tombol untuk edit produk">
                <i class="ace-icon fa fa-pencil bigger-120"></i>
              </a>

              <a href="#" onclick="hapusAlert(event)" class="btn btn-xs btn-danger"
                data-step="6" data-intro="Langkah 6: Pilih tombol untuk hapus produk">
                <i class="ace-icon fa fa-trash-o bigger-120"></i>
              </a>
              <form id="delete" action="{{ route('produk.destroy',[$d->id]) }}" method="POST" style="display: none;">
                @method('DELETE')
                @csrf
              </form>
            </div>

            <div class="hidden-md hidden-lg">
              <div class="inline pos-rel">
                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                  <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                </button>

                <ul
                  class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                  <li>
                    <a href="{{ route('produk.show',[$d->id]) }}" class="tooltip-info" data-rel="tooltip" title="View">
                      <span class="blue">
                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="{{ route('produk.edit',[$d->id]) }}" class="tooltip-success" data-rel="tooltip"
                      title="Edit">
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
                    <form id="delete" action="{{ route('produk.destroy',[$d->id]) }}" method="POST"
                      style="display: none;">
                      @method('DELETE')
                      @csrf
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </td>
        </tr>

        <tr class="detail-row">
          <td colspan="8">
            <div class="table-detail">
              <div class="row">
                <div class="col-xs-12 col-sm-2">
                  <div class="text-center">
                    <img height="150" class="thumbnail inline no-margin-bottom" alt="produk-foto"
                      src="{{ $d->gambar->path ?? 'no-image.jpg' }}" />
                  </div>
                </div><!-- gambar produk -->

                <div class="col-xs-12 col-sm-3">
                  <div class="space visible-xs"></div>

                  <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                      <div class="profile-info-name"> Nama Produk </div>

                      <div class="profile-info-value">
                        <span>{{ $d->nama }}</span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Satuan Produk </div>

                      <div class="profile-info-value">
                        <span>{{ $d->satuan->nama }}</span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> P. Kategori </div>

                      <div class="profile-info-value">
                        <span>{{ $d->kategori->nama }}</span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Stok Produk </div>

                      <div class="profile-info-value">
                        <span>
                          @foreach($stok as $stokItem)
                          {{ $stokItem->jumlah; }}
                          @endforeach
                        </span>
                      </div>
                    </div>

                  </div>
                </div><!-- tabel kiri -->

                <div class="col-xs-12 col-sm-4">
                  <div class="space visible-xs"></div>

                  <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                      <div class="profile-info-name"> Suplier Produk </div>

                      <div class="profile-info-value">
                        <span>Tidak Ada Data</span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Sales Produk </div>

                      <div class="profile-info-value">
                        <span>Tidak Ada Data</span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Kode Produk </div>

                      <div class="profile-info-value">
                        <span>{{ $d->kode_id }}-{{ $d->kode_nomor}}</span>
                      </div>
                    </div>

                  </div>
                </div><!-- tabel kanan -->

                <div class="col-xs-12 col-sm-3">
                  <div class="space visible-xs"></div>
                  <h4 class="header blue lighter less-margin">Update Foto Produk</h4>

                  <div class="space-6"></div>

                  <form id="form2" action="{{ route('produk.gambar.update',[$d->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="file" class="form-control-file" id="gambar" name="gambar">

                    <div class="hr hr-dotted"></div>

                    <div class="clearfix">
                      <button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="submit">
                        Submit
                        <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                      </button>
                    </div>
                  </form>

                  <!-- <form id="form2" action="{{ route('produk.gambar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Gambar</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                        @error('gambar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload Gambar</button>
                  </form> -->
                </div>
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
  </div><!-- /.span -->
</div><!-- /.row -->

<div class="row" style="display: none;">
  <div class="col-xs-12">
    <h3 class="header smaller lighter blue">jQuery dataTables</h3>

    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div>
    <div class="table-header">
      Results for "Latest Registered Domains"
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
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
          </tr>
        </thead>

        <tbody>
          <tr>
            <td class="center">
              <label class="pos-rel">
                <input type="checkbox" class="ace" />
                <span class="lbl"></span>
              </label>
            </td>

            <td>
              <a href="#">app.com</a>
            </td>
            <td>$45</td>
            <td class="hidden-480">3,330</td>
            <td>Feb 12</td>

            <td class="hidden-480">
              <span class="label label-sm label-warning">Expiring</span>
            </td>

            <td>
              <div class="hidden-sm hidden-xs action-buttons">
                <a class="blue" href="#">
                  <i class="ace-icon fa fa-search-plus bigger-130"></i>
                </a>

                <a class="green" href="#">
                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>

                <a class="red" href="#">
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
                      <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                        <span class="blue">
                          <i class="ace-icon fa fa-search-plus bigger-120"></i>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                        <span class="green">
                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                        <span class="red">
                          <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>

<!-- PAGE CONTENT ENDS -->