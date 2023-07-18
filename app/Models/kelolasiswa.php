<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelolasiswa extends Model
{
    use HasFactory;
    
    public static function getDataUser(){

        $kelolasiswa = kelolasiswa::all();

        $kelolasiswa_filter = [];

        $no = 1;

        for($i = 0; $i < $kelolasiswa->count(); $i++){
            $kelolasiswa_filter[$i]['nomer_induk'] = $nomer_induk++ ;
            $kelolasiswa_filter[$i]['nisn'] = $kelolasiswa[$i]->nisn ;
            $kelolasiswa_filter[$i]['nama_siswa'] = $kelolasiswa[$i]->nama_siswa ;
            $kelolasiswa_filter[$i]['idkelas'] = $kelolasiswa[$i]->idkelas ;
            $kelolasiswa_filter[$i]['jurusan'] = $kelolasiswa[$i]->jurusan ;
        }

        return $kelolasiswa_filter;
    }
}
