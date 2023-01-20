<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Edit Rak</strong></h5>
            <div class="card-body">
                <form action="{{ route('simpaneditrak') }}" method="POST">
                    @csrf
                    @foreach($datarak as $item)
                    <input type="hidden" name="id_rak" value="{{ base64_encode($item->id) }}">
                    <div class="form-group">
                        <label for="">Nama Rak</label>
                        <input type="text" class="form-control" name="namarak" value="{{ $item->namarak }}">
                    </div>
                    @endforeach
                    <div class="text-center mt-2">
                        <a href="{{ route('rak') }}" type="button" class="btn btn-danger btn-md">KEMBALI</a>
                        <button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
