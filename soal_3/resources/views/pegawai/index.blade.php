@extends('layout.main')
@section('content')

@if(session()->has('success'))
  <div class="row-md-5">
      <div class="alert alert-success">
      <center>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
          &times;
          </button>
          <strong>Succes</strong>
          {{ session()->get('success') }}
      </center>
      </div>
  </div>
  @endif

<div class="mt-3">
   <a href="{{ route('pegawai.create') }}" class="btn btn-success">+ Tambah Pegawai</a> 
</div>
<div class="table-responsive mt-3">
  <table class="table table-hover table-responsive" id="myTable">
      <thead>
          <tr>
              <th scope="col">No</th>
              <th scope="col">Foto</th>
              <th scope="col">Nama</th>
              <th scope="col">Umur</th>
              <th scope="col">Alamat</th>
              <th scope="col">Aksi</th>
          </tr>
      </thead>
      <tbody>
          @php
              $no=1;
          @endphp
          @foreach ($pegawai as $item)
          <tr>
              <td>{{ $no++ }}</td>
              <td>
                <img src="{{ asset('storage/foto/'. $item->foto) }}" width="100px" >
              </td>
              <td>{{ $item->pegawai_nama }}</td>
              <td>{{ $item->pegawai_umur }}</td>
              <td>{{ $item->pegawai_alamat }}</td>
              <td>
                  <a class="btn btn-warning btn-sm btn-rounded" href="{{ route('pegawai.edit', $item->pegawai_id) }}">Edit</a>
                  <a class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Apakah yakin ingin menghapus data?')" href="{{ route('pegawai.destroy', $item->pegawai_id) }}">Edit</a>
                  
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>


</div>
@endsection