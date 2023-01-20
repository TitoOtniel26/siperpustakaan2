<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Tambah Kategori</strong></h5>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori">
                    </div>
                    <div class="text-center mt-2">
                        <a href="{{ route('kategori') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
