<!-- PAGE CONTENT BEGINS -->
<div class="row">
  <div class="col-sm-12">
    <div class="widget-box">

      <div class="widget-header widget-header-flat widget-header-small">
        <h5 class="widget-title">Tabel Master Satuan</h5>
      </div>

      <div class="widget-body">
        <div class="widget-main">
          <table class="table  table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $d)
              <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->keterangan }}</td>
                <td>
                  <div class="hidden-sm hidden-xs btn-group">
                    <!-- <button class="btn btn-xs btn-success">
                      <i class="ace-icon fa fa-check bigger-120"></i>
                    </button> -->

                    <!-- <a href="{{ route('master-kategori-barang.show',[$d->id]) }}" class="btn btn-xs btn-info"
                      data-step="4" data-intro="Langkah 4: Pilih tombol untuk detail master-kategori-barang">
                      <i class="ace-icon fa fa-eye bigger-120"></i>
                    </a> -->

                    <a href="{{ route('master-satuan-barang.edit',[$d->id]) }}" class="btn btn-xs btn-warning"
                      data-step="5" data-intro="Langkah 5: Pilih tombol untuk edit master-kategori-barang">
                      <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </a>

                    <a href="#" onclick="hapusAlert(event, '{{ $d->id }}')" class="btn btn-xs btn-danger" data-step="6"
                      data-intro="Langkah 6: Pilih tombol untuk hapus master-kategori-barang">
                      <i class="ace-icon fa fa-trash-o bigger-120"></i>
                    </a>
                    <form id="form-hapus-{{ $d->id }}" action="{{ route('master-satuan-barang.destroy',[$d->id]) }}" method="POST"
                      style="display: none;">
                      @method('DELETE')
                      @csrf
                    </form>
                  </div>

                  <div class="hidden-md hidden-lg">
                    <div class="inline pos-rel">
                      <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown"
                        data-position="auto">
                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                      </button>

                      <ul
                        class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                        <!-- <li>
                          <a href="{{ route('master-kategori-barang.show',[$d->id]) }}" class="tooltip-info"
                            data-rel="tooltip" title="View">
                            <span class="blue">
                              <i class="ace-icon fa fa-search-plus bigger-120"></i>
                            </span>
                          </a>
                        </li> -->

                        <li>
                          <a href="{{ route('master-satuan-barang.edit',[$d->id]) }}" class="tooltip-success"
                            data-rel="tooltip" title="Edit">
                            <span class="green">
                              <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                            </span>
                          </a>
                        </li>

                        <li>
                          <a href="#" onclick="hapusAlert(event, '{{ $d->id }}')" class="tooltip-error" data-rel="tooltip"
                            title="Delete">
                            <span class="red">
                              <i class="ace-icon fa fa-trash-o bigger-120"></i>
                            </span>
                          </a>
                          <form id="form-hapus-{{ $d->id }}" action="{{ route('master-satuan-barang.destroy',[$d->id]) }}"
                            method="POST" style="display: none;">
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
                function hapusAlert(event,id) {
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
                      const form = document.getElementById('form-hapus-' + id);
                      if (form) {
                        form.submit();
                      } else {
                        console.error("Form not found for ID:", id);
                      }
                    }
                  })
                }
              </script>
              @endforeach
            </tbody>
          </table>
        </div><!-- /.widget-main -->
      </div><!-- /.widget-body -->

    </div><!-- /.widget-box -->
  </div><!-- /.col -->
</div>
<!-- PAGE CONTENT ENDS -->