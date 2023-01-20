<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori extends Model
{
    use HasFactory;

    protected $table = "kategori";

    public function simpanData($arr = [])
    {
       
        $query = DB::table('kategori')->insert([
            "nama_kategori" => $arr['nama_kategori']
        ]);

        return $query;
    }

    public function simpanEditData($arr = [])
    {
        $query = DB::table('kategori')->where('id','=',base64_decode($arr['id_kategori']))->update([
            "nama_kategori" => $arr['nama_kategori']
        ]);

        return $query;
    }
}
