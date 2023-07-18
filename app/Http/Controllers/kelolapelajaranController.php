<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelolapelajaran;

class kelolapelajaranController extends Controller
{
    public function kelolapelajaran(){
        $pelajaran = kelolapelajaran::All();

        return view('kelolapelajaran', compact('pelajaran'));
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

        $pelajaran = new kelolapelajaran;
        $pelajaran->kode_mata_pelajaran = $req->get('kode_mata_pelajaran');
        $pelajaran->mata_pelajaran = $req->get('mata_pelajaran');
        $pelajaran->guru = $req->get('guru');

        $pelajaran->save();

        $notification = array(
            'massage' => 'Data siswa berhasil di tambahkan','alert-type'=> 'success'
        );
        return redirect()->route('pelajaran')->with($notification);
    }
    public function hapus($id)
    {
        $kelolapelajaran = kelolapelajaran::find($id);
        $kelolapelajaran->delete();

        $notification = array(
            'message' => 'Data User berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('pelajaran')->with($notification);
    }
    public function getDatapelajaran($id){

        $kelolapelajaran = kelolapelajaran::find($id);

        return response()->json($kelolapelajaran);
    }
    public function edit(Request $req)
    {
        $kelolapelajaran = kelolapelajaran::find($req->get('id'));

        $validate = $req->validate([
            'kode_mata_pelajaran' => 'required|max:255',
            'mata_pelajaran' => 'required',
            'guru' => 'required',
        ]);

        $kelolapelajaran->kode_mata_pelajaran = $req->get('kode_mata_pelajaran');
        $kelolapelajaran->mata_pelajaran = $req->get('mata_pelajaran');
        $kelolapelajaran->guru= $req->get('guru');
        // $kelolasiswa->roles_id = 2 ;

        $kelolapelajaran->save();

        $notification = array(
            'message' => 'Data User berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('pelajaran')->with($notification);
    }
}
