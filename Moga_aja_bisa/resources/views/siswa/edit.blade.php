@extends('layout.template')
@section('konten')
 <div class="my-3 bg-body shadow-sm card-border-0">
    <div class="card-header">
        <a href="{{url('siswa')}}" class="btn btn-warning btn-sm">
        <i class="fa-solid fa-chevron-left">
        <span>Kembali</span>
        </i>
        </a>
 <!-- START FORM -->  
 <form action="{{url('siswa/'.$data->nis)}}"  class="col" method="POST" enctype="multipart/form-data">   
    @csrf 
    @method('PUT') 
    <div class="my-3 p-3 bg-body rounded shadow-sm">    
      <div class="mb-3 row">
    <label for="nis" class="col-form-label">Nis</label>
     <div class="col-sm-10"> 
    <input type="number" class="form-control" name="nis" value="{{$data->nis}}" id="nis"> 
       </div>  
     </div>
    <div class="mb-3 row">
        <label for="nama" class="col-form-label">Nama</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nama" value="{{$data->nama}}" id="nama">
        </div>  
    </div> 
    <div class="mb-3 row">
        <label for="jurusan" class="col-form-label">Jurusan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="jurusan" value="{{$data->jurusan}}" id="jurusan"> 
        </div>   
    </div>
    <div class="mb-3 row">
        <label for="kelas" class="col-form-label">Kelas</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="kelas" value="{{$data->kelas}}" id="kelas">   
        </div>   
    </div> 
    {{-- <div class="mb-3 row">
        <label for="foto" class="col-form-label">Foto</label> 
        <div class="col-sm-10">
        <input type="file" class="form-control" name="foto" id="foto" accept="foto/*" onchange="document.getElementById('output').src= window.URL.createObjekURL(this.files[0])">   
        </div> 
    </div> --}}
    {{-- <div class="row">
        <label for="" class="col-sm-3"></label> 
        <div class="col-sm-10">
          <img src="{{('fotosiswa/'.$data->foto)}}" id="output" width="200">  
      </div>  
      </div>  --}}
    <div class="mb-3 row">
        <label for="" class="col-form-label"></label>  
        <div class="col-sm-10">   
         <input type="submit"  class="btn btn-primary" name="submit" value="simpan"> 
        </div>
    </div>
    </div>
</div> 
</div> 
    @endsection 
</form>
<!-- AKHIR FORM -->     
