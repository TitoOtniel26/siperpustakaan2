<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usermodel extends Model
{
    use HasFactory;
    protected $table = "users";

    // public function simpanData()
    // {
    //     $query = DB::table('u')
    // }
}
