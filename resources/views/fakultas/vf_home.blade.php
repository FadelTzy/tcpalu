@extends('layouts.vl_fakultas')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                <div class="col">
                    <div class="card radius-10 ">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 id="time" class="mb-0 text-primary"></h5>
                                <div class="ms-auto">
                                    <i class='bx bx-time fs-3 text-primary'></i>
                                </div>
                            </div>
                            {{-- <div class="progress my-2" style="height:4px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> --}}
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Waktu Sekarang</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-success"></h5>
                                <div class="ms-auto">
                                    <i class='bx bx-calendar-event fs-3 text-success'></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Tanggal Sekarang</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-danger">6200</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-group fs-3 text-danger'></i>
                                </div>
                            </div>
                            <div class="progress my-2" style="height:4px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 55%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Alumni</p>
                                <!-- <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> -->
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Selamat Datang</h6>
                                </div>
                                <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                            </div>
                            <div>
                                <h6>Fakultas</h6>
                                <p>Dengan adanya aplikasi ini kami berharap agar alumni yang ada dapat kami tracking
                                    keberadaannya, sehingga ada timbal balik hubungan antara pihak universitas dan
                                    alumni
                                    yang ada. Keberadaan Alumni merupakan asset yang harus dipertahankan, mengingat
                                    almamater dengan alumni tidak bisa dipisahkan dalam hal berkomunikasi. Ada
                                    kebanggaan
                                    tersendiri jika kami bisa terus berkomunikasi dengan alumni yang ada. Terima kasih
                                    atas
                                    segala bentuk kerjasama yang telah dilakukan, besar harapan kami untuk segala
                                    testimoni,
                                    kritik dan saran anda kepada kami.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--End Row-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection
@push('prepend-script')
    <!-- Vendor js -->
    <script src="vertical/assets/js/jquery.min.js"></script>
@endpush
@push('addon-script')
    id-ID
    <script type="text/javascript">
        function showTime() {
            var date = new Date(),
                utc = new Date(Date.UTC(
                    date.getFullYear(),
                    date.getMonth(),
                    date.getDate(),
                    date.getHours(),
                    date.getMinutes(),
                    date.getSeconds()
                ));


            document.getElementById('time').innerHTML = date.toLocaleTimeString();
        }

        setInterval(showTime, 1000);
    </script>
@endpush
