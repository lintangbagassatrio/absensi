<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelolapenjadwalan;
use App\Models\kelolapelajaran;
use App\Models\kelolakelas;
use App\Models\kelolaguru;
use App\Models\kelolajurusan;


class kelolapenjadwalanController extends Controller
{
    public function kelolapenjadwalan(){
        // $jadwal = kelolapenjadwalan::All();
        $pelajaran = kelolapelajaran::All();
        $kelas = kelolakelas::All();
        $guru = kelolaguru::All();
        $jurusan = kelolajurusan::All();
        $jadwal = kelolapenjadwalan::join('kelolapelajarans','kelolapelajarans.id', '=', 'kelolapenjadwalans.kode_mata_pelajaran')
        ->join('kelolakelas', 'kelolakelas.id', '=', 'kelolapenjadwalans.idkelas')
        ->join('kelolagurus', 'kelolagurus.id', '=', 'kelolapenjadwalans.guru')
        ->join('kelolajurusans', 'kelolajurusans.id', '=','kelolapenjadwalans.jurusan')
        ->get();
        
        return view('kelolapenjadwalan', compact('jadwal','pelajaran','kelas','guru','jurusan'));
    }
    public function tambah(Request $req)
    {

        $jadwal = new kelolapenjadwalan;
        $jadwal->kode_mata_pelajaran = $req->get('kode_mata_pelajaran');
        $jadwal->mata_pelajaran = $req->get('mata_pelajaran');
        $jadwal->idkelas = $req->get('idkelas');
        $jadwal->guru = $req->get('guru');
        $jadwal->jurusan = $req->get('jurusan');
        $jadwal->tanggal = $req->get('tanggal');
        $jadwal->waktu = $req->get('waktu');

        $jadwal->save();

        $notification = array(
            'massage' => 'jadwal berhasil di tambahkan','alert-type'=> 'success'
        );
        return redirect()->route('jadwal')->with($notification);
    }
    public function edit(Request $req)
    {
        $jadwal = kelolapenjadwalan::find($req->get('id'));

        $validate = $req->validate([
            'kode_mata_pelajaran' => 'required|max:255',
            'mata_pelajaran' => 'required',
            'idkelas' => 'required',
            'guru' => 'required',
            'jurusan' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
        ]);

        $jadwal->kode_mata_pelajaran = $req->get('kode_mata_pelajaran');
        $jadwal->mata_pelajaran = $req->get('mata_pelajaran');
        $jadwal->idkelas = $req->get('idkelas');
        $jadwal->guru = $req->get('guru');
        $jadwal->jurusan = $req->get('jurusan');
        $jadwal->tanggal = $req->get('tanggal');
        $jadwal->waktu = $req->get('waktu');
        // $kelolasiswa->roles_id = 2 ;

        $jadwal->save();

        $notification = array(
            'message' => 'Data User berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('jadwal')->with($notification);
    }
    public function hapus($id)
    {
        $kelolapenjadwalan = kelolapenjadwalan::find($id);
        $kelolapenjadwalan->delete();

        $notification = array(
            'message' => 'Data User berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('jadwal')->with($notification);
    }
    public function getDatapenjadwalan($id){

        $kelolapenjadwalan = kelolapenjadwalan::find($id);

        return response()->json($kelolapenjadwalan);
    }
}
