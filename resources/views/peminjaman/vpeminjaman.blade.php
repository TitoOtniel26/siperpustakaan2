<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Data Peminjaman</strong></h5>
            <div class="card-body">
                <h4 class="text-center">Anda Sedang Tidak Meminjam Buku</h4>
                <a type="button" class="btn btn-primary btn-md text-right btntambah ml-2"
                    href="{{ route('tambahpeminjaman') }}"><i class="fa fa-plus"></i>
                    Tambah</a>

                @if ($errors->any())
                    <div class="alert mt-3 alert-primary" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('caripeminjaman') }}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="date" name="tglawal" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="date" name="tglakhir" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
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
                                        @if($item->is_selesai == 1)
                                            <span>Selesai</span>
                                        @else
                                        <a href="{{ route('editdatapeminjaman', ['id' => base64_encode($item->id)]) }}"
                                            type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Detail Data"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('hapusdatapeminjaman', ['id' => base64_encode($item->id)]) }}"
                                            type="button" class="btn btn-danger btn-sm btnhapus"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"><i
                                                class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
