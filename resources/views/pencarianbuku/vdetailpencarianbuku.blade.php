<style>
    .table {
        margin: auto;
        width: 100% !important;
    }

    table th td {
        border: none !important;
    }
</style>
<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Informasi Buku</strong></h5>
            <div class="card-body">
                <table class="table" style="table-layout: fixed;">
                    <tbody>
                        @foreach ($databuku as $item)
                            <tr>
                                <td colspan="1">
                                    <div class="row d-flex justify-content-center">
                                        <a href="{{ asset('img/assetimg/' . $item->foto) }}" class="text-center">
                                            <img src="{{ asset('img/assetimg/' . $item->foto) }}" class="img-thumbnail"
                                                id="preview" style="width: 200px;">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="">Kode Buku</label>
                                        <input type="text" class="form-control"
                                            value="{{ $item->kode_buku }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Judul Buku</label>
                                        <input type="text" class="form-control" name="judul_buku"
                                            value="{{ $item->judul_buku }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <input type="text" class="form-control"
                                            value="{{ $item->nama_kategori }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rak</label>
                                        <input type="text" class="form-control"
                                            value="{{ $item->namarak }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tahun Buku</label>
                                        <input type="text" class="form-control"
                                            value="{{ $item->tahun_buku }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Penerbit</label>
                                        <input type="text" class="form-control"
                                            value="{{ $item->penerbit }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pengarang</label>
                                        <input type="text" class="form-control"
                                            value="{{ $item->pengarang }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi Buku</label>
                                        <textarea class="form-control" disabled>{{ $item->deskripsi }}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center mt-1">
                                        <a href="{{ route('pencarianbuku') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
