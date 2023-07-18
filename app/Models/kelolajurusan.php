<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelolajurusan extends Model
{
    use HasFactory;
    public static function getDataUser(){

        $kelolajurusan = kelolajurusan::all();

        $kelolajurusan_filter = [];

        $no = 1;

        for($i = 0; $i < $kelolajurusan->count(); $i++){
            $kelolajurusan_filter[$i]['jurusan'] = $jurusan++ ;
            $kelolajurusan_filter[$i]['namakaprog'] = $kelolajurusan[$i]->namakaprog ;
        }

        return $kelolajurusan_filter;
    }
}
