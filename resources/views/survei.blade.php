@extends('layouts.vl_home')
@section('staile')
    <style>


    </style>
        <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endsection
@section('title')
    UNM::Tracer Studi
@endsection

@section('content')
    <div class="d-flex flex-column flex-root">
        <!--begin::Header Section-->
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-cover bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="background: linear-gradient(0deg, rgba(37, 53, 197, 0.3), rgb(11, 22, 124)), url(bg/pinisi.jpg), no-repeat; background-repeat: no-repeat; background-position: center; background-size:cover; height:50vh">
                <!--begin::Header-->
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center justify-content-between">
                            <!--begin::Logo-->
                            <div class="d-flex align-items-center flex-equal">
                                <!--begin::Mobile menu toggle-->
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                    id="kt_landing_menu_toggle">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                    <span class="svg-icon svg-icon-2hx">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--end::Mobile menu toggle-->
                                <!--begin::Logo image-->
                                <a href="home">
                                    <img alt="Logo" src="assets/media/logos/unm-light.png"
                                        class="logo-default h-50px h-lg-38px" />
                                    <img alt="Logo" src="assets/media/logos/unm-dark.png"
                                        class="logo-sticky h-50px h-lg-38px" />
                                </a>
                                <!--end::Logo image-->
                            </div>
                            <!--end::Logo-->
                            <!--begin::Menu wrapper-->
                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                    <!--begin::Menu-->
                                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold"
                                        id="kt_landing_menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#petunjuk"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Petunjuk</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#lulusan"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Lulusan</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#tentang"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tentang</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#kontak"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Kontak</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Menu wrapper-->
                            <!--begin::Toolbar-->
                            <div class="flex-equal text-end ms-1">
                                <a href="login" class="btn btn-success">Login</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Landing hero-->
                <div class="d-flex flex-column flex-center w-100  px-9 ">
                    <!--begin::Heading-->
                    <div class="text-center mb-6 mb-lg-10 pb-10 pb-lg-20">
                        <!--begin::Title-->
                        <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-2 ">Tracer Study
                            <br />
                            <span
                                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                <span id="kt_landing_hero_text">Universitas Negeri Makassar</span>
                            </span>
                        </h1>
                        <br />
                        <h1 class="text-white lh-base fw-bolder fs-1x fs-lg-1x mb-15">Survei Kepuasan Pengguna Lulusan
                            Universitas Negeri Makassar</h1>
                        <!--end::Title-->

                    </div>
                    <!--end::Heading-->


                    <!--end::Highlight-->
                </div>
                <!--end::Landing hero-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Curve bottom-->

            <!--end::Curve bottom-->
        </div>
        <!--end::Header Section-->
        <div class="0">
            <!--begin::Curve top-->

            <!--end::Curve top-->
            <!--begin::Wrapper-->
            <form id="formSurvei">
            <div class="pb-15 pt-18 landing-dark-bg">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Heading-->
                    <div class="row gy-5 g-xl-12">
                        <!--begin::Col-->
                        <div class="col-xl-12">
                            <!--begin::Tables Widget 9-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fw-bolder ">

                                                    <th style="width:30%" for="pengisi" class="required">Nama Pengisi </th>
                                                    <th style="width:5%">: </th>

                                                    <th style="width: 65%"> <input type="text"
                                                            class="form-control form-sm" id="pengisi" name="pengisi">
                                                    </th>

                                                </tr>
                                                <tr class="fw-bolder ">

                                                    <th style="width:30%" class="required">Nama Perusahaan/Lembaga/Institusi
                                                    </th>
                                                    <th style="width:5%">: </th>

                                                    <th style="width: 65%"> <input type="text"
                                                            class="form-control form-sm" id="perusahaan" name="perusahaan">
                                                    </th>

                                                </tr>
                                                <tr class="fw-bolder ">

                                                    <th style="width:30%" class="required">Posisi Jabatan
                                                    </th>
                                                    <th style="width:5%">: </th>

                                                    <th style="width: 65%"> <input type="text"
                                                            class="form-control form-sm" id="jabatan" name="jabatan">
                                                    </th>

                                                </tr>
                                                <tr class="fw-bolder ">

                                                    <th style="width:30%" class="required">No HP
                                                    </th>
                                                    <th style="width:5%">: </th>

                                                    <th style="width: 65%"> <input type="text"
                                                            class="form-control form-sm" id="phone" name="phone">
                                                    </th>

                                                </tr>
                                                <tr class="fw-bolder ">

                                                    <th style="width:30%" class="required">Email
                                                    </th>
                                                    <th style="width:5%">: </th>

                                                    <th style="width: 65%"> <input type="email"
                                                            class="form-control form-sm" id="email" name="email">
                                                    </th>

                                                </tr>
                                                <tr class="fw-bolder ">

                                                    <th style="width:30%" class="required">Nama lulusan UNM yang akan dinilai

                                                    </th>
                                                    <th style="width:5%">: </th>

                                                    <th style="width: 65%"> <input type="text"
                                                            class="form-control form-sm" id="lulusan" name="lulusan">
                                                    </th>

                                                </tr>
                                                <tr class="fw-bolder ">

                                                    <th style="width:30%" class="required">Tahun lulus alumni UNM yang akan dinilai

                                                    </th>
                                                    <th style="width:5%">: </th>

                                                    <th style="width: 65%"> <input type="text"
                                                            class="form-control form-sm" id="tahunLulus" name="tahunLulus">
                                                    </th>

                                                </tr>
                                                <tr class="fw-bolder ">

                                                    <th style="width:30%" class="required">Program studi lulusan dari UNM yang akan dinilai


                                                    </th>
                                                    <th style="width:5%">: </th>

                                                    <th style="width: 65%"> 
                                                        <select name="programStudi" class="single-select form-control " id="programStudi">
                                                            <option selected disabled>Pilih Program Studi</option>
                                                            @foreach ($data as $item)
                                                                <option value="{{$item->nama_prodi}}">{{$item->nama_prodi}}</option>
                                                            @endforeach
                                                        </select>
                                                     
                                                    </th>

                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>

                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->

                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 9-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row gy-5 g-xl-12">
                        <!--begin::Col-->
                        <div class="col-xl-12">
                            <!--begin::Tables Widget 9-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fw-bolder ">
                                                    <th class="w-25px">
                                                        No
                                                    </th>
                                                    <th class="min-w-700px">Pertanyaan</th>
                                                    <th class="min-w-20px text-center">Sangat Baik</th>
                                                    <th class="min-w-20px text-center">Baik</th>

                                                    <th class="min-w-20px text-center">Cukup</th>
                                                    <th class="min-w-20px text-center ">Kurang</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div>

                                                        </div>
                                                    </td>
                                                    <td colspan="5">
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6">
                                                                    Bagaimana penguasaan kompetensi di bawah oleh alumni UNM
                                                                    yang bekerja di tempat Bapak/Ibu ?


                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            1
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Sikap/Etika

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio1" id="radio1" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio1"  id="radio1" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio1" id="radio1" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio1" id="radio1" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            2
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Keahlian pada bidang ilmu

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio2" id="radio2" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio2" id="radio2" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio2" id="radio2" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio2" id="radio2" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            3
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Kemampuan berbahasa asing

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio3" id="radio3" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio3" id="radio3" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio3" id="radio3" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio3" id="radio3" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            4
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Penggunaan teknologi informasi
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio4" id="radio4" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio4" id="radio4" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio4" id="radio4" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio4" id="radio4" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            5
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Kemampuan berkomunikasi

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio5" id="radio5" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio5" id="radio5" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio5" id="radio5" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio5" id="radio5" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            6
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required" >
                                                                    Kemampuan Kerjasama

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio6" id="radio6" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio6" id="radio6" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio6" id="radio6" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio6" id="radio6" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            7
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Kemampuan Pengembangan Diri

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio7" id="radio7" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio7" id="radio7" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio7" id="radio7" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio7" id="radio7" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            8
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Kepemimpinan

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio8" id="radio8" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio8" id="radio8" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio8" id="radio8" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio8" id="radio8" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            9
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Etos Kerja

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio9" id="radio9" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio9" id="radio9" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio9" id="radio9" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio9" id="radio9" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>

                                                        </div>
                                                    </td>
                                                    <td colspan="5">
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6">
                                                                    Bagaimana skor ideal pada kompetensi di bawah untuk
                                                                    bekerja di tempat Bapak/Ibu ?

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            1
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Sikap/Etika

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio11" id="radio11" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio11" id="radio11" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio11" id="radio11" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio11" id="radio11" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            2
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Keahlian pada bidang ilmu

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio12" id="radio12" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio12" id="radio12" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio12" id="radio12" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio12" id="radio12" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            3
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Kemampuan berbahasa asing

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio13" id="radio13" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio13" id="radio13" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio13" id="radio13" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio13" id="radio13" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            4
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Penggunaan teknologi informasi
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio14" id="radio14" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio14" id="radio14" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio14" id="radio14" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio14" id="radio14" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            5
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Kemampuan berkomunikasi

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio15" id="radio15" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio15" id="radio15" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio15" id="radio15" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio15" id="radio15" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            6
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Kemampuan Kerjasama

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio16" id="radio16" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio16" id="radio16" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio16" id="radio16" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio16" id="radio16" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            7
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Kemampuan Pengembangan Diri

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio17" id="radio17" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio17" id="radio17" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio17" id="radio17" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio17" id="radio17">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            8
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Kepemimpinan

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio18" id="radio18" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio18" id="radio18" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio18" id="radio18" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio18" id="radio18" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            9
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6 required">
                                                                    Etos Kerja

                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio19" id="radio19" value="4">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio19" id="radio19" value="3">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio19" id="radio19" value="2">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input " type="radio" name="radio19" id="radio19" value="1">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            -
                                                        </div>
                                                    </td>
                                                    <td colspan="5">
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6">
                                                                    Apa harapan Anda terhadap lulusan Universitas Negeri
                                                                    Makassar?
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>

                                                        </div>
                                                    </td>
                                                    <td colspan="5">
                                                        <textarea name="harapan" class="form-control" id="harapan" cols="30" rows="5"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            -
                                                        </div>
                                                    </td>
                                                    <td colspan="5">
                                                        <div class="d-flex align-items-center">

                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6">
                                                                    Saran dan masukan untuk Universitas Negeri Makassar?

                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>

                                                        </div>
                                                    </td>
                                                    <td colspan="5">
                                                        <textarea  class="form-control" id="saran" name="saran" cols="30" rows="5"></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-success kirim-survei" type="button">Kirim</button>
                                        </div>
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 9-->
                        </div>
                        <!--end::Col-->
                    </div>
                </div>
                <!--end::Container-->
            </div>
            </form>
            <!--end::Wrapper-->
        </div>


        <!--begin::Footer Section-->
        <div class="mb-0">
            <!--begin::Curve top-->

            <!--end::Curve top-->
            <!--begin::Wrapper-->
            <div class="landing-dark-bg pt-20">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Row-->
                    <div class="row py-10 py-lg-20">
                        <!--begin::Col-->
                        <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                            <!--begin::Block-->
                            <div class="rounded landing-dark-border p-9 mb-10">
                                <!--begin::Title-->
                                <h2 class="text-white">Butuh Bantuan Karir ?</h2>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <span class="fw-normal fs-4 text-gray-700">Email us to
                                    <a href="https://keenthemes.com/support"
                                        class="text-white opacity-50 text-hover-primary">cdc@unm.ac.id</a></span>
                                <!--end::Text-->
                            </div>
                            <!--end::Block-->
                            <!--begin::Block-->

                            <!--end::Block-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-6 ps-lg-16">
                            <!--begin::Navs-->
                            <div class="d-flex justify-content-center">
                                <!--begin::Links-->
                                <div class="d-flex fw-bold flex-column me-20">
                                    <!--begin::Subtitle-->
                                    <h4 class="fw-bolder text-gray-400 mb-6">Situs Terkait</h4>
                                    <!--end::Subtitle-->
                                    <!--begin::Link-->
                                    <a href="https://unm.ac.id"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Universitas Negeri
                                        Makassar</a>
                                    <!--end::Link-->
                                    <!--begin::Link-->
                                    <a href="http://cdc.unm.ac.id"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Career Development
                                        Center</a>
                                    <!--end::Link-->
                                    <!--begin::Link-->
                                    <a href="https://unm-cdc.prosple.com"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Lowongan Pekerjaan</a>
                                    <!--end::Link-->

                                </div>
                                <!--end::Links-->
                                <!--begin::Links-->
                                <div class="d-flex fw-bold flex-column ms-lg-20">
                                    <!--begin::Subtitle-->
                                    <h4 class="fw-bolder text-gray-400 mb-6">Stay Connected</h4>
                                    <!--end::Subtitle-->
                                    <!--begin::Link-->
                                    <a href="https://www.facebook.com/keenthemes" class="mb-6">
                                        <img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2"
                                            alt="" />
                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                                    </a>
                                    <!--end::Link-->

                                    <!--begin::Link-->
                                    <a href="https://twitter.com/keenthemes" class="mb-6">
                                        <img src="assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2"
                                            alt="" />
                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
                                    </a>
                                    <!--end::Link-->

                                    <!--begin::Link-->
                                    <a href="https://www.instagram.com/keenthemes" class="mb-6">
                                        <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2"
                                            alt="" />
                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                                    </a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Links-->
                            </div>
                            <!--end::Navs-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
                <!--begin::Separator-->
                <div class="landing-dark-separator"></div>
                <!--end::Separator-->
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                        <!--begin::Copyright-->
                        <div class="d-flex align-items-center order-2 order-md-1">
                            <!--begin::Logo-->
                            <a href="../../demo1/dist/landing.html">
                                <img alt="Logo" src="assets/media/logos/unm-light.png" class="h-15px h-md-20px" />
                            </a>
                            <!--end::Logo image-->
                            <!--begin::Logo image-->
                            <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="https://keenthemes.com">© 2022
                                Career Development Center UNM.</span>
                            <!--end::Logo image-->
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->

                        <!--end::Menu-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Footer Section-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
            <span class="svg-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                        transform="rotate(90 13 6)" fill="black" />
                    <path
                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                        fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Scrolltop-->
    </div>
