<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelolasiswa;

class kelolasiswaController extends Controller
{
    public function kelolasiswa(){
        $siswa = kelolasiswa::All();

        return view('kelolasiswa', compact('siswa'));
    }
    public function tambah(Request $req)
    {
        // $validate = $req->validasi([
        //     'nomor_induk' => 'required|max:255',
        //     'nisn' => 'required',
        //     'nama_siswa' => 'required',
        //     'kelas' => 'required',
        //     'jurusan' => 'required',
        // ]);

        $kelola = new kelolasiswa;
        $kelola->nomer_induk = $req->get('nomer_induk');
        $kelola->nisn = $req->get('nisn');
        $kelola->nama_siswa = $req->get('nama_siswa');
        $kelola->idkelas = $req->get('idkelas');
        $kelola->jurusan = $req->get('jurusan');

        $kelola->save();

        $notification = array(
            'massage' => 'Data siswa berhasil di tambahkan','alert-type'=> 'success'
        );
        return redirect()->route('kelola')->with($notification);
    }
    public function hapus($id)
    {
        $kelolasiswa = kelolasiswa::find($id);
        $kelolasiswa->delete();

        $notification = array(
            'message' => 'Data User berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('kelola')->with($notification);
    }
    public function getDatasiswa($id){

        $kelolasiswa = kelolasiswa::find($id);

        return response()->json($kelolasiswa);
    }
    public function edit(Request $req)
    {
        $kelolasiswa = kelolasiswa::find($req->get('id'));

        $validate = $req->validate([
            'nomer_induk' => 'required|max:255',
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'idkelas' => 'required',
            'jurusan' => 'required',
        ]);

        $kelolasiswa->nomer_induk = $req->get('nomer_induk');
        $kelolasiswa->nisn = $req->get('nisn');
        $kelolasiswa->nama_siswa = $req->get('nama_siswa');
        $kelolasiswa->idkelas = $req->get('idkelas');
        $kelolasiswa->jurusan = $req->get('jurusan');
        // $kelolasiswa->roles_id = 2 ;

        $kelolasiswa->save();

        $notification = array(
            'message' => 'Data User berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('kelola')->with($notification);
    }
}
