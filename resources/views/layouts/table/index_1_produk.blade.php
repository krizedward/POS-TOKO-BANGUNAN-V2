<div data-step="3" data-intro="Langkah 3: data produk yang masuk akan tampil di tabel ini">
  <div class="table-header">
    Tabel Data Untuk Produk Barang Toko
  </div>
  <!-- div.table-responsive -->

  <!-- div.dataTables_borderWrap -->
  <div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Modal</th>
          <th>Satuan</th>
          <th>Tanggal (Untuk Harga)</th>
          <th>Harga Toko</th>
          <th>Harga Jual Eceran</th>
          <th>Harga Lusin</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @php
        $no = 1
        @endphp
        @foreach($data as $d)
        <tr>
          <td>
            {{$no++}}
          </td>
          <td>{{ $d->nama }}</td>
          <td>Rp. {{ number_format ($d->harga_umum->harga_modal) }}</td>
          <td>{{ $d->harga_umum->stok->satuan->nama }}</td>
          <td>23 Juni 2023</td>
          
          <td>Rp. {{ number_format ($d->harga_umum->harga_jual) }}</td>
          <td>0</td>
          <td>0</td>
          <!-- <td>Rp. {{ number_format ($d->modal) }}</td> -->
          <!-- <td class="hidden-480">
                <span class="label label-sm label-info">Tersedia</span>
            </td> -->
          <td>
            <div class="hidden-sm hidden-xs action-buttons">
              <a href="{{ route('produk.show',[$d->id]) }}">
                <span class="label label-sm label-primary">Detail</span>
              </a>
              <a href="{{ route('produk.edit',[$d->id]) }}">
                <span class="label label-sm label-warning">Edit</span>
              </a>

              <a href="#" onclick="hapusAlert(event)">
                <span class="label label-sm label-danger">Delete</span>
              </a>
            </div>
            <form id="delete" action="{{ route('produk.destroy',[$d->id]) }}" method="POST" style="display: none;">
              @method('DELETE')
              @csrf
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- membuat isi dari konten -->
</div>
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