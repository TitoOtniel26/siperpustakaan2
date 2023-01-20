<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rak extends Model
{
    use HasFactory;

    protected $table = "rak";

    public function saveData($arr = [])
    {
        $query = DB::table('rak')->insert([
            "namarak" => $arr["namarak"]
        ]);

        return $query;
    }

    public function simpanEditData($arr = [])
    {
        $query = DB::table('rak')->where('id','=',base64_decode($arr['id_rak']))->update([
            "namarak" => $arr["namarak"]
        ]);

        return $query;
    }
}
