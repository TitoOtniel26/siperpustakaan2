<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Proses Pengembalian</strong></h5>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert mt-3 alert-primary" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{ route('simpanprosespengembalian') }}" method="POST">
                    @csrf
                    @foreach ($datapeminjaman as $item)
                        <input type="hidden" value="{{ base64_encode($item->id) }}" name="idpeminjaman">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control tglawal" name="tglpeminjaman"
                                        value="<?= date('Y-m-d', strtotime($item->tgl_pinjam)) ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Pengembalian</label>
                                    <input type="date" class="form-control tglakhir" name="tglpengembalian"
                                        value="<?= date('Y-m-d', strtotime($item->tgl_kembali)) ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Peminjaman</label>
                            <input type="text" class="form-control" name="kode_peminjaman" value="{{ $item->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">NISN / Nama Anggota</label><br>
                            <input type="hidden" value="{{ $item->idanggotaa }}">
                            <input type="text" value="{{ $item->namanggota }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nominal Denda</label>
                            <input type="text" name="nominaldenda" value="{{ $item->nominaldenda }}"
                                class="form-control" readonly>
                        </div>
                    @endforeach
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
                                    <td>
                                        <input type="hidden" value="{{ $item->kode_buku }}" name="kodebuku[]">
                                        {{ $item->kode_buku }}</td>
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
                        <a href="{{ route('tambahpengembalian') }}" type="button"
                            class="btn btn-danger btn-md">KEMBALI</a>
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
