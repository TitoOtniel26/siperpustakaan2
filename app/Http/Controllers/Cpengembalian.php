<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cpengembalian extends Controller
{
    public function pengembalian()
    {
        $data['contentview'] = "pengembalian/vpengembalian";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "pengembalian";
        $data['jsitem'] = ["pengembalian"];

        return view('home', $data);
    }
}
