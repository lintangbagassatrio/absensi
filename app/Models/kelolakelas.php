<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelolakelas extends Model
{
    use HasFactory;
    public static function getDataUser(){

        $kelolakelas = kelolakelas::all();

        $kelolakelas_filter = [];

        $no = 1;

        for($i = 0; $i < $kelolakelas->count(); $i++){
            $kelolakelas_filter[$i]['idkelas'] = $idkelas++ ;
            $kelolakelas_filter[$i]['kelas'] = $kelolakelas[$i]->kelas ;
            $kelolakelas_filter[$i]['jurusan'] = $kelolakelas[$i]->jurusan ;
            $kelolakelas_filter[$i]['walikelas'] = $kelolakelas[$i]->walikelas ;
            
        }

        return $kelolakelas_filter;
    }
}
