<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;  
use Illuminate\Support\Facades\Session; 
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)  
    {
        $katakunci = $request->katakunci; 
        $jumlahbaris = 4; 
         if (strlen($katakunci)) {
            $data = siswa::where('nis','like',"%$katakunci%")
            ->orWhere('nama','like',"%$katakunci%")
            ->orWhere('jurusan','like',"%$katakunci%")
            ->paginate($jumlahbaris);
         }else{
            $data = siswa::orderBy('nis','desc')->paginate($jumlahbaris);
         }
        return view('siswa.index')->with('data',$data); 
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  
    { 
        Session::flash('nis', $request->nis);
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('kelas', $request->kelas); 
        // Session::flash('foto', $request->foto);  

        $request->validate([  
         'nis' => 'required|numeric|unique:siswa,nis',  
         'nama' => 'required',
         'jurusan' => 'required',
         'kelas' => 'required', 
        //  'foto' > 'mimes:jpeg,png,jpg,gif,svg|max:2048', 
         ],[
            'nis.required' => 'nis harus diisi!',
            'nis.numeric'  => 'nis harus berupa angka!',
            'nis.unique'   => 'nis sudah ada!',
            'nama.required' => 'nama harus diisi!',
            'jurusan.required' => 'jurusan harus diisi!',
            'kelas.required' => 'kelas harus diisi!',   
        ]); 
        
        // $newname = 'default.png'; 

        // if ($request->file('foto')){ 
        //  $extension = $request->file('foto')->getClientOriginalExtension();
        //  $newname = $request->nis.'-'.now()->timestamp.'.'.$extension; 
        //  $request->file('foto')->move(public_path('fotosiswa'), $newname); 
        // }    
            

        $data = [
        'nis' => $request->nis,  
        'nama' => $request->nama,
        'jurusan' => $request->jurusan, 
        'kelas' => $request->kelas, 
        // 'foto' => $newname  
        ]; 

        siswa::create($data);
        return redirect()->to('siswa')->with('Success', 'DATA BERHASIL DISIMPAN!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = siswa::where('nis', $id)->first(); 
        return view('siswa.edit')->with('data', $data); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  
    {
        $request->validate([
            'nis' => 'required|numeric|unique:siswa,nis',   
            'nama' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            ],[ 
               'nis.required' => 'nis harus diisi', 
               'nis.numeric'  => 'nis harus berupa angka!',
               'nis.unique'   => 'nis sudah ada!',
               'nama.required' => 'nama harus diisi!',
               'jurusan.required' => 'jurusan harus diisi!',
               'kelas.required' => 'kelas harus diisi!', 
           ]); 
           
        //    $siswa = siswa::where('nis', $nis)->first(); 
           
        //      if ($request->file('foto')){
        //        if($siswa->foto != 'default.png') 
        //        unlink(public_path('fotosiswa/'). $siswa->foto); 
        //    } 
        //    $extension = $request->file('foto')->getClientOriginalExtension();
        //    $newname = $siswa->nis.'-'.now()->timestamp.'.'.$extension;
        //    $request->file('foto')->move(public_path('fotosiswa'), $newname);  
           
        //    Siswa::where('nis', $nis)->update([
        //     'foto' => $newname,  
        //  ]);
   
           $data = [
           'nis' => $request->nis,  
           'nama' => $request->nama,
           'jurusan'=> $request->jurusan,
           'kelas' => $request->kelas,
        //    'foto' => $request->foto,
        //    'foto' => $newname 
           ];  
   
           siswa::where('nis',$id)->update($data);  
           return redirect()->to('siswa')->with('Success', 'DATA BERHASIL DIPERBAHARUI!');  
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        siswa::where('nis',$id)->delete();  
        return redirect()->to('siswa')->with('Success', 'DATA BERHASIL DIHAPUS'); 
    }
}
?> 