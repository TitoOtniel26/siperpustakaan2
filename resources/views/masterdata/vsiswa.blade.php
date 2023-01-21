<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Data Siswa</strong></h5>
            <div class="card-body">
                <a type="button" class="btn btn-primary btn-md text-right btntambah" href="{{  route('tambahsiswa') }}"><i class="fa fa-plus"></i>
                    Tambah</a>
                    @if($errors->any())
                        <div class="alert mt-3 alert-primary" role="alert">
                            {{ $errors->first()}}
                        </div>
                    @endif
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-bordered" id="tbperpustakaan"
                        style="width : 100%;">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($datauser as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->no_identitas }}</td>
                                <td>{{ $item->nama_user }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->username }}</td>
                                <td>
                                    <div class="text-center">
                                        <a type="button" href="{{ route('editsiswa',['id' => base64_encode($item->id)]) }}" class="btn btn-primary btn-sm btnedit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                        <a type="button" href="{{ route('hapusdatasiswa',['id' => base64_encode($item->id)]) }}" class="btn btn-danger btn-sm btnhapus" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data""><i class="fa fa-trash"></i></a>
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
