<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Tambah Rak</strong></h5>
            <div class="card-body">
                <form action="{{ route('simpantambahrak') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Rak</label>
                        <input type="text" class="form-control" name="namarak">
                    </div>
                    <div class="text-center mt-2">
                        <a href="{{ route('rak') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
