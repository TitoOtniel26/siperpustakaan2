<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Data Pengembalian</strong></h5>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert mt-3 alert-primary" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <h3 class="text-center">Tambah Pengembalian</h3>
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-bordered display" id="tbperpustakaan" style="width : 100%;">
                        <thead>
                            <tr>
                                <th>Kode Peminjaman</th>
                                <th>Nama Petugas</th>
                                <th>Nama Anggota</th>
                                <th>Tgl Pinjam</th>
                                <th>Tgl Kembali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($datapeminjaman as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->namapetugas }}</td>
                                    <td>{{ $item->namaanggota }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->tgl_pinjam)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->tgl_kembali)) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('prosespengembalian', ['id' => base64_encode($item->id)]) }}"
                                            type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Proses Data"><i
                                                class="fa fa-life-ring"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <a href="{{ route('pengembalian') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                </div>
            </div>
        </div>
    </div>
</section>
