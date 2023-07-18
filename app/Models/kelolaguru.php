<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelolaguru extends Model
{
    use HasFactory;
    public static function getDataUser(){

        $kelolaguru = kelolaguru::all();

        $kelolaguru_filter = [];

        $no = 1;

        for($i = 0; $i < $kelolaguru->count(); $i++){
            $kelolaguru_filter[$i]['nama_guru'] = $nama_guru++ ;
            $kelolaguru_filter[$i]['ttl'] = $kelolaguru[$i]->ttl ;
            $kelolaguru_filter[$i]['nip'] = $kelolaguru[$i]->nip ;
            $kelolaguru_filter[$i]['nuptk'] = $kelolaguru[$i]->nuptk ;
            $kelolaguru_filter[$i]['nomor_nrg'] = $kelolaguru[$i]->nomor_nrg ;
            $kelolaguru_filter[$i]['jenis_kelamin'] = $kelolaguru[$i]->jenis_kelamin ;
            $kelolaguru_filter[$i]['agama'] = $kelolaguru[$i]->agama ;
            $kelolaguru_filter[$i]['pendidikan_terakhir'] = $kelolaguru[$i]->pendidikan_terakhir ;
            $kelolaguru_filter[$i]['jabatan'] = $kelolaguru[$i]->jabatan ;
            $kelolaguru_filter[$i]['mata_pelajaran'] = $kelolaguru[$i]->mata_pelajaran ;
            
        }

        return $kelolaguru_filter;
    }
}
