@section('title')
Dashboard

@endsection


<div >
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3>Hai <b> {{ Auth::user()->name }} </b>Selamat Datang di Dashboard</h3>
                </div>
            </div>
        </div>
    </div>




    <div class="page-heading">

      </div>
      <div class="page-content">
        <section class="row">
          <div class="col-12 col-lg-9">
            <div class="row">
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-4 py-4-5">
                    <div class="row">
                      <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                      >
                        <div class="stats-icon purple mb-2">
                          <i class="iconly-boldShow"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">
                        Unit Kontrakan
                        </h6>
                        <h6 class="font-extrabold mb-0">{{ $countKontrakan }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-4 py-4-5">
                    <div class="row">
                      <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                      >
                        <div class="stats-icon blue mb-2">
                          <i class="iconly-boldProfile"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Penghuni</h6>
                        <h6 class="font-extrabold mb-0">{{ $countPenghuni }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-4 py-4-5">
                    <div class="row">
                      <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                      >
                        <div class="stats-icon green mb-2">
                          <i class="iconly-boldAdd-User"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Penyewa Yang Harus Dilakukan Konfirmasi Identitas</h6>
                        <h6 class="font-extrabold mb-0">{{ $transaksi }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-4 py-4-5">
                    <div class="row">
                      <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                      >
                        <div class="stats-icon blue mb-2">
                          <i class="iconly-boldProfile"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Admin</h6>
                        <h6 class="font-extrabold mb-0">{{ $countAdmin }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-4 py-4-5">
                    <div class="row">
                      <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                      >
                        <div class="stats-icon blue mb-2">
                          <i class="iconly-boldProfile"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">User</h6>
                        <h6 class="font-extrabold mb-0">{{ $countUser }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-12 col-md-12">
                <div class="card">

                    <div class="card-body">
                       <p>"{{ $jsonresponse['content'] }}"</p>
                      <p>---{{ $jsonresponse['author'] }}---</p>

                    </div>
                </div>


                </div>

                </div>

            </div>

        </section>
      </div>
</div>
