<table id="dynamic-table" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="center">No</th>
      <th>Nama</th>
      <th>Detail</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php
    $no = 1;
    @endphp
    @foreach($data as $d)
    @php
      $detail = $d->detail;
    @endphp
    <tr>
      <td class="center">
        {{$no++}}
      </td>
      <td>{{ $d->nama }}</td>
      <td>{{ $d->umum->nama }}</td>
      <td>
        <div class="hidden-sm hidden-xs action-buttons">
          <!-- <a href="#">
            <span class="label label-sm label-success">Detail</span>
          </a> -->
          <a href="#">
            <span class="label label-sm label-warning">Edit</span>
          </a>
          <a href="#" onclick="event.preventDefault();
                                  document.getElementById('delete').submit();">
            <span class="label label-sm label-danger">Delete</span>
          </a>
          <form id="delete" action="#" method="POST" style="display: none;">
            @method('DELETE')
            @csrf
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>