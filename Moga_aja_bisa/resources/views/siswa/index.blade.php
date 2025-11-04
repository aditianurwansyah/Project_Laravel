<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container">
    
    @extends('layout.template')
    @section('konten')
  <!-- START DATA --> 
 <div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCAHARIAN DATA --> 
    <div class="pb-3">
        <form action="{{url('siswa')}}" class="d-flex" method="GET">
        <input class="form-control me-1" type="search" name="katakunci" value="{{Request::get('katakunci')}}" placeholder="Masukan Kata Kunci" aria-label="search">
        <button class="btn btn-primary" type="submit">Cari</button> 
    </div> 
    <!-- Tambah Data -->
    <div class="pb-3">
        <a href="{{url('siswa/create')}}" class="btn btn-primary">+ TAMBAH DATA</a>  
    </div> 

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1 sort-asc">NO</th>
                <th class="col-md-1 sort-asc">NIS</th>
                <th class="col-md-1 sort-asc">NAMA</th>
                <th class="col-md-1 sort-asc">JURUSAN</th>
                <th class="col-md-1 sort-asc">KELAS</th>
                {{-- <th class="col-md-1 sort-asc">FOTO</th> --}}
                <th class="col-md-1 sort-asc">AKSI</th>   
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
             <tr>
                   <td>{{$i}}</td> 
                   <td>{{$item->nis}}</td>
                   <td>{{$item->nama}}</td>
                   <td>{{$item->jurusan}}</td>
                   <td>{{$item->kelas}}</td>
                   {{-- <td>
                    @if ($item->foto !='')
                     <img src="{{('fotosiswa/'.$item->foto)}}" width="100px">
                     @else 
                     <img src="{{('fotosiswa/default.png')}}" width="100">    
                    @endif    
                   </td> --}}
                   <td>
                   <a href="{{url('siswa/'.$item->nis.'/edit')}}" class="btn btn-warning btn-sm">EDIT</a>
                   <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{('siswa/'.$item->nis)}}" method="POST">
                   @csrf
                   @method('DELETE') 
                   <button type="submit" name="submit" class="btn btn-danger btn-sm">DELETE</a> 
                   </form>   
                   </td>    
            </tr>  
            <?php $i++?>  
            @endforeach
        </tbody>
    </table>
    {{$data->withQueryString()->links()}}   
</div> 
<!-- AKHIR DATA --> 
@endsection   
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html> 