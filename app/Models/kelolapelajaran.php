<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelolapelajaran extends Model
{
    use HasFactory;
    public static function getDataUser(){

        $kelolapelajaar = kelolapelajaran::all();

        $kelolapelajaran_filter = [];

        $no = 1;

        for($i = 0; $i < $kelolasiswa->count(); $i++){
            $kelolapelajaran_filter[$i]['kode_mata_pelajaran'] = $kode_mata_pelajaran++ ;
            $kelolapelajaran_filter[$i]['mata_pelajaran'] = $kelolapelajaran[$i]->mata_pelajaran ;
            $kelolapelajaran_filter[$i]['guru'] = $kelolapelajaran[$i]->guru;
        }

        return $kelolapelajaran_filter;
    }
}
