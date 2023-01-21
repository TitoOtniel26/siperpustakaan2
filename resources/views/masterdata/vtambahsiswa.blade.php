<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Tambah Siswa</strong></h5>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert mt-3 alert-primary" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{ route('simpantambahsiswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3">
                            <img src="https://i.pinimg.com/originals/f1/0f/f7/f10ff70a7155e5ab666bcdd1b45b726d.jpg"
                                class="img-thumbnail" id="preview">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Input Foto</label>
                        <input type="file" name="foto" class="form-control"
                            accept="image/png, image/gif, image/jpeg" onchange="tampilkanPreview(this, 'preview')">
                    </div>
                    <div class="form-group">
                        <label for="">NISN</label>
                        <input type="text" class="form-control" name="no_identitas">
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama_user">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="kelas" class="form-control">
                            @foreach ($datakelas as $item)
                                <option value="{{ $item->id }}">{{ $item->namakelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No Telepon</label>
                        <textarea name="no_telp" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('siswa') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
