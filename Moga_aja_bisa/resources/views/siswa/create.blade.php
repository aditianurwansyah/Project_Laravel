@extends('layout.template')
@section('konten')

<!-- START FORM -->
<form action="{{url('siswa')}}" method="POST" enctype="multipart/form-data"> 
    @csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm"> 
      <div class="mb-3 row">
    <label for="nis" class="col-form-label">Nis</label>
     <div class="col-sm-10"> 
    <input type="number" class="form-control" name="nis" value="{{Session::get('nis')}}" id="nis">
       </div>  
     </div>
    <div class="mb-3 row">
        <label for="nama" class="col-form-label">Nama</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nama" value="{{Session::get('nama')}}" id="nama">
        </div>  
    </div> 
    <div class="mb-3 row">
        <label for="jurusan" class="col-form-label">Jurusan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="jurusan" value="{{Session::get('jurusan')}}" id="jurusan"> 
        </div>   
    </div>
    <div class="mb-3 row">
        <label for="kelas" class="col-form-label">Kelas</label> 
        <div class="col-sm-10">
        <input type="text" class="form-control" name="kelas" value="{{Session::get('kelas')}}" id="kelas">  
        </div>   
    </div> 
    {{-- <div class="mb-3 row">
        <label for="foto" class="col-form-label">Foto</label> 
        <div class="col-sm-10">
        <input type="file" class="form-control" name="foto" id="foto">     
        </div>   
    </div> --}} 
    <div class="mb-3 row">
        <label for="simpan" class="col-form-label"></label> 
        <div class="col-sm-10"> 
        <button class="btn btn-primary" type="submit" name="submit">Simpan</button> 
        </div> 
    </div>      
    </div>
    </div>
</form>
<!-- AKHIR FORM --> 
@endsection