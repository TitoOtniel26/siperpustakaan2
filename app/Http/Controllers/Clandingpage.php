<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Clandingpage extends Controller
{
    public function dashboard()
    {
        $data['contentview'] = "landingpage/vdashboard";
        $data['collapsemenu'] = "";
        $data['collapsing'] = "false";
        $data['parentmenu'] = "dashboard";
        $data['jsitem'] = [];

        $data['jmlhanggota'] = DB::select("SELECT count(users.id) as jmlanggota FROM users where users.status = 'Siswa'");
        $data['jmlbuku'] = DB::select("SELECT count(buku.kode_buku) as jmlbuku FROM buku");
        $data['jmlpetugas'] = DB::select("SELECT count(users.id) as jmlpetugas FROM users where users.status = 'Petugas'");
        $data['jmlpeminjaman'] = DB::select("SELECT count(peminjaman.id) as jmlhpeminjaman from peminjaman where peminjaman.is_selesai = 0");
        $data['jmlpengembalian'] = DB::select("SELECT count(pengembalian.id) as jmlpengembalian FROM pengembalian");
        $data['nominaldenda'] = DB::select("SELECT sum(pengembalian.nominaldenda) as nominaldenda from pengembalian");

        return view('home', $data);
    }

    public function login()
    {
        return view('landingpage.vlogin');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(auth()->user()->status == "Siswa")
            {
                return redirect()->route('peminjaman');
            }
            else
            {
                return redirect()->route('dashboard');
            }
        } else {
            return back()->withErrors([
                'msg' => 'Username Atau Password Salah',
            ]);
        }
    }

    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function myProfile()
    {
        $idsiswa = auth()->user()->id;

        $data['contentview'] = "landingpage/vmyprofile";
        $data['collapsemenu'] = "siswa";
        $data['collapsing'] = "true";
        $data['parentmenu'] = "master";
        $data['jsitem'] = ["siswa"];
        $data['datakelas'] = DB::select("SELECT * FROM kelas");
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
                "username" => $post['username']
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

        return redirect()->route('peminjaman')->withErrors($result);
    }

    public function simpanpasswordprofilbaru(Request $request)
    {
        $credentials = $request->validate([
            "id_siswa" => ["required"],
            "password" => ["required"]
        ]);

        $post = $request->all();

        $query = DB::table('users')->where('id', '=', base64_decode($post['id_siswa']))->update([
            "password" => bcrypt($post['password'])
        ]);

        if ($query) {
            return back()->withErrors(["msg" => "Update Password Berhasil!"]);
        } else {
            return back()->withErrors(["msg" => "Update Password Gagal!"]);
        }
    }

    public function signup()
    {
        $data['datakelas'] = DB::select("SELECT * FROM kelas");

        return view('landingpage.vsignup',$data);
    }

    public function saveSignUpData(Request $request)
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

        return redirect()->route('login')->withErrors($result);
    }

}
