<?php

namespace App\Http\Controllers;

use App\Models\rak;
use App\Models\kelas;
use App\Models\kategori;
use App\Models\usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cmasterdata extends Controller
{
    protected $kategori;
    protected $rak;
    protected $kelas;

    function __construct()
    {
        $this->kategori = new kategori();
        $this->rak = new rak();
        $this->kelas = new kelas();
    }

    public function siswa()
    {
        $data['contentview'] = "masterdata/vsiswa";
        $data['collapsemenu'] = "siswa";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["siswa"];
        $data['datauser'] = usermodel::where('status', '=', 'Siswa')->get();

        return view('home', $data);
    }

    public function tambahSiswa()
    {
        $data['contentview'] = "masterdata/vtambahsiswa";
        $data['collapsemenu'] = "siswa";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["siswa"];
        $data['datakelas'] = $this->kelas->get();

        return view('home', $data);
    }

    public function saveTambahSiswa(Request $request)
    {
        $credentials = $request->validate([
            "foto" => ["required"],
            "no_identitas" => ["required"],
            "nama_user" => ["required"],
            "jenis_kelamin" => ["required"],
            "alamat" => ["required"],
            "kelas" => ["required"],
            "no_telp" => ["required"],
        ]);


        $name = $request->file('foto')->getClientOriginalName();
        $mergenamefoto = date('ymdhis') . $name;

        $path = $request->file('foto')->move('img/assetimg', $mergenamefoto);

        $post = $request->all();

        $query = DB::table('users')->insert([
            "no_identitas" => $post['no_identitas'],
            "nama_user" => $post['nama_user'],
            "jenis_kelamin" => $post['jenis_kelamin'],
            "alamat" => $post['alamat'],
            "kelas" => $post['kelas'],
            "no_telp" => $post['no_telp'],
            "status" => "Siswa",
            "foto" => $mergenamefoto,
            "username" => $post['username'],
            "password" => bcrypt($post['password'])
        ]);

        if ($query) {
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

        return redirect()->route('siswa')->withErrors($result);
    }

    public function editSiswa($id)
    {
        $idsiswa = base64_decode($id);

        $data['contentview'] = "masterdata/veditsiswa";
        $data['collapsemenu'] = "siswa";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["siswa"];
        $data['datakelas'] = $this->kelas->get();
        $data['datasiswa'] = DB::table('users')->where('id', '=', $idsiswa)->get();

        return view('home', $data);
    }

    public function simpanEditSiswa(Request $request)
    {
        $post = $request->all();
        if (!$request->file('foto')) {
            $credentials = $request->validate([
                "id_siswa" => ["required"],
                "no_identitas" => ["required"],
                "nama_user" => ["required"],
                "jenis_kelamin" => ["required"],
                "alamat" => ["required"],
                "kelas" => ["required"],
                "no_telp" => ["required"],
            ]);


            $query = DB::table('users')->where('id', '=', base64_decode($request->id_siswa))->update([
                "no_identitas" => $post['no_identitas'],
                "nama_user" => $post['nama_user'],
                "jenis_kelamin" => $post['jenis_kelamin'],
                "alamat" => $post['alamat'],
                "kelas" => $post['kelas'],
                "no_telp" => $post['no_telp'],
                "status" => "Siswa",
                "username" => $post['username'],
                "password" => bcrypt($post['password'])
            ]);

            if ($query) {
                $result =
                    [
                        'msg' => 'Update Data Sukses'
                    ];
            } else {
                $result =
                    [
                        'msg' => 'Update Data Gagal'
                    ];
            }
        } else {
            $credentials = $request->validate([
                "id_siswa" => ["required"],
                "no_identitas" => ["required"],
                "nama_user" => ["required"],
                "jenis_kelamin" => ["required"],
                "alamat" => ["required"],
                "kelas" => ["required"],
                "no_telp" => ["required"],
                "foto" => ["required"],
                "nama_foto_lama" => ["required"],
            ]);


            $name = $request->file('foto')->getClientOriginalName();
            $mergenamefoto = date('ymdhis') . $name;
            $path = $request->file('foto')->move('img/assetimg', $mergenamefoto);

            $namafotolama = base64_decode($post['nama_foto_lama']);

            if (file_exists(public_path('img/assetimg/' . $namafotolama))) {
                unlink(public_path('img/assetimg/' . $namafotolama));
            }

            $query = DB::table('users')->where('id', '=', base64_decode($request->id_siswa))->update([
                "no_identitas" => $post['no_identitas'],
                "nama_user" => $post['nama_user'],
                "jenis_kelamin" => $post['jenis_kelamin'],
                "alamat" => $post['alamat'],
                "kelas" => $post['kelas'],
                "no_telp" => $post['no_telp'],
                "status" => "Siswa",
                "username" => $post['username'],
                "foto" => $mergenamefoto
            ]);

            if ($query) {
                $result =
                    [
                        'msg' => 'Update Data Sukses'
                    ];
            } else {
                $result =
                    [
                        'msg' => 'Update Data Gagal'
                    ];
            }
        }

        return redirect()->route('siswa')->withErrors($result);
    }

    public function savePasswordBaru(Request $request)
    {
        $credentials = $request->validate([
            "id_siswa" => ["required"],
            "password" => ["required"]
        ]);

        $post = $request->all();

        $query = DB::table('users')->where('id','=',base64_decode($post['id_siswa']))->update([
            "password" => bcrypt($post['password'])
        ]);

        if($query)
        {
            return back()->withErrors(["msg" => "Update Password Berhasil!"]);
        }
        else
        {
            return back()->withErrors(["msg" => "Update Password Gagal!"]);
        }
    }

    public function hapusDataSiswa($id)
    {
        $getdatasiswa = DB::table('users')->where('id','=',base64_decode($id))->get();

        foreach($getdatasiswa as $item)
        {
            
            if (file_exists(public_path('img/assetimg/' . $item->foto))) {
                unlink(public_path('img/assetimg/' . $item->foto));
            }
        }

        $query = DB::table('users')->where('id','=',base64_decode($id))->delete();

        if($query)
        {
            return back()->withErrors(["msg" => "Hapus Data Berhasil!"]);
        }
        else
        {
            return back()->withErrors(["msg" => "Hapus Data Gagal!"]);
        }
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

    public function tambahPetugas()
    {

        $data['contentview'] = "masterdata/vtambahpetugas";
        $data['collapsemenu'] = "petugas";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["petugas"];

        return view('home', $data);
    }

    public function kategori()
    {
        $data['contentview'] = "masterdata/vkategori";
        $data['collapsemenu'] = "kategori";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["kategori"];
        $data['datakategori'] = kategori::get();

        return view('home', $data);
    }

    public function tambahKategori()
    {
        $data['contentview'] = "masterdata/vtambahkategori";
        $data['collapsemenu'] = "kategori";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["kategori"];
        $data['datakategori'] = $this->kategori->get();

        return view('home', $data);
    }

    public function simpanTambahKategori(Request $request)
    {
        $credentials = $request->validate([
            "nama_kategori" => ['required']
        ]);

        $post = $request->all();

        $query = $this->kategori->simpanData($post);

        $result = "";
        if ($query) {
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

        return redirect()->route('kategori')->withErrors($result);
    }

    public function editKategori($id)
    {
        $data['contentview'] = "masterdata/veditkategori";
        $data['collapsemenu'] = "kategori";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["kategori"];
        $data['datakategori'] = $this->kategori->where('id', '=', base64_decode($id))->get();

        return view('home', $data);
    }

    public function simpanEditKategori(Request $request)
    {
        $credentials = $request->validate([
            "id_kategori" => ['required'],
            "nama_kategori" => ['required']
        ]);

        $post = $request->all();
        $query = $this->kategori->simpanEditData($post);

        $result = "";
        if ($query) {
            $result =
                [
                    'msg' => 'Update Data Sukses'
                ];
        } else {
            $result =
                [
                    'msg' => 'Update Data Gagal'
                ];
        }

        return redirect()->route('kategori')->withErrors($result);
    }

    public function hapusDataKategori($id)
    {
        $query = $this->kategori->where('id', '=', base64_decode($id))->delete();

        $result = "";
        if ($query) {
            $result =
                [
                    'msg' => 'Delete Data Sukses'
                ];
        } else {
            $result =
                [
                    'msg' => 'Delete Data Gagal'
                ];
        }

        return redirect()->route('kategori')->withErrors($result);
    }

    public function rak()
    {
        $data['contentview'] = "masterdata/vrak";
        $data['collapsemenu'] = "rak";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["rak"];
        $data['datarak']  = $this->rak->get();
        return view('home', $data);
    }

    public function tambahRak()
    {
        $data['contentview'] = "masterdata/vtambahrak";
        $data['collapsemenu'] = "rak";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["rak"];
        return view('home', $data);
    }

    public function simpanTambahRak(Request $request)
    {
        $credentials = $request->validate([
            "namarak" => ['required']
        ]);

        $post = $request->all();

        $query = $this->rak->saveData($post);

        $result = "";
        if ($query) {
            $result =
                [
                    'msg' => 'Tambah Data Sukses'
                ];
        } else {
            $result =
                [
                    'msg' => 'Tambah Data Gagal'
                ];
        }

        return redirect()->route('rak')->withErrors($result);
    }

    public function editRak($id)
    {
        $data['contentview'] = "masterdata/veditrak";
        $data['collapsemenu'] = "rak";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["rak"];
        $data['datarak'] = $this->rak->where('id', '=', base64_decode($id))->get();

        return view('home', $data);
    }

    public function simpanEditRak(Request $request)
    {
        $credentials = $request->validate([
            "id_rak" => ['required'],
            "namarak" => ['required']
        ]);

        $post = $request->all();

        $query = $this->rak->simpanEditData($post);

        $result = "";
        if ($query) {
            $result =
                [
                    'msg' => 'Update Data Sukses'
                ];
        } else {
            $result =
                [
                    'msg' => 'Update Data Gagal'
                ];
        }

        return redirect()->route('rak')->withErrors($result);
    }

    public function hapusRak($id)
    {
        $idrak = base64_decode($id);

        $query = $this->rak->where('id', '=', $idrak)->delete();

        $result = "";
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

        return redirect()->route('rak')->withErrors($result);
    }

    public function kelas()
    {
        $data['contentview'] = "masterdata/vkelas";
        $data['collapsemenu'] = "kelas";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["kelas"];
        $data['datakelas'] = $this->kelas->get();

        return view('home', $data);
    }

    public function simpanTambahKelas(Request $request)
    {
        $credentials = $request->validate([
            "namakelas" => ["required"]
        ]);

        $query = $this->kelas->saveData($request->all());

        $result = "";
        if ($query) {
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

        return redirect()->route('kelas')->withErrors($result);
    }

    public function editKelas($id)
    {
        $data['contentview'] = "masterdata/veditkelas";
        $data['collapsemenu'] = "kelas";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["kelas"];
        $data['datakelas'] = $this->kelas->where('id', '=', base64_decode($id))->get();

        return view('home', $data);
    }
    public function simpanEditKelas(Request $request)
    {
        $credentials = $request->validate([
            "id_kelas" => ['required'],
            "namakelas" => ["required"]
        ]);

        $result = "";
        $query = $this->kelas->saveEditData($request->all());

        if ($query) {
            $result =
                [
                    'msg' => 'Update Data Sukses'
                ];
        } else {
            $result =
                [
                    'msg' => 'Update Data Gagal'
                ];
        }

        return redirect()->route('kelas')->withErrors($result);
    }

    public function hapusKelas($id)
    {
        $query = $this->kelas->where('id', '=', base64_decode($id))->delete();


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

        return redirect()->route('kelas')->withErrors($result);
    }


    public function tambahKelas()
    {
        $data['contentview'] = "masterdata/vtambahkelas";
        $data['collapsemenu'] = "kelas";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["kelas"];

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

    public function tambahBuku()
    {
        $data['contentview'] = "masterdata/vtambahbuku";
        $data['collapsemenu'] = "buku";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["buku"];

        return view('home', $data);
    }
}
