<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Data Pengembalian</strong></h5>
            <div class="card-body">
                <a type="button" class="btn btn-primary btn-md text-right btntambah"
                    href="{{ route('tambahpengembalian') }}"><i class="fa fa-plus"></i> Tambah</a>
                @if ($errors->any())
                    <div class="alert mt-3 alert-primary" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{ route('caripengembalian') }}" method="POST">
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
                    <table class="table table-hover table-bordered display nowrap" id="tbperpustakaan"
                        style="width : 100%;">
                        <thead>
                            <tr>
                                <th>Kode Pengembalian</th>
                                <th>Kode Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Nama Petugas</th>
                                <th>Nominal Denda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datapengembalian as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->id_peminjaman }}</td>
                                    <td>{{ date('d-m-Y',strtotime($item->tanggal_pengembalian)) }}</td>
                                    <td>{{ $item->namapetugas }}</td>
                                    <td>@currency($item->nominaldenda)</td>
                                    <td>
                                        <a href="{{ route('detailpengembalian', ['id' => base64_encode($item->id)]) }}"
                                            type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Detail Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('hapusdetailpengembalian', ['id' => base64_encode($item->id)]) }}"
                                                type="button" class="btn btn-danger btn-sm btnhapus"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"><i
                                                    class="fa fa-trash"></i></a>
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
