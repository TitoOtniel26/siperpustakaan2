<style>
    .order-card {
        color: #fff;
    }

    .bg-c-blue {
        background: linear-gradient(45deg, #4099ff, #73b4ff);
    }

    .bg-c-green {
        background: linear-gradient(45deg, #2ed8b6, #59e0c5);
    }

    .bg-c-yellow {
        background: linear-gradient(45deg, #FFB64D, #ffcb80);
    }

    .bg-c-pink {
        background: linear-gradient(45deg, #FF5370, #ff869a);
    }


    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        border: none;
        margin-bottom: 30px;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .card .card-block {
        padding: 25px;
    }

    .order-card i {
        font-size: 26px;
    }

    .f-left {
        float: left;
    }

    .f-right {
        float: right;
    }
</style>
<section>
    <div class="container-fluid">
        <div class="card h-100">
            <div class="card-body">
                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-block">
                                <h6 class="m-b-20 text-center"><strong>ANGGOTA</strong></h6>

                                @foreach ($jmlhanggota as $item)
                                    <h2 style="text-align: right;"><i
                                            class="fa fa-users f-left"></i><span>{{ $item->jmlanggota }}</span></h2>
                                @endforeach

                                <p class="m-b-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h6 class="m-b-20 text-center"><strong>BUKU</strong></h6>

                                @foreach ($jmlbuku as $item)
                                    <h2 style="text-align: right;"><i
                                            class="fa fa-book f-left"></i><span>{{ $item->jmlbuku }}</span></h2>
                                @endforeach

                                <p class="m-b-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-yellow order-card">
                            <div class="card-block">
                                <h6 class="m-b-20 text-center"><strong>PETUGAS</strong></h6>


                                @foreach ($jmlpetugas as $item)
                                    <h2 style="text-align: right;"><i
                                            class="fa fa-user-secret f-left"></i><span>{{ $item->jmlpetugas }}</span></h2>
                                @endforeach


                                <p class="m-b-0"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-block">
                                <h6 class="m-b-20 text-center"><strong>PEMINJAMAN</strong></h6>

                                @foreach ($jmlpeminjaman as $item)
                                    <h2 style="text-align: right;"><i
                                            class="fa fa-upload f-left"></i><span>{{ $item->jmlhpeminjaman }}</span></h2>
                                @endforeach

                                <p class="m-b-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h6 class="m-b-20 text-center"><strong>PENGEMBALIAN</strong></h6>

                                @foreach ($jmlpengembalian as $item)
                                    <h2 style="text-align: right;"><i
                                            class="fa fa-download f-left"></i><span>{{ $item->jmlpengembalian }}</span>
                                    </h2>
                                @endforeach

                                <p class="m-b-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-yellow order-card">
                            <div class="card-block">
                                <h6 class="m-b-20 text-center"><strong>NOMINAL DENDA</strong></h6>

                                @foreach ($nominaldenda as $item)
                                    <h2 style="text-align: right;"><i
                                            class="fa fa-money f-left"></i><span>@currency($item->nominaldenda)</span>
                                    </h2>
                                @endforeach


                                <p class="m-b-0"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
