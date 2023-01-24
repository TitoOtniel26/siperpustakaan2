<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cpeminjaman extends Controller
{
    public function peminjaman()
    {
        $data['contentview'] = "peminjaman/vpeminjaman";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "peminjaman";
        $data['jsitem'] = ["peminjaman"];
        $data['datapeminjaman'] = DB::select("select peminjaman.id, (select users.nama_user from users where users.id = peminjaman.id_user) as namapetugas, (select users.nama_user from users where users.id = peminjaman.id_anggota) as namaanggota, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.is_selesai from peminjaman");

        if(auth()->user()->status == "Siswa")
        {
            $idsiswa = auth()->user()->id;
            $data['datadetailpeminjaman'] = DB::select("SELECT * FROM detail_peminjaman
            INNER JOIN peminjaman on peminjaman.id = detail_peminjaman.id_peminjaman
            INNER JOIN buku on buku.kode_buku = detail_peminjaman.id_buku
            INNER JOIN kategori on kategori.id = buku.id_kategori
            INNER JOIN rak on rak.id = buku.id_rak
            WHERE peminjaman.id_anggota  = '".$idsiswa."' AND peminjaman.is_selesai = 0");
        }

        // dd($data);

        return view('home', $data);
    }

    public function tambahPeminjaman()
    {
        $data['contentview'] = "peminjaman/vtambahpeminjaman";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "peminjaman";
        $data['jsitem'] = ["peminjaman"];
        $data['datasiswa'] = DB::table('users')->where('status', '=', 'Siswa')->where('is_pinjam','=',0)->get();
        $data['databuku'] = DB::table('buku')->get();

        return view('home', $data);
    }

    public function getDataBuku(Request $request)
    {
        $idbuku = $request->kodebuku;

        $query = DB::select("SELECT * FROM `buku` INNER JOIN kategori on kategori.id = buku.id_kategori INNER JOIN rak on rak.id = buku.id_rak WHERE buku.kode_buku = '" . $idbuku . "'");

        echo json_encode($query);
    }

    public function simpanPeminjaman(Request $request)
    {
        $credentials = $request->validate([
            "tglpeminjaman" => ["required"],
            "tglpengembalian" => ["required"],
            "id_anggota" => ["required"],
            "kodebuku" => ["required", "array"]
        ]);


        $true = "";
        $post = $request->all();
        $idpeminjaman = "PEM" . date('ymdhis');
        $query = DB::table('peminjaman')->insert([
            "id" => $idpeminjaman,
            "id_user" => 1,
            "id_anggota" => $post['id_anggota'],
            "tgl_pinjam" => $post['tglpeminjaman'],
            "tgl_kembali" => $post['tglpengembalian']
        ]);

        for ($i = 0; $i < count($request->kodebuku); $i++) {
            $query = DB::table('detail_peminjaman')->insert([
                "id_peminjaman" => $idpeminjaman,
                "id_buku" => $post['kodebuku'][$i]
            ]);
            $true = true;
        }

        if ($true) {
            $result =
                [
                    'msg' => 'Simpan Data Sukses'
                ];
        } else {
            $result =
                [
                    'msg' => 'Simpan Data Gagal'
                ];
        }
        return redirect()->route('peminjaman')->withErrors($result);
    }

    public function editDatapeminjaman($id)
    {
        $idpeminjaman = base64_decode($id);

        $data['contentview'] = "peminjaman/veditpeminjaman";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "peminjaman";
        $data['jsitem'] = ["peminjaman"];
        $data['datasiswa'] = DB::table('users')->where('status', '=', 'Siswa')->get();
        $data['databuku'] = DB::table('buku')->get();
        $data['datapeminjaman'] = DB::table('peminjaman')->where('id','=',$idpeminjaman)->get();
        $data['datadetailpeminjaman'] = DB::select("SELECT * FROM detail_peminjaman
        INNER JOIN peminjaman on peminjaman.id = detail_peminjaman.id_peminjaman
        INNER JOIN buku on buku.kode_buku = detail_peminjaman.id_buku
        INNER JOIN kategori on kategori.id = buku.id_kategori
        INNER JOIN rak on rak.id = buku.id_rak
        WHERE peminjaman.id = '".$idpeminjaman."'");

        return view('home', $data);

    }

    public function hapusDataPeminjaman($id)
    {
        $idpeminjaman = base64_decode($id);
        
        $query = DB::table('peminjaman')->where('id','=',$idpeminjaman)->delete();

        if ($query) {
            $result =
                [
                    'msg' => 'Hapus Data Sukses'
                ];
        } else {
            $result =
                [
                    'msg' => 'Hapus Data Gagal'
                ];
        }

        return redirect()->route('peminjaman')->withErrors($result);
    }

    public function cariDataPeminjaman(Request $request)
    {
        $post = $request->all();

        $credentials = $request->validate([
            "tglawal" => ["required"],
            "tglakhir" => ["required"]
        ]);

        $data['contentview'] = "peminjaman/vpeminjaman";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "peminjaman";
        $data['jsitem'] = ["peminjaman"];
        $data['datapeminjaman'] = DB::select('select peminjaman.id, (select users.nama_user from users where users.id = peminjaman.id_user) as namapetugas, (select users.nama_user from users where users.id = peminjaman.id_anggota) as namaanggota, peminjaman.tgl_pinjam, peminjaman.tgl_kembali from peminjaman  WHERE peminjaman.is_selesai = 0 and peminjaman.tgl_pinjam BETWEEN "'.$post['tglawal'].'" and "'.$post['tglakhir'].'"');
        
        return view('home',$data);

    }
}
