<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Desa Perapakan</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="{{ asset('/image/Sambas Logo compress 300x300.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Inter:wght@400;700&family=Lora:wght@400;700&family=Poppins:wght@400;700&family=Lato:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs5.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    @yield('kodeatas')
    <style>
        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 0.875rem;
            opacity: 1;
            overflow-y: scroll;
            margin: 0;
        }

        a {
            cursor: pointer;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }
        .sidebar-item{
            list-style: none;
        }

        h4 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3rem;
            color: rgb(196, 0, 39);
        }

        .card-body .jumlah {
            font-weight: bold;
        }

        h5 {
            font-weight: bold;
        }

        /* .bs-sn ol{
            
            list-style-type: decimal;
        }
        .bs-sn ul{
            
            list-style-type: disc;
        } */
    </style>

</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="sticky-top" style="height: 100vh; overflow-y: auto;">
            <!-- Content fo Sidebar -->
            <div class="h100">
                <div class="sidebar-logo collapsed-icon">
                    <a href="#">Desa Capkala</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="admin" class="sidebar-link {{ Request::is('admin*') ? 'active' : '' }}"
                            id="admin-dashboard">
                            <i class="fa-solid fa-list pe-2"></i>
                            <span class="link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="profildesa" class="sidebar-link {{ Request::is('profildesa*') ? 'active' : '' }}"
                            id="admin-profile-desa">
                            <i class="fa-solid fa-id-card pe-2"></i>
                            <span class="link-text">Profile Desa</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="perangkatdesa" class="sidebar-link {{ Request::is('perangkatdesa*') ? 'active' : '' }}"
                            id="admin-perangkat-desa">
                            <i class="fa-solid fa-user-tie pe-2"></i>
                            <span class="link-text">Perangkat Desa</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="lembagadesa"
                            class="sidebar-link {{ Request::is('lembagadesa*') ? 'active' : '' }}"
                            id="admin-lembaga-desa">
                            <i class="fa-solid fa-landmark pe-2"></i>
                            <span class="link-text">Lembaga Desa</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="layananpublik"
                            class="sidebar-link {{ Request::is('layananpublik*') ? 'active' : '' }}"
                            id="admin-layanan-publik">
                            <i class="fa-solid fa-hands-helping pe-2"></i>
                            <span class="link-text">Layanan Publik</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="layananadministrasi"
                            class="sidebar-link {{ Request::is('layananadministrasi*') ? 'active' : '' }}"
                            id="admin-layanan-administrasi">
                            <i class="fa-solid fa-file-signature pe-2"></i>
                            <span class="link-text">Layanan Administrasi</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="pengumuman" class="sidebar-link {{ Request::is('pengumuman*') ? 'active' : '' }}"
                            id="admin-pengumuman">
                            <i class="fa-solid fa-bullhorn pe-2"></i>
                            <span class="link-text">Pengumuman</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="kegiatan" class="sidebar-link {{ Request::is('kegiatan*') ? 'active' : '' }}"
                            id="admin-kegiatan">
                            <i class="fa-solid fa-calendar-day pe-2"></i>
                            <span class="link-text">Kegiatan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="kontak" class="sidebar-link {{ Request::is('kontak*') ? 'active' : '' }}"
                            id="admin-kontak">
                            <i class="fa-solid fa-address-book pe-2"></i>
                            <span class="link-text">Kontak</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a href="daftardesa"
                            class="sidebar-link {{ Request::is('daftardesa*') ? 'active' : '' }}"
                            id="">
                            <i class="fa-solid fa-user pe-2"></i>
                            <span class="link-text">Daftar Desa</span>
                        </a>
                    </li> --}}
                </ul>

            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="img/6.jpg" class="avatar img-fluid" alt="User Avatar">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-user-gear pe-2"></i>
                                    Profile
                                </a>
                                <form action="/logout" method="POST" class="dropdown-item">
                                    @csrf
                                    <i class="fa-solid fa-right-from-bracket pe-2"></i>
                                    <button type="submit" style="all: unset; cursor: pointer;">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            {{-- dari sini --}}
            @yield('child')
            {{-- sampai sini --}}
        </div>
    </div>


    <!-- Scripts -->

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('kodejs')
    <script>
        const sidebarToggle = document.querySelector("#sidebar-toggle");
        sidebarToggle.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("collapsed");
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#summernote2').summernote({
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#summernote-sejarah').summernote({
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#summernote-misidesa').summernote({
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#summernote-layadmin-create').summernote({
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#summernote-layadmin-update').summernote({
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // Toastr configuration
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };

            // Show Toastr based on Laravel session
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @elseif (session('error'))
                toastr.error("{{ session('error') }}");
            @elseif (session('info'))
                toastr.info("{{ session('info') }}");
            @elseif (session('warning'))
                toastr.warning("{{ session('warning') }}");
            @endif
        });
    </script>
</body>
</html>