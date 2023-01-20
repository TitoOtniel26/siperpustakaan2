<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Tambah Rak</strong></h5>
            <div class="card-body">
                <form action="{{ route('simpaneditkelas') }}" method="POST">
                    @csrf
                    @foreach ($datakelas as $item)
                    <input type="hidden" value="{{ base64_encode($item->id) }}" name="id_kelas">
                        <div class="form-group">
                            <label for="">Nama Kelas</label>
                            <input type="text" class="form-control" name="namakelas" value="{{ $item->namakelas }}">
                        </div>
                    @endforeach
                    <div class="text-center mt-2">
                        <a href="{{ route('kelas') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
