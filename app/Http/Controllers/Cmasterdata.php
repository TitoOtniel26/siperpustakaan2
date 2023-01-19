<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cmasterdata extends Controller
{
    public function siswa()
    {
        $data['contentview'] = "masterdata/vsiswa";
        $data['collapsemenu'] = "siswa";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["siswa"];

        return view('home', $data);
    }

    public function petugas()
    {
        $data['contentview'] = "masterdata/vpetugas";
        $data['collapsemenu'] = "petugas";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["petugas"];

        return view('home', $data);
    }

    public function kategori()
    {
        $data['contentview'] = "masterdata/vpetugas";
        $data['collapsemenu'] = "kategori";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["kategori"];

        return view('home', $data);
    }

    public function rak()
    {
        $data['contentview'] = "masterdata/vrak";
        $data['collapsemenu'] = "rak";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["rak"];

        return view('home', $data);
    }

    public function buku()
    {
        $data['contentview'] = "masterdata/vbuku";
        $data['collapsemenu'] = "buku";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["buku"];

        return view('home', $data);
    }


    
}
