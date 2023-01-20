<section>
    <div class="container-fluid">
        <div class="card h-100">
            <h5 class="card-header"><strong>Laporan</strong></h5>
            <div class="card-body">
                <form action="" method="POST" target="_blank" class="mt-3">
                    @csrf
                    <table style="width : 100%;">
                        <tbody>
                            <tr>
                                <td style="width: 12%;"><label for="">Jenis Laporan</label></td>
                                <td>:</td>
                                <td>
                                    <select name="jenislaporan" id="" class="form-control">
                                        <option value="">-- PILIH JENIS LAPORAN--</option>
                                        <option value="1">Pengadaan</option>
                                        <option value="2">Pengeluaran</option>
                                    </select>
                                </td>
                                <td rowspan="3" class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Proses</button>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Tanggal Mulai</label></td>
                                <td>:</td>
                                <td>
                                    <input type="date" class="form-control" name="tanggalawal" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Tanggal Selesai</label></td>
                                <td>:</td>
                                <td>
                                    <input type="date" class="form-control" name="tanggalakhir" required>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
