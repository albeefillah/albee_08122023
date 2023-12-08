@extends('layout.main')
@section('content')
<div class="card mt-3">
    <div class="card-header text-center bg-primary">
        <h3 class="fw-bold">Form Edit Pegawai</h3>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('pegawai.update', $pegawai->pegawai_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="pegawai_nama" class="form-label">Nama Pegawai</label>
                <input type="text" name="pegawai_nama" id="pegawai_nama" class="form-control" value={{ $pegawai->pegawai_nama }}>
            </div>
            
            <div class="mb-3">
                <label for="pegawai_umur" class="form-label">Umur Pegawai</label>
                <input type="number" name="pegawai_umur" id="pegawai_umur" class="form-control" value={{ $pegawai->pegawai_umur }}>
            </div>
            <div class="mb-3">
                <label for="pegawai_alamat" class="form-label">Pegawai Alamat</label>
                <textarea class="form-control" name="pegawai_alamat"  id="pegawai_alamat" rows="3">{{ $pegawai->pegawai_alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">

                <small><i>*jika foto tidak diubah maka tidak perlu di isi.</i></small>
            </div>
            <button type="submit" class="btn btn-success" >Simpan</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-danger">Kembali</a>
       </form>
    </div>
</div>


</div>
@endsection