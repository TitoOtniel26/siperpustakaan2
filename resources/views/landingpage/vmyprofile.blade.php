<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Profil</strong></h5>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert mt-3 alert-primary" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="text-left mt-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ganti Password
                    </button>
                </div>
                <form action="{{ route('simpaneditprofil') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach ($datasiswa as $item)
                        <input type="hidden" value="{{ base64_encode($item->id) }}" name="id_siswa">
                        <input type="hidden" value="{{ base64_encode($item->foto) }}" name="nama_foto_lama">

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-3">
                                <img src="{{ asset('img/assetimg/' . $item->foto) }}" class="img-thumbnail"
                                    id="preview">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Input Foto</label>
                            <input type="file" name="foto" class="form-control"
                                accept="image/png, image/gif, image/jpeg" onchange="tampilkanPreview(this, 'preview')">
                        </div>
                        <div class="form-group">
                            <label for="">NISN</label>
                            <input type="text" class="form-control" name="no_identitas"
                                value="{{ $item->no_identitas }}">

                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama_user" value="{{ $item->nama_user }}">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="Laki-Laki" <?= $item->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' ?>>
                                    Laki-Laki</option>
                                <option value="Perempuan" <?= $item->jenis_kelamin == 'Perempuan' ? 'selected' : '' ?>>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control">{{ $item->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas" class="form-control">
                                @foreach ($datakelas as $kelas)
                                    <option value="{{ $kelas->id }}"
                                        <?= $kelas->id == $item->kelas ? 'selected' : '' ?>>{{ $kelas->namakelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <input type="text" name="no_telp" class="form-control" value="{{ $item->no_telp }}">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $item->username }}">
                        </div>
                    @endforeach
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('simpanpasswordprofilbaru') }}" method="POST">
                    @csrf
                    @foreach ($datasiswa as $item)
                    <input type="hidden" value="{{ base64_encode($item->id) }}" name="id_siswa">
                    @endforeach
                    <div class="form-group">
                        <label for="">Ganti Password</label>
                        <input type="text" name="password" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
