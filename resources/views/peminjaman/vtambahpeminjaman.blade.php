<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Tambah Peminjaman</strong></h5>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert mt-3 alert-primary" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{ route('simpanpeminjaman') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Peminjaman</label>
                                <input type="date" class="form-control tglawal" name="tglpeminjaman"
                                    value="<?= date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Pengembalian</label>
                                <input type="date" class="form-control tglakhir" name="tglpengembalian" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">NISN / Nama Anggota</label><br>
                        <select name="id_anggota" class="form-control select2" style="width: 100%;">
                            <option value="" selected>-- PILIH ANGGOTA --</option>
                            @foreach ($datasiswa as $item)
                                <option value="{{ $item->id }}" noidentitas="{{ $item->no_identitas }}">
                                    {{ $item->no_identitas }} - {{ $item->nama_user }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Judul Buku</label><br>
                        <select id="id_buku" class="form-control select2" style="width: 100%;">
                            <option value="" selected>-- PILIH BUKU --</option>
                            @foreach ($databuku as $item)
                                <option value="{{ $item->kode_buku }}" kodebuku="{{ $item->kode_buku }}">
                                    {{ $item->kode_buku }} - {{ $item->judul_buku }}</option>
                            @endforeach
                        </select>
                    </div>
                    <table class="table table-bordered table-hover mt-4">
                        <thead>
                            <tr>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Penerbit</th>
                                <th>Pengarang</th>
                                <th>Kategori</th>
                                <th>Rak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbodypeminjaman">
                        </tbody>
                    </table>
                    <div class="text-center mt-2">
                        <a href="{{ route('peminjaman') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
