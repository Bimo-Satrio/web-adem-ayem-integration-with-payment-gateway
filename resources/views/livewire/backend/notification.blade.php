<div>


        <nav class="navbar navbar-expand navbar-light navbar-top">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">

                  <li class="nav-item dropdown me-3">

                    <a
                      class="nav-link active dropdown-toggle text-gray-600 {{ (request()->is('backend/dasboard')) ? 'active' : '' }}"
                      href="#"
                      data-bs-toggle="dropdown"
                      data-bs-display="static"
                      aria-expanded="false"
                    >

                    <span class="position-absolute top-0 start-100 late-middle badge rounded-pill bg-danger">
                      {{ $PengajuanSewa }}
                        <span class="visually-hidden">Terdapat Notifikasi</span>
                      </span>
                      <i class="bi bi-bell bi-sub fs-4"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end notification-dropdown"
                      aria-labelledby="dropdownMenuButton"
                    >
                      <li class="dropdown-header">
                        <h6>Notifikasi</h6>
                      </li>
                      @forelse ($getPengajuanSewa as $pengajuan )
                      <li class="dropdown-item notification-item">

                        <a class="d-flex align-items-center" href="#">

                          <div class="notification-icon bg-primary">
                            <i class="bi bi-hourglass-split"></i>
                          </div>
                          <div class="notification-text ms-4">
                            <p class="notification-title font-bold">
                            @if ($pengajuan->status_PengajuanSewa == 0)

                          <span class="badge bg-info">Menunggu Diproses Admin </span>
                            @endif
                            </p>
                            <p class="notification-subtitle font-thin text-sm">
                                ID Pengajuan Sewa : {{ $pengajuan->id_pengajuan_sewa }}
                                <br>
                                Pada : {{date('d F Y H:i:s',strtotime($pengajuan ->created_at)) }}
                            </p>
                          </div>

                        </a>

                      </li>

                      @empty

                      @endforelse
                      <li>
                        <p class="text-center py-2 mb-0">
                            @if (Auth::user()->is_admin == 1)
                            <a href="{{ route('laporan-pemilik-pengajuan') }}">Lihat Semua</a>

                            @elseif(Auth::user()->is_admin == 2)
                            <a href="{{ route('identity-validate') }}">Lihat Semua</a>

                            @endif
                        </p>
                      </li>
                    </ul>
                  </li>
                </ul>
                <div class="dropdown">
                  <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                      <div class="user-name text-end me-3">
                        <h6 class="mb-0 text-gray-600">{{ Auth::user()->username }}</h6>


                      </div>
                      <div class="user-img d-flex align-items-center">
                        <div class="avatar avatar-md">
                            @if (Auth::user()->avatar == NULL)
                            <img src="https://ui-avatars.com/api/?name={{Auth::user()->username}}&rounded=true"/>



                            @else
                             <img src="{{ asset(Auth::user()->avatar) }}" >


                            @endif
                        </div>
                      </div>
                    </div>
                  </a>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="dropdownMenuButton"
                    style="min-width: 11rem"
                  >
                    <li>
                      <h6 class="dropdown-header">Halo, {{ Auth::user()->username }}</h6>
                    </li>
                    <li>
                        @if (Auth::user()->is_admin == 1)
                        <a class="dropdown-item" href="{{ route('profile-pemilik') }}"
                        ><i class="icon-mid bi bi-person me-2"></i>Profile Saya</a
                      >
                        @elseif (Auth::user()->is_admin == 2)

                        <a class="dropdown-item" href="{{ route('profile') }}"
                        ><i class="icon-mid bi bi-person me-2"></i>Profile Saya</a
                      >

                        @endif

                    </li>


                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li>
                      <a class="dropdown-item" href="#" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Logout') }}
                        <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                       </a
                      >

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </li>
                  </ul>
                </div>
              </div>

          </div>
        </nav>


</div>
