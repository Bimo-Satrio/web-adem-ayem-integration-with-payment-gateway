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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Mazer')}}/assets/extensions/toastify-js/src/toastify.css" />
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js'></script>
    @livewireStyles

</head>

<body>
    <div id="app">

          @livewire('backend.notification')
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{ route('home') }}"
                              ><h5>Kontrakan Adem Ayem</h5></a>
                          </div>
                        <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
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
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Dashboard dan Beranda</li>

                        <li class="sidebar-item {{ (request()->is('backend/dashboard')) ? 'active' :  '' }} ">
                            <a href="{{route('dashboard')}}" class="sidebar-link       ">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>



                        <li class="sidebar-item">
                            <a href="/" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Beranda </span>
                            </a>
                        </li>

                        <li class="sidebar-title">Data</li>

                        <li class="sidebar-item {{request()->is('backend/unitkontrakan') ? 'active' : ''}}">
                            <a href="{{route('unitkontrakan')}}" class="sidebar-link">
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Unit</span>
                            </a>
                        </li>


                        <li class="sidebar-item  {{ request()->is('backend/penghuni-kontrakan') ? 'active' : '' }} ">
                            <a href="{{route('penghuni-kontrakan')}}" class="sidebar-link">
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Penghuni Unit</span>
                            </a>
                        </li>


                        <li class="sidebar-item {{ request()->is('backend/identity-validate') ? 'active' : '' }}     ">
                            <a href="{{route('identity-validate')}}" class="sidebar-link">
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Konfirmasi Identitas</span>
                            </a>
                        </li>



                        <li class="sidebar-item {{ request()->is('backend/data-lama-huni') ? 'active' : '' }}  ">
                            <a href="{{route('data-lama-huni')}}" class="sidebar-link">
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Lama Huni</span>
                            </a>
                        </li>


                        <li class="sidebar-item {{ request()->is('backend/waiting-list') ? 'active' : '' }}">
                            <a href="{{route('waiting-list')}}" class="sidebar-link">
                                <i class="bi bi-puzzle"></i>
                                <span>Waiting List Unit</span>
                            </a>
                        </li>



                        <li class="sidebar-item {{ request()->is('backend/account-list') ? 'active' : '' }}">
                            <a href="{{route('account-list')}}" class="sidebar-link">
                                <i class="bi bi-puzzle"></i>
                                <span>List Akun</span>
                            </a>
                        </li>


                        <li class="sidebar-title">Pengaturan</li>


                        <li class="sidebar-item {{ request()->is('backend/admin-pilih-laporan') ? 'active' : ''}}">
                            <a href="{{ route('admin-pillih-laporan') }}" class="sidebar-link">
                                <i class="bi bi-basket-fill"></i>
                                <span>Laporan Pembayaran Transaksi Penyewaan</span>
                            </a>
                        </li>


                        <li class="sidebar-item {{ request()->is('backend/carousel') ? 'active' : '' }}">
                            <a href="{{route('carousel')}}" class="sidebar-link">
                                <i class="bi bi-basket-fill"></i>
                                <span>Foto Halaman Beranda</span>
                            </a>
                        </li>


                        <li class="sidebar-item {{ request()->is('backend/f-a-q-list') ? 'active' : '' }}">
                            <a href="{{route('f-a-q-list')}}" class="sidebar-link">
                                <i class="bi bi-basket-fill"></i>
                                <span>Pertanyaan Yang Sering Diajukan</span>
                            </a>
                        </li>




                        <li class="sidebar-item active">
                            <a href="" class="sidebar-link">
                                <i class="bi bi-basket-fill"></i>
                                <span>Syarat dan Ketentuan</span>
                            </a>
                        </li>

                        <li class="sidebar-item active">
                            <a href=""" class="sidebar-link">
                                <i class="bi bi-basket-fill"></i>
                                <span>Tentang Kontrakan Adem Ayem</span>
                            </a>
                        </li>






                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            @yield('content')

            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>


            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{ now()->year }} &copy; Kontrakan Adem Ayem</p>
                    </div>
                    <div class="float-end">
                        <p>
                            Crafted with
                            <span class="text-error"><i class="bi bi-heart"></i></span>
                            by <a href="https://instagram.com/bimo_wicaksono_138">Bimo Satrio</a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <!-- //Summernote JS - CDN Link -->


    <!-- Need: bs app js -->
    <script src="{{asset('Mazer')}}/assets/js/bootstrap.js"></script>
    <script src="{{asset('Mazer')}}/assets/js/app.js"></script>


    <script src="{{asset('Mazer')}}/assets/js/initTheme.js"></script>




    <!--GIS Mapbox -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js'></script>



    <!--sweetalert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.addEventListener('deleteConfirmation', event => {
            Swal.fire({
                title: 'Apakah Kamu Yakin Ingin Menghapus Unit Kontrakan ?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Hapus',
                denyButtonText: `Jangan Hapus`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                } else if (result.isDenied) {
                    Swal.fire('Hapus Dibatalkan', '', 'error')
                }
            })
        })
    </script>




<script>
    window.addEventListener('hapusWaitingList', event => {
        Swal.fire({
            title: 'Hapus ?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Hapus',
            denyButtonText: `Jangan Hapus`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Livewire.emit('batalHapusWaitingList')
            } else if (result.isDenied) {
                Swal.fire('Hapus Dibatalkan', '', 'error')
            }
        })
    })
</script>



    <script>
        window.addEventListener('selesaiWaitingList', event => {
            Swal.fire({
                title: 'Pastikan Telah Menjadi Penghuni Unit kontrakan',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Selesai',
                denyButtonText: `Batalkan`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Livewire.emit('selesaiWaiting')
                } else if (result.isDenied) {
                    Swal.fire('Batal', '', 'error')
                }
            })
        })
    </script>





    <script>
        window.addEventListener('deleteFAQConfirmation', event => {
            Swal.fire({
                title: 'Apakah Kamu Yakin Ingin Menghapus Unit Kontrakan ?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Hapus',
                denyButtonText: `Jangan Hapus`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Livewire.emit('deleteFAQConfirmed')
                } else if (result.isDenied) {
                    Swal.fire('Hapus Dibatalkan', '', 'error')
                }
            })
        })
    </script>

<script>
    window.addEventListener('profileEditSuccess', event => {
        Swal.fire(
                'Berhasil !',
                'Profile Telah Diubah',
                'success',
        ).then(function(){
            window.location.href = "{{ route('dashboard') }}"
        })
    });
</script>


<script>
    window.addEventListener('newTagihanPenghuni', event => {
        Swal.fire(
                'Berhasil !',
                'Tagihan Berhasil Dibuat',
                'success',
        ).then(function(){
            window.location.href = "{{ route('penghuni-kontrakan') }}"
        })
    });
</script>

<script>
    window.addEventListener('existTagihanPenghuni', event => {
        Swal.fire(
                'Berhasil !',
                'Tagihan Berhasil Diubah',
                'success',
        ).then(function(){
            window.location.href = "{{ route('penghuni-kontrakan') }}"
        })
    });
</script>



    <script>
        window.addEventListener('lamaHuniAddSuccess', event => {
            Swal.fire(
                'Berhasil !',
                'Opsi Lama Huni Telah Ditambah',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('data-lama-huni')}}";
            });
        })
    </script>


    <script>
        window.addEventListener('lamaHuniEdit', event => {
            Swal.fire(
                'Berhasil !',
                'Lama Huni Telah Diubah',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('data-lama-huni')}}";
            });
        })
    </script>

    <script>
        window.addEventListener('faqPostSuccess', event => {
            Swal.fire(
                'Berhasil !',
                'FAQ Berhasil Ditambah',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('f-a-q-list')}}";
            });
        })
    </script>

    <script>
        window.addEventListener('carouselUploadSuccess', event => {
            Swal.fire(
                'Berhasil !',
                'Foto Carousel Berhasil di Upload',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('carousel')}}";
            });
        })
    </script>


    <script>
        window.addEventListener('userDeleteConfirmation', event => {
            Swal.fire({
                title: 'Apakah Kamu Yakin Ingin Menghapus Akun ?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Hapus',
                denyButtonText: `Jangan Hapus`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Livewire.emit('destroyUserConfirm')
                } else if (result.isDenied) {
                    Swal.fire('Hapus Dibatalkan', '', 'error')
                }
            })
        })
    </script>

    <script>
        window.addEventListener('destroyLamaHuniConfirmation', event => {
            Swal.fire({
                title: 'Apakah Kamu Yakin Ingin Menghapus Lama Huni ?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Hapus',
                denyButtonText: `Jangan Hapus`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    //kode dibawah ini akan memanggil atau menangkap listeners yang dibuat sebelumnya pada controller
                    //memanggilnya menggunakan emit
                    // kemudian destroy atau penghapusan  akan dijalankan
                    Livewire.emit('destroyLamaHuniConfirm')
                } else if (result.isDenied) {
                    Swal.fire('Hapus Dibatalkan', '', 'error')
                }
            })
        })
    </script>

    <!-- dibawah ini merupakan lanjutkan emit diatas yakni destroy lama huni -->
    <script>
        window.addEventListener('destroyLamaHuni', event => {
            Swal.fire(
                'Berhasil !',
                'Lama Huni Berhasil Dihapus',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('data-lama-huni')}}";
            });
        })
    </script>


    <script>
        window.addEventListener('userUpdate', event => {
            Swal.fire(
                'Berhasil !',
                'Akun Berhasil Diubah',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('account-list')}}";
            });
        })
    </script>


    <script>
        window.addEventListener('userDeleteSucess', event => {
            Swal.fire(
                'Berhasil !',
                'Akun Berhasil Dihapus',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('account-list')}}";
            });
        })
    </script>



    <script>
        window.addEventListener('deleteFAQsucess', event => {
            Swal.fire(
                'Berhasil !',
                'FAQ Berhasil Dihapus',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('f-a-q-list')}}";
            });
        })
    </script>



    <script>
        window.addEventListener('userAddSuccess', event => {
            Swal.fire(
                'Berhasil !',
                'Akun Berhasil Dibuat',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('account-list')}}";
            });
        })
    </script>



    <script>
        window.addEventListener('penguniAddSuccess', event => {
            Swal.fire(
                'Berhasil !',
                'Tersimpan',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('penghuni-kontrakan')}}";
            });
        })
    </script>




    <script>
        window.addEventListener('updatedVal', event => {
            Swal.fire(
                'Berhasil !',
                'Silahkan Menunggu Pembayaran',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('identity-validate')}}";
            });
        })
    </script>

    <script>
        window.addEventListener('createPenghuni', event => {
            Swal.fire(
                'Berhasil !',
                'Penghuni Kontrakan Berhasil Ditambahkan',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('identity-validate')}}";
            });
        })
    </script>

    <script>
        window.addEventListener('edit-sucess', event => {
            Swal.fire(
                'Berhasil Tersimpan !',
                'Perubahan Berhasil Tersimpan',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('unitkontrakan')}}";
            });
        })
    </script>


    <script>
        window.addEventListener('storepostkontrakan', event => {
            Swal.fire(
                'Berhasil Ditambahkan !',
                'Unit Kontrakan Berhasil Ditambahkan',
                'success',
            ).then(function() {
                // Redirect the user
                window.location.href = "{{route('unitkontrakan')}}";
            });
        })
    </script>


    <script>
        window.addEventListener('deletesucess', event => {
            Swal.fire(
                'Berhasil Hapus !',
                'Unit Kontrakan Berhasil Hapus',
                'success',
            );
        })
    </script>



<script>
    window.addEventListener('waitingdeletesucess', event => {
        Swal.fire(
            'Berhasil Hapus !',
            'Waiting List Berhasil Hapus',
            'success',
        );
    })
</script>


<script>
    window.addEventListener('addWaitingListSuccess', event => {
        Swal.fire(
            'Berhasil !',
            'Waiting List Berhasil Ditambahkan',
            'success',
        );
    })
</script>





    @livewireScripts



</body>

</html>
