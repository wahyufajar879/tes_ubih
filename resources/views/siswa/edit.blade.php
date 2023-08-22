@extends('layouts.headers')

@section('konten')
<form action="{{ url('siswa/'.$data->nim) }}" method="post">
    @csrf
    @method('PUT')
<div class="col-sm-12">
    <div class="card">
       <div class="card-body">
       <div class="card-title">Tambah Siswa</div>
       <hr>
       <a href="{{ url('siswa') }}" class="btn btn-secondary"><< Kembali</a>
       <br>
       <br>
        <form>
       <div class="form-group">
        <label for="input-6">NIM</label>
        {{ $data->nim }}
       </div>
       <div class="form-group">
        <label for="input-7">Nama</label>
        <input type="text" class="form-control form-control-rounded" value="{{ Session::get('nama') }}" name="nama" id="nama" placeholder="Masukkan Nama">
        @error('nama')
        <span class="text-danger">{{ $message }}</span>
        @enderror
       </div>
       <div class="form-group">
        <label for="input-8">Tanggal Lahir</label>
        <input type="date" class="form-control form-control-rounded" value="{{ Session::get('tanggal_lahir') }}" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
        @error('tanggal_lahir')
        <span class="text-danger">{{ $message }}</span>
        @enderror
       </div>
       <div class="form-group">
           <label for="input-10">Alamat</label>
           <input type="text" class="form-control form-control-rounded" value="{{ Session::get('alamat') }}" id="alamat" name="alamat" placeholder="Masukkan Alamat">
           @error('alamat')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-group">
            <label for="input-9">Jenis Kelamin</label>
            <div>
         <div>
         <input type="radio" name="id_jeniskelamin" value="1" @if(Session::get('jenis_kelamin') === 'Laki-Laki') checked @endif> Laki-Laki
         <input type="radio" name="id_jeniskelamin" value="2" @if(Session::get('jenis_kelamin') === 'Perempuan') checked @endif> Perempuan
         </div>
        </div>
        <br><br>
       <div class="form-group">
        <button type="submit" class="btn btn-light btn-round px-5"><i class="zmdi zmdi-vimeo"></i></i> Update</button>
      </div>
      </form>
     </div>
     </div>
  </div>
</form>
@endsection
