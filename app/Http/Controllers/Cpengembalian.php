<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cpengembalian extends Controller
{
    public function pengembalian()
    {
        $data['contentview'] = "pengembalian/vpengembalian";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "pengembalian";
        $data['jsitem'] = ["pengembalian"]; 
        $data['datapengembalian'] = DB::select("SELECT *, (select users.nama_user from users where users.id = pengembalian.id_petugas) as namapetugas FROM `pengembalian`");

        return view('home', $data);
    }

    public function tambahPengembalian()
    {
        $data['contentview'] = "pengembalian/vtambahpengembalian";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "pengembalian";
        $data['jsitem'] = ["pengembalian"];
        $data['datapeminjaman'] = DB::select("select peminjaman.id, (select users.nama_user from users where users.id = peminjaman.id_user) as namapetugas, (select users.nama_user from users where users.id = peminjaman.id_anggota) as namaanggota, peminjaman.tgl_pinjam, peminjaman.tgl_kembali from peminjaman WHERE peminjaman.is_selesai = 0");

        return view('home', $data);
    }

    public function prosesPengembalian($id)
    {
        $idpeminjaman = base64_decode($id);

        $data['contentview'] = "pengembalian/vprosespengembalian";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "pengembalian";
        $data['jsitem'] = ["pengembalian"];
        $data['datasiswa'] = DB::table('users')->where('status', '=', 'Siswa')->get();
        $data['databuku'] = DB::table('buku')->get();
        $data['datapeminjaman'] = DB::select("SELECT (SELECT users.id from users where users.id = peminjaman.id_anggota) as idanggotaa, (SELECT users.nama_user from users where users.id = peminjaman.id_anggota) as namanggota,peminjaman.*, datediff(now(), peminjaman.tgl_kembali) * 500 as nominaldenda FROM peminjaman where peminjaman.id = '".$idpeminjaman."'");
        $data['datadetailpeminjaman'] = DB::select("SELECT * FROM detail_peminjaman
        INNER JOIN peminjaman on peminjaman.id = detail_peminjaman.id_peminjaman
        INNER JOIN buku on buku.kode_buku = detail_peminjaman.id_buku
        INNER JOIN kategori on kategori.id = buku.id_kategori
        INNER JOIN rak on rak.id = buku.id_rak
        WHERE peminjaman.id = '" . $idpeminjaman . "'");

        return view('home', $data);
    }

    public function simpanProsespengembalian(Request $request)
    {
        $credentials = $request->validate([
            "kode_peminjaman" => ["required"],
            "tglpeminjaman" => ["required"],
            "tglpengembalian" => ["required"],
            "nominaldenda" => ["required"],
            "kodebuku" => ["required","array"], 
        ]);

        $post = $request->all();

        $query = DB::table('pengembalian')->insert([
            "id" => "PEM".date('dmyhis'),
            "tanggal_pengembalian" => date('Y-m-d'),
            "id_peminjaman" => $post['kode_peminjaman'],
            "id_petugas" => 7,
            "nominaldenda" => $post['nominaldenda']
        ]);

        $query = DB::table('peminjaman')->where('id','=',$post['kode_peminjaman'])->update([
            "is_selesai" => 1,
        ]);

        for($i = 0; $i < count($post['kodebuku']); $i++)
        {
            $query = DB::update("UPDATE buku set buku.jumlah = buku.jumlah + 1 WHERE buku.kode_buku = '".$post['kodebuku'][$i]."'");
        }

        if ($query) {
            $result =
                [
                    'msg' => 'Kembalikan Buku  Sukses'
                ];
        } else {
            $result =
                [
                    'msg' => 'Kembalikan Buku  Gagal'
                ];
        }

        return redirect()->route('pengembalian')->withErrors($result);

    }

    public function cariPengembalian(Request $request)
    {
        $credentials = $request->validate([
            "tglawal" => ["required"],
            "tglakhir" => ["required"]
        ]);

        $post = $request->all();
        $data['contentview'] = "pengembalian/vpengembalian";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "pengembalian";
        $data['jsitem'] = ["pengembalian"]; 
        $data['datapengembalian'] = DB::select("SELECT *, (select users.nama_user from users where users.id = pengembalian.id_petugas) as namapetugas FROM `pengembalian` WHERE pengembalian.tanggal_pengembalian BETWEEN '".$post['tglawal']."' AND '".$post['tglakhir']."'");

        return view('home', $data);

    }

    public function detailPengembalian($id)
    {
        $idpengembalian = base64_decode($id);

        $data['contentview'] = "pengembalian/vdetailpengembalian";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "pengembalian";
        $data['jsitem'] = ["pengembalian"];
        $data['datapengembalian'] = DB::select("SELECT *, (select users.nama_user from users where users.id = peminjaman.id_anggota) as namaanggota FROM `pengembalian`
        INNER JOIN peminjaman on peminjaman.id = pengembalian.id_peminjaman WHERE pengembalian.id = '".$idpengembalian."'");
        $data['datadetailpengembalian'] = DB::select("SELECT * FROM `pengembalian` 
        INNER JOIN detail_peminjaman on detail_peminjaman.id_peminjaman = pengembalian.id_peminjaman
        INNER JOIN buku on buku.kode_buku = detail_peminjaman.id_buku
        INNER JOIN kategori on kategori.id = buku.id_kategori
        INNER JOIN rak on rak.id = buku.id_rak
        WHERE pengembalian.id = '" . $idpengembalian . "'");

        return view('home', $data);
    }

    public function hapusDetailPengembalian($id)
    {
        $idpengembalian = base64_decode($id);

        $query = DB::table('pengembalian')->where('id','=',$idpengembalian)->delete();

        if ($query) {
            $result =
                [
                    'msg' => 'Hapus Data Pengembalian  Sukses'
                ];
        } else {
            $result =
                [
                    'msg' => 'Hapus Data Pengembalian  Gagal'
                ];
        }

        return redirect()->route('pengembalian')->withErrors($result);
    }
}
