<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Data Buku</strong></h5>
            <div class="card-body">
                <a type="button" class="btn btn-primary btn-md text-right btntambah" href="{{ route('tambahbuku') }}"><i
                        class="fa fa-plus"></i>
                    Tambah</a>
                @if ($errors->any())
                    <div class="alert mt-3 alert-primary" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-bordered" id="tbperpustakaan"
                        style="width : 100%; table-layout : fixed;">
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
                        <tbody>
                            @foreach ($databuku as $item)
                                <tr>
                                    <td>{{ $item->kode_buku  }}</td>
                                    <td>{{ $item->judul_buku  }}</td>
                                    <td>{{ $item->penerbit  }}</td>
                                    <td>{{ $item->pengarang  }}</td>
                                    <td>{{ $item->nama_kategori  }}</td>
                                    <td>{{ $item->namarak }}</td>
                                    <td>
                                        <div class="text-center">
                                            <a type="button" href="{{ route('editbuku',['id' => base64_encode($item->kode_buku )]) }}" class="btn btn-primary btn-sm btnedit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a type="button" href="{{ route('hapusdatasiswa',['id' => base64_encode($item->kode_buku )]) }}" class="btn btn-danger btn-sm btnhapus" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data""><i class="fa fa-trash"></i></a>
                                        </div>
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
