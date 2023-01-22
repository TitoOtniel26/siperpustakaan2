<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Edit Peminjaman</strong></h5>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert mt-3 alert-primary" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                @foreach ($datapeminjaman as $item)
                    <input type="hidden" value="{{ base64_encode($item->id) }}" name="idpeminjaman">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Peminjaman</label>
                                <input type="date" class="form-control tglawal" name="tglpeminjaman"
                                    value="<?= date('Y-m-d', strtotime($item->tgl_pinjam)) ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Pengembalian</label>
                                <input type="date" class="form-control tglakhir" name="tglpengembalian"
                                    value="<?= date('Y-m-d', strtotime($item->tgl_kembali)) ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Kode Peminjaman</label>
                        <input type="text" class="form-control" value="{{ $item->id }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">NISN / Nama Anggota</label><br>
                        <select name="id_anggota" class="form-control" style="width: 100%;" readonly>
                            @foreach ($datasiswa as $anggota)
                                <option value="{{ $anggota->id }}" noidentitas="{{ $anggota->no_identitas }}"
                                    <?= $anggota->id == $item->id_anggota ? 'selected' : '' ?>>
                                    {{ $anggota->no_identitas }} - {{ $anggota->nama_user }}</option>
                        </select>
                @endforeach
            </div>
            @endforeach
            <div class="form-group">
                <label for="">Judul Buku</label><br>
                <select id="id_buku" class="form-control" style="width: 100%;" disabled>
                    @foreach ($databuku as $buku)
                        <option value="{{ $buku->kode_buku }}" kodebuku="{{ $buku->kode_buku }}">
                            {{ $buku->kode_buku }} - {{ $buku->judul_buku }}</option>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datadetailpeminjaman as $item)
                        <tr>
                            <td>{{ $item->kode_buku }}</td>
                            <td>{{ $item->judul_buku }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->pengarang }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->namarak }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center mt-2">
                <a href="{{ route('peminjaman') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
            </div>
        </div>
    </div>
    </div>
</section>
