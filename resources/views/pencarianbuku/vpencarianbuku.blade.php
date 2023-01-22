<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Pencarian Buku</strong></h5>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert mt-3 alert-primary" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-bordered display" id="tbperpustakaan"
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
                                            <a type="button" href="{{ route('detailbuku',['id' => base64_encode($item->kode_buku )]) }}" class="btn btn-primary btn-sm btninfo" data-bs-toggle="tooltip" data-bs-placement="top" title="Informasi Buku"><i class="fa fa-info-circle"></i></a>
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
