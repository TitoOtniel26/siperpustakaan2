<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Tambah Siswa</strong></h5>
            <div class="card-body">
                <form action="">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3">
                            <img src="https://i.pinimg.com/originals/f1/0f/f7/f10ff70a7155e5ab666bcdd1b45b726d.jpg"
                                class="img-thumbnail" id="output">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Input Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">NISN</label>
                        <input type="text" class="form-control" name="no_identitas">
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama_user">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No Telepon</label>
                        <textarea name="no_telp" class="form-control"></textarea>
                    </div>
                    <div class="text-center mt-2">
                        <a href="{{ route('siswa') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