@endsection

@push('prepend-script')
    <!-- Vendor js -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="assets/js/vendor.min.js"></script>
@endpush
@push('addon-script')
<script>
      $('.single-select').select2({
            theme: 'bootstrap4',
            placeholder: $(this).data('placeholder'),
        });
  $('.kirim-survei').click(function() {
    var formData = new FormData($('#formSurvei')[0]);
        formData.append("_token", "{{ csrf_token() }}");
    // if( product_id !=""){
      
    var form = $('#formSurvei');
        form.find('.invalid-feedback').remove();
        form.find('.form-control').removeClass('is-invalid');
    $.ajax({
      url: "{{ url('/survei') }}",
      type: "POST",
      data: formData,
      // data: {idOrder, quantity,'_token': "{{ csrf_token() }}"},
      contentType: false,
      cache:false,
      processData: false,
      dataType:"json",
      success: function(data){
        $( "#lbl-error" ).remove();
        if(data.status==true){
          toastr.success(data.message, 'Berhasil', {
                            timeOut: 5000
                        });
        }
      },
      error: function(xhr) {
            let response = xhr.responseJSON
            if ($.isEmptyObject(response) == false) {
                toastr.error("Masih ada inputan yang belum diinput! Mohon melengkapi inputan tersebut!", 'Gagal', {
                    timeOut: 5000
                });
                $.each(response.errors, (key, value) => {
                    
                    $('#' + key)
                        .closest('.form-control')
                        .addClass('is-invalid')
                        .after('<div  class="invalid-feedback" >  ' + value + '</div>')
                })
            }
        }
    });
    // }
    // else{
    // 	alert('Please fill all the field !');
    // }
  });

</script>
@endpush
