<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Tambah Buku</strong></h5>
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
                        <label for="">Judul Buku</label>
                        <input type="text" class="form-control" name="judul_buku">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun Buku</label>
                        <input type="text" class="form-control" name="tahun_buku">
                    </div>
                    <div class="form-group">
                        <label for="">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit">
                    </div>
                    <div class="form-group">
                        <label for="">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang">
                    </div>
                    <div class="form-group">
                        <label for="">Rak</label>
                        <select name="id_rak" class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah">
                    </div>

                    <div class="text-center mt-2">
                        <a href="{{ route('buku') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
