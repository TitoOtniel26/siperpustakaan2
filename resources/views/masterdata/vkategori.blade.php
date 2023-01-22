<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Data Kategori</strong></h5>
            <div class="card-body">
                <a type="button" class="btn btn-primary btn-md text-right btntambah" href="{{ route('tambahkategori') }}"><i class="fa fa-plus"></i> Tambah</a>
                    @if($errors->any())
                        <div class="alert mt-3 alert-primary" role="alert">
                            {{ $errors->first()}}
                        </div>
                    @endif
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-bordered display nowrap" id="tbperpustakaan"
                        style="width : 100%;">
                        <thead>
                            <tr>
                                <th style="width : 8%;">Nomor</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($datakategori as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>
                                    <div class="text-center">
                                        <a href="{{ route('editkategori',['id'=> base64_encode($item->id)]) }}" type="button" class="btn btn-primary btn-sm"  data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('hapusdatakategori',['id' => base64_encode($item->id)]) }}" type="button" class="btn btn-danger btn-sm btnhapus"  data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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
