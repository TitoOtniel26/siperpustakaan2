<?php

use App\Http\Controllers\Claporan;
use App\Http\Controllers\Cmasterdata;
use App\Http\Controllers\Cpeminjaman;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cpengembalian;
use App\Http\Controllers\Cpencarianbuku;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('siswa');
});

Route::prefix('master')->controller(Cmasterdata::class)->group(function(){

    #Route For Siswa
    Route::get('siswa','siswa')->name('siswa');
    Route::get('tambahsiswa','tambahSiswa')->name('tambahsiswa');
    Route::post('simpantambahsiswa','saveTambahSiswa')->name('simpantambahsiswa');
    Route::get('editsiswa/{id}','editSiswa')->name('editsiswa');
    Route::post('simpaneditsiswa','simpanEditSiswa')->name('simpaneditsiswa');
    Route::post('savepasswordbarusiswa','savePasswordBaruSiswa')->name('savepasswordbarusiswa');
    Route::get('hapusdatasiswa/{id}','hapusDataSiswa')->name('hapusdatasiswa');

    #Route For Petugas
    Route::get('petugas','petugas')->name('petugas');
    Route::get('tambahpetugas','tambahPetugas')->name('tambahpetugas');
    Route::post('simpantambahpetugas','saveTambahPetugas')->name('simpantambahpetugas');
    Route::get('editpetugas/{id}','editPetugas')->name('editpetugas');
    Route::post('saveeditpetugas','saveEditPetugas')->name('saveeditpetugas');
    Route::post('savepasswordbarupetugas','savePasswordBaruPetugas')->name('savepasswordbarupetugas');
    Route::get('hapusdatapetugas/{id}','hapusDataPetugas')->name('hapusdatapetugas');
    
    #Route For Kategori
    Route::get('kategori','kategori')->name('kategori');
    Route::get('tambahkategori','tambahKategori')->name('tambahkategori');
    Route::post('simpantambahkategori','simpanTambahKategori')->name('simpantambahkategori');
    Route::get('editkategori/{id}','editKategori')->name('editkategori');
    Route::post('simpaneditkategori','simpanEditKategori')->name('simpaneditkategori');
    Route::get('hapusdatakategori/{id}','hapusDataKategori')->name('hapusdatakategori');

    #Route For Rak
    Route::get('rak','rak')->name('rak');
    Route::get('tambahrak','tambahRak')->name('tambahrak');
    Route::post('simpantambahrak','simpanTambahRak')->name('simpantambahrak');
    Route::get('editrak/{id}','editRak')->name('editrak');
    Route::post('simpaneditrak','simpanEditRak')->name('simpaneditrak');
    Route::get('hapusrak/{id}','hapusRak')->name('hapusrak');

    #Route For Kelas
    Route::get('kelas','kelas')->name('kelas');
    Route::get('tambahkelas','tambahKelas')->name('tambahkelas');
    Route::post('simpantambahkelas','simpanTambahKelas')->name('simpantambahkelas');
    Route::get('editkelas/{id}','editKelas')->name('editkelas');
    Route::post('simpaneditkelas','simpanEditKelas')->name('simpaneditkelas');
    Route::get('hapuskelas/{id}','hapusKelas')->name('hapuskelas');

    #Route For Buku
    Route::get('buku','buku')->name('buku');
    Route::get('tambahbuku','tambahBuku')->name('tambahbuku');
    Route::post('simpantambahbuku','simpanTambahBuku')->name('simpantambahbuku');
    Route::get('editbuku/{id}','editBuku')->name('editbuku');
    Route::post('simpaneditbuku','simpanEditBuku')->name('simpaneditbuku');
    Route::get('hapusdatabuku/{id}','hapusDatabuku')->name('hapusdatabuku');
});

Route::prefix('peminjaman')->controller(Cpeminjaman::class)->group(function(){
    Route::get('/','peminjaman')->name('peminjaman');
});

Route::prefix('pengembalian')->controller(Cpengembalian::class)->group(function(){
    Route::get('/','pengembalian')->name('pengembalian');
});

Route::prefix('pencarianbuku')->controller(Cpencarianbuku::class)->group(function(){
    Route::get('/','pencarianbuku')->name('pencarianbuku');
    Route::get('detailbuku/{id}','detailBuku')->name('detailbuku');
});

Route::prefix('laporan')->controller(Claporan::class)->group(function(){
    Route::get('/','laporan')->name('laporan');
});



