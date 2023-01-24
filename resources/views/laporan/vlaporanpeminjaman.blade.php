<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

    <style>
        @page {
            size: landscape;
        }

        body {
            margin: 2em;

            background-color: #fff;
        }

        hr {

            height: 4px;
            /* Set the hr color */
            color: #333;
            /* old IE */
            background-color: #333;
            /* Modern Browsers */
        }

        /* override styles when printing */
        @media print {

            body {
                margin: 0;
                background-color: #fff;
            }

            hr {
                border: none;
                height: 4px;
                color: #333;
                background-color: #333;
            }
        }
    </style>
</head>

<body>
    <table style="width : 100%">
        <tbody>
            <tr>
                <td style="width : 20%;">
                    <img src="{{ asset('img/iconsmpwarga.png') }}" class="img-thumbnail ml-5">
                </td>
                <td class="text-center">
                    <div class="text-center">
                        <h1><strong>PERPUSTAKAAN SMP WARGA SURAKARTA</strong></h1>
                        <h3>Jl. Monginsidi No.15, Tegalharjo, Kec. Jebres, Kota Surakarta, Jawa Tengah 57128 <br>(0271)
                            638874</h3>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <div class="text-center">
        <h3>Laporan Peminjaman</h3>
    </div>
    <br>
    <div class="row text-center">
        <div class="col-md-6">
            <strong>Dari Tanggal : <?php echo date('d-m-Y', strtotime($tanggalawal)); ?></strong>
        </div>
        <div class="col-md-6">
            <strong>Sampai Tanggal : <?php echo date('d-m-Y', strtotime($tanggalakhir)); ?></strong>
        </div>
    </div>

    <table class="" style="width : 100%; table-layout:fixed;">
        <thead>
            <tr style="border: 2px solid;">
                <th style="border: 2px solid; width:12%;" class="text-center">Kode Peminjaman</th>
                <th style="border: 2px solid; width:8%;" class="text-center">NISN</th>
                <th style="border: 2px solid; width:10%;" class="text-center">Nama Anggota</th>
                <th style="border: 2px solid; width:9%;" class="text-center">Tanggal Peminjaman</th>
                <th style="border: 2px solid; width:9%;" class="text-center">Tanggal Kembali</th>
                <th style="border: 2px solid; width:12%;" class="text-center">Kode Buku</th>
                <th style="border: 2px solid; width:13%;" class="text-center">Judul Buku</th>
                <th style="border: 2px solid; width:10%;" class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datapeminjaman as $item)
                <tr>
                    <td style="border: 2px solid;">{{ $item->kodepeminjaman }}</td>
                    <td style="border: 2px solid;">{{ $item->nisn }}</td>
                    <td style="border: 2px solid;">{{ $item->namaanggota }}</td>
                    <td style="border: 2px solid;">{{ $item->tanggalpinjam }}</td>
                    <td style="border: 2px solid;">{{ $item->tanggalkembali }}</td>
                    <td style="border: 2px solid;" class="tdcenter">{{ $item->kodebuku }}</td>
                    <td style="border: 2px solid;" class="tdcenter">{{ $item->judulbuku }}</td>
                    <td style="border: 2px solid;">{{ $item->statuspeminjaman }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
<script>
    $('.tdcenter').each(function() {
        let thistext = $(this).text()
        var regex = /<br\s*[\/]?>/gi;
        let a = thistext.replace(/,/g, '<br>');
        $(this).html(a)
    });
    window.print();
</script>
