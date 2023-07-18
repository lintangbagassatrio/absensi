<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelolapenjadwalan extends Model
{
    use HasFactory;
    public static function getDataUser(){

        $kelolapenjadwalan = kelolapenjadwalan::all();

        $kelolapenjadwalan_filter = [];

        $no = 1;

        for($i = 0; $i < $kelolapenjadwalan->count(); $i++){
            $kelolapenjadwalan_filter[$i]['kode_mata_pelajaran'] = $kode_mata_pelajaran++ ;
            $kelolapenjadwalan_filter[$i]['mata_pelajaran'] = $kelolapenjadwalan[$i]->mata_pelajaran ;
            $kelolapenjadwalan_filter[$i]['idkelas'] = $kelolapenjadwalan[$i]->idkelas ;
            $kelolapenjadwalan_filter[$i]['guru'] = $kelolapenjadwalan[$i]->guru ;
            $kelolapenjadwalan_filter[$i]['jurusan'] = $kelolapenjadwalan[$i]->jurusan ;
            $kelolapenjadwalan_filter[$i]['tanggal'] = $kelolapenjadwalan[$i]->tanggal ;
            $kelolapenjadwalan_filter[$i]['waktu'] = $kelolapenjadwalan[$i]->waktu ;
        }

        return $kelolapenjadwalan_filter;
    }
}
