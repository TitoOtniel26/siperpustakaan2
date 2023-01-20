<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Claporan extends Controller
{
    public function laporan()
    {
        $data['contentview'] = "laporan/vlaporan";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "laporan";
        $data['jsitem'] = ["laporan"];

        return view('home', $data);
    }
}
