<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cpencarianbuku extends Controller
{
    public function pencarianbuku()
    {
        $data['contentview'] = "pencarianbuku/vpencarianbuku";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "pencarianbuku";
        $data['jsitem'] = ["pencarianbuku"];
        $data['databuku'] = DB::select("SELECT * FROM `buku` INNER JOIN kategori on kategori.id = buku.id_kategori INNER JOIN rak on rak.id = buku.id_rak");

        return view('home', $data);
    }

    public function detailBuku($id)
    {
        $data['contentview'] = "pencarianbuku/vdetailpencarianbuku";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "pencarianbuku";
        $data['jsitem'] = ["pencarianbuku"];
        $data['databuku'] = DB::select("SELECT * FROM `buku` INNER JOIN kategori on kategori.id = buku.id_kategori INNER JOIN rak on rak.id = buku.id_rak WHERE buku.kode_buku = '" . base64_decode($id) . "'");
        
        return view('home', $data);
    }
}
