<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelolajurusan;

class kelolajurusanController extends Controller
{
    public function kelolajurusan(){
        $jurusan = kelolajurusan::All();

        return view('kelolajurusan', compact('jurusan'));
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

        $jurusan = new kelolajurusan;
        $jurusan->jurusan = $req->get('jurusan');
        $jurusan->namakaprog = $req->get('namakaprog');
       
        $jurusan->save();

        $notification = array(
            'massage' => 'Data siswa berhasil di tambahkan','alert-type'=> 'success'
        );
        return redirect()->route('jurusan')->with($notification);
    }
    public function hapus($id)
    {
        $kelolajurusan = kelolajurusan::find($id);
        $kelolajurusan->delete();

        $notification = array(
            'message' => 'Data User berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('jurusan')->with($notification);
    }
    public function getDataJurusan($id){

        $kelolajurusan = kelolajurusan::find($id);

        return response()->json($kelolajurusan);
    }
    public function edit(Request $req)
    {
        $kelolajurusan = kelolajurusan::find($req->get('id'));

        $validate = $req->validate([
            'jurusan' => 'required|max:255',
            'namakaprog' => 'required',
        ]);

        $kelolajurusan->jurusan = $req->get('jurusan');
        $kelolajurusan->namakaprog = $req->get('namakaprog');
       
        // $kelolasiswa->roles_id = 2 ;
        $kelolajurusan->save();

        $notification = array(
            'message' => 'Data User berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('jurusan')->with($notification);
    }
}
