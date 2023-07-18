<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelolaguru;

class kelolaguruController extends Controller
{
    public function kelolaguru(){
        $guru = kelolaguru::All();

        return view('kelolaguru', compact('guru'));
    }
    public function tambah(Request $req)
    {

        $guru = new kelolaguru;
        $guru->nama_guru = $req->get('nama_guru');
        $guru->ttl = $req->get('ttl');
        $guru->nip = $req->get('nip');
        $guru->nuptk = $req->get('nuptk');
        $guru->nomor_nrg = $req->get('nomor_nrg');
        $guru->jenis_kelamin = $req->get('jenis_kelamin');
        $guru->agama = $req->get('agama');
        $guru->pendidikan_terakhir = $req->get('pendidikan_terakhir');
        $guru->jabatan = $req->get('jabatan');
        $guru->mata_pelajaran = $req->get('mata_pelajaran');

        $guru->save();

        $notification = array(
            'massage' => 'Data Guru berhasil di tambahkan','alert-type'=> 'success'
        );
        return redirect()->route('guru')->with($notification);
    }
    public function edit(Request $req)
    {
        $guru = kelolaguru::find($req->get('id'));

        $validate = $req->validate([
            'nama_guru' => 'required|max:255',
            'ttl' => 'required',
            'nip' => 'required',
            'nuptk' => 'required',
            'nomor_nrg' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pendidikan_terakhir' => 'required',
            'jabatan' => 'required',
            'mata_pelajaran' => 'required',
        ]);

        $guru->nama_guru = $req->get('nama_guru');
        $guru->ttl = $req->get('ttl');
        $guru->nip = $req->get('nip');
        $guru->nuptk = $req->get('nuptk');
        $guru->nomor_nrg = $req->get('nomor_nrg');
        $guru->jenis_kelamin = $req->get('jenis_kelamin');
        $guru->agama = $req->get('agama');
        $guru->pendidikan_terakhir = $req->get('pendidikan_terakhir');
        $guru->jabatan = $req->get('jabatan');
        $guru->mata_pelajaran = $req->get('mata_pelajaran');
        // $kelolasiswa->roles_id = 2 ;

        $guru->save();

        $notification = array(
            'message' => 'Data User berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('guru')->with($notification);
    }
    public function hapus($id)
    {
        $kelolaguru = kelolaguru::find($id);
        $kelolaguru->delete();

        $notification = array(
            'message' => 'Data User berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('guru')->with($notification);
    }
    public function getDataguru($id){

        $kelolaguru = kelolaguru::find($id);

        return response()->json($kelolaguru);
    }
}
