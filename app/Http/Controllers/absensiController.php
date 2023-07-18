<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absensi;

class absensiController extends Controller
{
    public function absensi(){
        $absensi = absensi::All();

        return view('absensi', compact('absensi'));
    }
   // public function tambah(Request $req)
   // {
        // $validate = $req->validasi([
        //     'nomor_induk' => 'required|max:255',
        //     'nisn' => 'required',
        //     'nama_siswa' => 'required',
        //     'kelas' => 'required',
        //     'jurusan' => 'required',
        // ]);

       // $absensi = new absensi;
       // $absensi->nomer_induk = $req->get('nomer_induk');
       // $absensi->nisn = $req->get('nisn');
       // $absensi->nama_siswa = $req->get('nama_siswa');
       // $absensi->kelas = $req->get('kelas');
       // $ke->jurusan = $req->get('jurusan');

        //$kelola->save();

        //$notification = array(
            //'massage' => 'Data siswa berhasil di tambahkan','alert-type'=> 'success'
       // );
      //  return redirect()->route('kelola')->with($notification);
  //  }
}
