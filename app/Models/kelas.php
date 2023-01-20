<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";

    public function saveData($arr = [])
    {
        $query = DB::table('kelas')->insert([
            "namakelas" => $arr['namakelas']
        ]);

        return $query;
    }

    public function saveEditData($arr = [])
    {
        $query = DB::table('kelas')->where('id','=',base64_decode($arr['id_kelas']))->update([
            "namakelas" => $arr['namakelas']
        ]);

        return $query;
    }
}
