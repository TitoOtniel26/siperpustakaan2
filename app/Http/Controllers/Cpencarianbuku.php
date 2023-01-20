<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cpencarianbuku extends Controller
{
    public function pencarianbuku()
    {
        $data['contentview'] = "pencarianbuku/vpencarianbuku";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "pencarianbuku";
        $data['jsitem'] = ["pencarianbuku"];

        return view('home', $data);
    }
}
