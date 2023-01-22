<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Tambah Buku</strong></h5>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert mt-3 alert-primary" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{ route('simpantambahbuku') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3">
                            <img src="https://i.pinimg.com/originals/f1/0f/f7/f10ff70a7155e5ab666bcdd1b45b726d.jpg"
                                class="img-thumbnail" id="preview">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Input Foto</label>
                        <input type="file" name="foto" class="form-control"
                            accept="image/png, image/gif, image/jpeg" onchange="tampilkanPreview(this, 'preview')">
                    </div>
                    <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input type="text" class="form-control" name="kode_buku">
                    </div>
                    <div class="form-group">
                        <label for="">Judul Buku</label>
                        <input type="text" class="form-control" name="judul_buku">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="id_kategori" class="form-control">
                            @foreach ($datakategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Rak</label>
                        <select name="id_rak" class="form-control">
                            @foreach ($datarak as $item)
                                <option value="{{ $item->id }}">{{ $item->namarak }}</option>
                            @endforeach
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
                        <label for="">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi Buku</label>
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('buku') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
