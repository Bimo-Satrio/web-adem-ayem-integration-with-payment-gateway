<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adem Ayem - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('Mazer')}}/assets/css/main/app.css" />
    <link rel="stylesheet" href="{{asset('Mazer')}}/assets/css/main/app-dark.css" />
    <link rel="shortcut icon" href="{{asset('Mazer')}}/assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="{{asset('Mazer')}}/assets/images/logo/favicon.png" type="image/png" />
    <link rel="stylesheet" href="{{asset('Mazer')}}/assets/css/shared/iconly.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js'></script>

    @livewireStyles
</head>


<body>
    @if (Route::has('login'))
    @guest

    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a  href="{{ route('home') }}"
                              ><h5>Kontrakan Adem Ayem</h5></a>
                          </div>
                        <div class="header-top-right">

                            <div class="nav-item" role="presentation">
                                <a class="nav-link" href="{{ route('login') }}" aria-selected="true">{{ __('Login') }}</a>
                            </div>
                            <div class="theme-toggle d-flex gap-2 align-items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                        <g transform="translate(-210 -1)">
                                            <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                            <circle cx="220.5" cy="11.5" r="4"></circle>
                                            <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                        </g>
                                    </g>
                                </svg>
                                <div class="form-check form-switch fs-6">
                                    <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                                    <label class="form-check-label"></label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                                </svg>
                            </div>



                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item">
                                <a href="/" class="menu-link">
                                    <span>Beranda</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{url('f-a-q')}}" class="menu-link">
                                    <span>Pertanyaan Yang Sering Diajukan</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('tentang')}}" class="menu-link">
                                    <span>Tentang Kontrakan Adem Ayem</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>




            </header>

            <div class="content-wrapper container">
                @yield('content')
            </div>

            <footer>
                <div class="container-fluid">
                    <div class="container">
                        <div class="footer clearfix mb-0 text-muted">
                            <div class="float-start">
                                <p>{{ now()->year }} &copy; Kontrakan Adem Ayem</p>
                            </div>
                            <div class="float-end">
                                <p>
                                    Crafted with
                                    <span class="text-danger"><i class="bi bi-heart"></i></span>
                                    by <a href="https://instagram.com/bimo_wicaksono_138">Bimo Satrio Wicaksono</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>








    @else
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="/"><h5>Kontrakan Adem Ayem</h5></a>
                        </div>
                        <div class="header-top-right">

                            <div class="dropdown">

                                <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-lg me-3">  @livewire('user-notification')
                                        <img class="text-center"
                                        @if(Auth::user()->avatar == NULL)
                                         src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&rounded=true"/>
                                        @else
                                        <img src="{{ asset(Auth::user()->avatar) }}" alt="">
                                        @endif
                                    </div>

                                    <div class="text">
                                        <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                                        <p class="user-dropdown-status text-sm text-muted">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">

                                    <li>
                                        <a class="dropdown-item" href="">
                                            Notifikasi  @livewire('notif')
                                        </a>

                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('user-profiles') }}">Profile Saya</a>
                                    </li>



                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>

                                        <a class="dropdown-item" href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                    </li>
                                </ul>
                            </div>
                            <div class="theme-toggle d-flex gap-2 align-items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                        <g transform="translate(-210 -1)">
                                            <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                            <circle cx="220.5" cy="11.5" r="4"></circle>
                                            <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                        </g>
                                    </g>
                                </svg>
                                <div class="form-check form-switch fs-6">
                                    <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                                    <label class="form-check-label"></label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                                </svg>
                            </div>
                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item {{ request()->is('/') ? 'active'  : '' }} ">
                                <a href="/" class="menu-link">
                                    <span>Beranda</span>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="{{url('f-a-q')}}" class="menu-link ">
                                    <span>Pertanyaan Yang Sering Diajukan</span>
                                </a>
                            </li>


                            <li class="menu-item">
                                <a href="{{route('tentang')}}" class="menu-link">
                                    <span>Tentang Kontrakan Adem Ayem</span>
                                </a>
                            </li>



                            <li class="menu-item">
                                <a href="{{url('rent')}}" class="menu-link">

                                       <span>Pengajuan Penyewaan</span>


                                </a>
                            </li>

                            <li class="menu-item ">
                                <a href="{{url('riwayat-pengajuan')}}" class="menu-link ">
                                    <span>Riwayat Transaksi Penyewaan</span>
                                </a>
                            </li>


                            @if(Auth::user()->is_admin =='2')
                            <li class="menu-item">
                                <a href="{{route('dashboard')}}" class="menu-link">
                                    <span>Admin</span>
                                </a>
                            </li>

                            @elseif(Auth::user()->is_admin == 1)
                            <li class="menu-item">
                                <a href="{{ route('laporan-pemilik-unit') }}" class="menu-link">
                                    <span>Pemilik</span>
                                </a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </nav>




            </header>

            <div class="content-wrapper container">
                @yield('content')
            </div>

            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div style=" text-align: center">
                            <p>{{ now()->year }} &copy; Kontrakan Adem Ayem</p>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>

    @endguest
    @endif


    <!--sweetalert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/63ba4fe947425128790c40e2/1gm7sga8h';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->


    <script>
        window.addEventListener('editProfileSuccess', event => {
            Swal.fire(
                'Berhasil',
                'Profile Telah Diubah',
                'success'
            ).then(function() {
                window.location.href = "{{route('rent')}}"
            })
        })
    </script>

    <script>
        window.addEventListener('userEditProfileSuccess', event => {
            Swal.fire(
                'Berhasil',
                'Profile Telah Diubah',
                'success'
            ).then(function() {
                window.location.href = "{{route('user-profiles')}}"
            })
        })
    </script>


    <script>
        window.addEventListener('notfound', event => {
            Swal.fire(
                'Error Parsing Data',
                'Silahkan Kontak Pembuat Web',
                'error'
            )
        });
    </script>


    <script>
        window.addEventListener('noVerifiedEmail', event => {
            Swal.fire(
                'Gagal',
                'Anda Belum Melakukan Verifikasi Email',
                'error'
            )
        });
    </script>





    <script>
        window.addEventListener('warntologin', event => {
            Swal.fire(
                'Gagal',
                'Silahkan Login Terlebih Dahulu',
                'error'
            )
        });
    </script>

    <script>
        window.addEventListener('outofstok', event => {
            Swal.fire(
                'Gagal',
                'Unit Kontrakan Tidak Tersedia',
                'error'
            )
        });
    </script>

    <script>
        window.addEventListener('rentsuccess', event => {
            Toastify({
                text: "Unit Kontrakan Berhasill Masuk Ke Daftar Pengajuan Sewa",
                hideProgressBar: false,
                duration: 3000,
                close: true,
                stopOnFocus: true,
                gravity: "top", // `top` or `bottom`
                positionLeft: false, // `true` or `false`
                theme: "light",
            }).showToast();
        });
    </script>


    <script>
        window.addEventListener('bookingfailed', event => {
            Toastify({
                text: "Silahkan Selesaikan Unit Kontrakan Yang Sudah Masuk Didalam Daftar Pengajuan Sewa Terlebih Dahulu",
                hideProgressBar: false,
                duration: 3000,
                close: true,
                stopOnFocus: true,
                gravity: "top", // `top` or `bottom`
                positionLeft: false, // `true` or `false`
                theme: "light",
            }).showToast();
        });
    </script>


    <script>
        window.addEventListener('destroybooking', event => {
            Toastify({
                text: "Berhasil Menghapus Dari Daftar Ajukan Sewa",
                hideProgressBar: false,
                duration: 3000,
                close: true,
                stopOnFocus: true,
                gravity: "top", // `top` or `bottom`
                positionLeft: false, // `true` or `false`
                theme: "light",
            }).showToast();
        });
    </script>



    <script>
        window.addEventListener('ktpUploadSuccess', event => {
            Toastify({
                text: "Berhasil Upload KTP",
                hideProgressBar: false,
                duration: 3000,
                close: true,
                stopOnFocus: true,
                gravity: "top", // `top` or `bottom`
                positionLeft: false, // `true` or `false`
                theme: "light",
            }).showToast();
        });
    </script>


    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    <script src="{{asset('Mazer')}}/assets/exzoom/jquery.exzoom.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- mazer stuff -->
    <script src="{{asset('Mazer')}}/assets/js/bootstrap.js"></script>
    <script src="{{asset('Mazer')}}/assets/js/app.js"></script>
    <script src="{{asset('Mazer')}}/assets/js/pages/horizontal-layout.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireScripts


</body>
