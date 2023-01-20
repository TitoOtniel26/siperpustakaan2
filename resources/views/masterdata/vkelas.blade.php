<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Data Kelas</strong></h5>
            <div class="card-body">
                <a type="button" class="btn btn-primary btn-md text-right btntambah" href="{{  route('tambahkelas') }}"><i class="fa fa-plus"></i> Tambah</a>
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
                                <th style="width : 6%;">Nomor</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                           @foreach($datakelas as $item)
                           <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->namakelas }}</td>
                                <td>
                                    <a href="{{ route('editkelas',['id'=> base64_encode($item->id)]) }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('hapuskelas',['id' => base64_encode($item->id)]) }}" type="button" class="btn btn-danger btn-sm btnhapus"><i class="fa fa-trash"></i></a>
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
