<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelolakelas;
use App\Models\kelolajurusan;

class kelolakelasController extends Controller
{
    public function kelolakelas(){
        $kelas = kelolakelas::All();
        $jurusan = kelolajurusan::All();
        return view('kelolakelas', compact('kelas','jurusan'));
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

        $kelas = new kelolakelas;
        $kelas->idkelas = $req->get('idkelas');
        $kelas->kelas = $req->get('kelas');
        $kelas->jurusan = $req->get('jurusan');
        $kelas->walikelas = $req->get('walikelas');

        $kelas->save();

        $notification = array(
            'massage' => 'Data siswa berhasil di tambahkan','alert-type'=> 'success'
        );
        return redirect()->route('kelas')->with($notification);
    }
    public function hapus($id)
    {
        $kelas = kelolakelas::find($id);
        $kelas->delete();

        $notification = array(
            'message' => 'Data User berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('kelas')->with($notification);
    }
    public function getDatakelas($id){

        $kelolakelas= kelolakelas::find($id);

        return response()->json($kelolakelas);
    }
    public function edit(Request $req)
    {
        $kelolakelas = kelolakelas::find($req->get('id'));

        $validate = $req->validate([
            'idkelas' => 'required|max:255',
            'kelas' => 'required',
            'jurusan' => 'required',
            'walikelas' => 'required',
        ]);

        $kelolakelas->idkelas = $req->get('idkelas');
        $kelolakelas->kelas = $req->get('kelas');
        $kelolakelas->jurusan = $req->get('jurusan');
        $kelolakelas->walikelas = $req->get('walikelas');
        
        // $kelolasiswa->roles_id = 2 ;

        $kelolakelas->save();

        $notification = array(
            'message' => 'Data User berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('kelas')->with($notification);
    }
}
