<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>SIP - SMP WARGA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/iconsmpwarga.png') }}" rel="icon">
    <link href="{{ asset('img/iconsmpwarga.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .dataTables_filter {
            margin-bottom: 15px;
        }
    </style>
    <style>
        .select2-container--default .select2-selection--single {
            height: 36px !important;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .375rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 85% !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 26px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #CCC !important;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        }
    </style>


    {{-- DataTable CSS --}}
    <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">

    {{-- Font Awesome 4 CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block text-center">SISTEM INFORMASI PERPUSTAKAAN</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                {{-- <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav --> --}}

                <li class="nav-item dropdown pe-3">


                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->nama_user }}</span>
                    </a><!-- End Profile Iamge Icon -->
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{auth()->user()->nama_user}}</h6>
                            <span>({{auth()->user()->status}})</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('myprofile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        {{-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li> --}}
                        <li>
                            <hr class="dropdown-divider">
                        </li> 

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">


            @if (auth()->user()->status == 'Petugas')
                <li class="nav-item">
                    <a class="nav-link <?= $parentmenu == 'dashboard' ? '' : 'collapsed' ?>"
                        href="{{ route('dashboard') }}">
                        <i class="ri-home-4-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif


            @if (auth()->user()->status == 'Petugas')
                <li class="nav-item">
                    <a class="nav-link <?= $parentmenu == 'master' ? '' : 'collapsed' ?>"
                        data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="ri-list-check"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav"
                        class="nav-content {{ $collapsing == 'true' ? 'collapse show' : 'collapse' }} "
                        data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="{{ $collapsemenu == 'siswa' ? 'active' : '' }}" href="{{ route('siswa') }}">
                                <i class="bi bi-circle"></i><span>Siswa</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('petugas') }}" class="{{ $collapsemenu == 'petugas' ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Petugas</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ $collapsemenu == 'kategori' ? 'active' : '' }}"
                                href="{{ route('kategori') }}">
                                <i class="bi bi-circle"></i><span>Kategori</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ $collapsemenu == 'rak' ? 'active' : '' }}" href="{{ route('rak') }}">
                                <i class="bi bi-circle"></i><span>Rak</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ $collapsemenu == 'kelas' ? 'active' : '' }}" href="{{ route('kelas') }}">
                                <i class="bi bi-circle"></i><span>Kelas</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ $collapsemenu == 'buku' ? 'active' : '' }}" href="{{ route('buku') }}">
                                <i class="bi bi-circle"></i><span>Buku</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif



            <li class="nav-item">
                <a class="nav-link <?= $parentmenu == 'pengadaan' ? '' : 'collapsed' ?>"
                    href="{{ route('pencarianbuku') }}">
                    <i class="fa fa-search"></i>
                    <span>Cari Buku</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= $parentmenu == 'peminjaman' ? '' : 'collapsed' ?>"
                    href="{{ route('peminjaman') }}">
                    <i class="fa fa-upload"></i>
                    <span>Peminjaman</span>
                </a>
            </li>



            @if (auth()->user()->status == 'Petugas')
                <li class="nav-item">
                    <a class="nav-link <?= $parentmenu == 'pengembalian' ? '' : 'collapsed' ?>"
                        href="{{ route('pengembalian') }}">
                        <i class="fa fa-download"></i>
                        <span>Pengembalian</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  <?= $parentmenu == 'laporan' ? '' : 'collapsed' ?>"
                        href="{{ route('laporan') }}">
                        <i class="ri-newspaper-line"></i>
                        <span>Laporan</span>
                    </a>
                </li>
            @endif

            <!-- End Components Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="breadcrumb"></div>
        </div><!-- End Page Title -->

        <div class="contenview">
            @include($contentview)
        </div>
    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

    {{-- Datatable --}}
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
        function getBreadcrumbs() {
            const here = location.href.split('/').slice(3);
            // console.log(here)
            const parts = [{
                "text": '',
                "link": ''
            }];

            for (let i = 0; i < here.length; i++) {
                const part = here[i];
                const text = decodeURIComponent(part).toUpperCase().split('.')[0];
                const link = '/' + here.slice(0, i + 1).join('/');
                parts.push({
                    "text": text,
                    "link": link
                });
            }
            return parts.map((part) => {
                return "<a href=\"" + part.link + "\">" + part.text + "</a>"
            }).join('<span style="padding: 5px">/</span>')
        }

        $('.breadcrumb').html(getBreadcrumbs());
    </script>
    <script>
        let base_url = window.location.origin;

        $(document).ready(function() {
            $('#tbperpustakaan').DataTable({
                pageLength: 10,
                lengthMenu: [10, 25, 50]
            });

            $('.select2').select2();
        });
    </script>

    <script>
        function enum_item(value, listenum) {
            if (value == listenum) {
                return 'selected';
            }
        }

        function tampilkanPreview(gambar, idpreview) {
            //                membuat objek gambar
            var gb = gambar.files;
            //                loop untuk merender gambFar
            for (var i = 0; i < gb.length; i++) {
                //                    bikin variabel
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var preview = document.getElementById(idpreview);
                var reader = new FileReader();
                if (gbPreview.type.match(imageType)) {
                    //                        jika tipe data sesuai
                    preview.file = gbPreview;
                    reader.onload = (function(element) {
                        return function(e) {
                            element.src = e.target.result;
                        };
                    })(preview);
                    //                    membaca data URL gambar
                    reader.readAsDataURL(gbPreview);
                } else {
                    //                        jika tipe data tidak sesuai
                    alert(
                        "Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar."
                    );
                }
            }
        }

        function minTanggal(inputdateclass) {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();

            if (dd < 10) {
                dd = '0' + dd;
            }

            if (mm < 10) {
                mm = '0' + mm;
            }

            today = yyyy + '-' + mm + '-' + dd;
            $('.' + inputdateclass).attr("min", today);
        }
    </script>


    @foreach ($jsitem as $js)
        <script src='{{ asset('js/' . $js . '.min.js') }}'></script>
    @endforeach

</body>

</html>
