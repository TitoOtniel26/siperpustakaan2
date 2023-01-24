<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function printLaporanPeminjaman($tglawal, $tglakhir)
    {
        $data['tanggalawal'] = $tglawal;
        $data['tanggalakhir'] = $tglakhir;

        $data['datapeminjaman'] = DB::select('SELECT 
        peminjaman.id as kodepeminjaman,
        (select users.no_identitas from users where users.id = peminjaman.id_anggota) as nisn,
        (select users.nama_user from users where users.id = peminjaman.id_anggota) as namaanggota,
        date_format(peminjaman.tgl_pinjam,"%d-%m-%Y") as tanggalpinjam,
        date_format(peminjaman.tgl_kembali,"%d-%m-%Y") as tanggalkembali,
        GROUP_CONCAT(buku.kode_buku) as kodebuku,
        GROUP_CONCAT(buku.judul_buku) as judulbuku,
        if(peminjaman.is_selesai = 1, "Dikembalikan","Belum Dikembalikan") as statuspeminjaman
        FROM peminjaman
        INNER JOIN detail_peminjaman on detail_peminjaman.id_peminjaman = peminjaman.id
        INNER JOIN buku on buku.kode_buku = detail_peminjaman.id_buku
        INNER JOIN kategori on kategori.id = buku.id_kategori
        INNER JOIN rak on rak.id = buku.id_rak
        WHERE peminjaman.tgl_pinjam BETWEEN "'.$tglawal.'" AND "'.$tglakhir.'"
        GROUP by peminjaman.id');

        return view('laporan/vlaporanpeminjaman',$data);
    }

    public function printLaporanPengembalian($tglawal, $tglakhir)
    {
        $data['tanggalawal'] = $tglawal;
        $data['tanggalakhir'] = $tglakhir;

        $data['datapengembalian'] = DB::select('SELECT 
        pengembalian.id,
        pengembalian.tanggal_pengembalian,
        pengembalian.id_peminjaman,
        (select users.no_identitas from users where users.id = peminjaman.id_anggota) as nisn,
        (select users.nama_user from users where users.id = peminjaman.id_anggota) as namaanggota,
        GROUP_CONCAT(buku.kode_buku) as kodebuku,
        GROUP_CONCAT(buku.judul_buku) as judulbuku,
        pengembalian.nominaldenda
        FROM pengembalian
        INNER JOIN peminjaman on peminjaman.id = pengembalian.id_peminjaman
        INNER JOIN detail_peminjaman on detail_peminjaman.id_peminjaman = pengembalian.id_peminjaman
        INNER JOIN buku on buku.kode_buku = detail_peminjaman.id_buku
        INNER JOIN kategori on kategori.id = buku.id_kategori
        INNER JOIN rak on rak.id = buku.id_rak
        WHERE pengembalian.tanggal_pengembalian BETWEEN  "'.$tglawal.'" AND "'.$tglakhir.'"
        GROUP BY pengembalian.id');

        return view('laporan/vlaporanpengembalian',$data);
    }


    public function printLaporan(Request $request)
    {
        $credentials = $request->validate([
            "jenislaporan" => ['required'],
            "tanggalawal" => ['required'],
            "tanggalakhir" => ['required'],
        ]);

        $tglawal = $request->tanggalawal;
        $tglakhir = $request->tanggalakhir;
        $jenislaporan = $request->jenislaporan;

        if($jenislaporan == 1)
        {
            return $this->printLaporanPeminjaman($tglawal, $tglakhir);
        }
        else if($jenislaporan == 2)
        {
            return $this->printLaporanPengembalian($tglawal, $tglakhir);
        }
    }
}
