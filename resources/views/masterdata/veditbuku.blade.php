<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Edit Buku</strong></h5>
            <div class="card-body">
                <form action="{{ route('simpaneditbuku') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach ($databuku as $item)
                        <input type="hidden" name="nama_foto_lama" value="{{ base64_encode($item->foto) }}">
                        <input type="hidden" class="form-control" name="kode_buku_lama" value="{{ $item->kode_buku }}">
                        <div class="row d-flex justify-content-center">
                            <img src="{{ asset('img/assetimg/' . $item->foto) }}" class="img-thumbnail" id="preview" style="width: 200px;">
                        </div>
                        <div class="form-group">
                            <label for="">Input Foto</label>
                            <input type="file" name="foto" class="form-control"
                                accept="image/png, image/gif, image/jpeg" onchange="tampilkanPreview(this, 'preview')">
                        </div>
                        <div class="form-group">
                            <label for="">Kode Buku</label>
                            <input type="text" class="form-control" name="kode_buku" value="{{ $item->kode_buku }}">
                        </div>
                        <div class="form-group">
                            <label for="">Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" value="{{ $item->judul_buku }}">
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <select name="id_kategori" class="form-control">
                                @foreach ($datakategori as $kategori)
                                    <option value="{{ $kategori->id }}"  <?=  $kategori->id == $item->id_kategori ? "selected" : "" ?>>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Rak</label>
                            <select name="id_rak" class="form-control">
                                @foreach ($datarak as $rak)
                                    <option value="{{ $rak->id }}" <?= $rak->id == $item->id_rak ? "selected" : "" ?> >{{ $rak->namarak }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Buku</label>
                            <input type="text" class="form-control" name="tahun_buku" value="{{  $item->tahun_buku }}">
                        </div>
                        <div class="form-group">
                            <label for="">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" value="{{  $item->penerbit }}">
                        </div>
                        <div class="form-group">
                            <label for="">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" value="{{  $item->pengarang }}">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" value="{{  $item->jumlah }}">
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Buku</label>
                            <textarea name="deskripsi" class="form-control">{{  $item->deskripsi }}</textarea>
                        </div>
                    @endforeach
                    <div class="text-center mt-3">
                        <a href="{{ route('buku') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
