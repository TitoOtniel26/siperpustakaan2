<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cpeminjaman extends Controller
{
    public function peminjaman()
    {
        $data['contentview'] = "peminjaman/vpeminjaman";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "peminjaman";
        $data['jsitem'] = ["peminjaman"];

        return view('home', $data);
    }
}
