@extends('layouts.vl_home')
@section('title')
    UNM::Tracer Studi 
@endsection

@section('content')
<div class="d-flex flex-column flex-root">
  <!--begin::Header Section-->
  <div class="mb-0" id="home">
    <!--begin::Wrapper-->
    <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
      <!--begin::Header-->
      <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <!--begin::Container-->
        <div class="container">
          <!--begin::Wrapper-->
          <div class="d-flex align-items-center justify-content-between">
            <!--begin::Logo-->
            <div class="d-flex align-items-center flex-equal">
              <!--begin::Mobile menu toggle-->
              <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-2hx">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                    <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                  </svg>
                </span>
                <!--end::Svg Icon-->
              </button>
              <!--end::Mobile menu toggle-->
              <!--begin::Logo image-->
              <a href="home">
                <img alt="Logo" src="assets/media/logos/unm-light.png" class="logo-default h-50px h-lg-38px" />
                <img alt="Logo" src="assets/media/logos/unm-dark.png" class="logo-sticky h-50px h-lg-38px" />
              </a>
              <!--end::Logo image-->
            </div>
            <!--end::Logo-->
            <!--begin::Menu wrapper-->
            <div class="d-lg-block" id="kt_header_nav_wrapper">
              <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                <!--begin::Menu-->
                <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
                  <!--begin::Menu item-->
                  <div class="menu-item">
                    <!--begin::Menu link-->
                    <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="home#kt_body" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
                    <!--end::Menu link-->
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item">
                    <!--begin::Menu link-->
                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="home#petunjuk" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Petunjuk</a>
                    <!--end::Menu link-->
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item">
                    <!--begin::Menu link-->
                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="home#lulusan" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Lulusan</a>
                    <!--end::Menu link-->
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item">
                    <!--begin::Menu link-->
                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="home#tentang" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tentang</a>
                    <!--end::Menu link-->
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item">
                    <!--begin::Menu link-->
                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="home#kontak" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Kontak</a>
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
              <a href="login" class="btn btn-success">Sign In</a>
            </div>
            <!--end::Toolbar-->
          </div>
          <!--end::Wrapper-->
        </div>
        <!--end::Container-->
      </div>
      <!--end::Header-->
      <!--begin::Landing hero-->
      <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
        <!--begin::Heading-->
        <div class="text-center mb-5 mb-lg-10 pb-10 pb-lg-20">
          <!--begin::Title-->
          <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-2">Tracer Study
          <br />
          <span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
            <span id="kt_landing_hero_text">Universitas Negeri Makassar</span>
          </span> </h1>
          <br /><h2 class="text-white lh-base fw-bolder fs-1x fs-lg-1x mb-15">Merupakan Aplikasi Untuk Melakukan Tracing Terhadap Aktifitas Alumni/Lulusan Dari Universitas Negeri Makassar</h2>
          <!--end::Title-->
          <!--begin::Action-->
          {{-- <a href="login" class="btn btn-primary">Mulai Mengisi</a> --}}
          <a href="#survei" class="btn btn-secondary wave wave-animate-slow wave-danger">Survei Pengguna Lulusan 
            <span class="svg-icon svg-icon-primary svg-icon-2x m-0 "><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Navigation/Angle-down.svg-->
              <svg class="pulse pulse-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24"/>
                  <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999) "/>
              </g>
              </svg>
            </span>
          </a>
          <!--end::Action-->
        </div>
        <!--end::Heading-->
        
        <!--begin::Highlight-->
        {{-- <div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow text-center" style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);z-index: 1;max-width: 1100px;position: relative; margin-bottom: -15rem;"> --}}
        <div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow text-center" style="background: linear-gradient(90deg, #e3eee6 0%, #a7fcec 100%);z-index: 1;max-width: 1100px;position: relative; margin-bottom: -15rem;">
          <!--begin::Content-->
          Kuesioner
            
          </div>
        </div>
        <!--end::Highlight-->
      </div>
      <!--end::Landing hero-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Curve bottom-->
    <div class="landing-curve landing-dark-color mb-5" style="">
      <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
      </svg>
    </div>
    <!--end::Curve bottom-->
  </div>
  <!--end::Header Section-->
  <!--begin::Team Section-->
  <div class="" style="margin-top: 4%;">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Heading-->
      <div class="text-center mb-12">
        <!--begin::Title-->
        <h3 class="fs-2hx text-dark mb-5" id="survei" data-kt-scroll-offset="{default: 100, lg: 150}">Petunjuk Pengisian
         </h3>
        <!--end::Title-->
        <!--begin::Sub-title-->
        <div class="fs-5 text-muted fw-bold"> Berikut Merupakan Tahapan Pengisian Tracer Study UNM
        </div>
        <!--end::Sub-title=-->
      </div>
      <!--end::Heading-->
      
      <div class="row w-100 gy-10 mb-md-20">
        <!--begin::Col-->
        <div class="col-md-3 px-5">
          <!--begin::Story-->
          <div class="text-center mb-10 mb-md-0">
            <!--begin::Illustration-->
            <img src="assets/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9" alt="" />
            <!--end::Illustration-->
            <!--begin::Heading-->
            <div class="d-flex flex-center mb-5">
              <!--begin::Badge-->
              <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">1</span>
              <!--end::Badge-->
              <!--begin::Title-->
              <div class="fs-5 fs-lg-3 fw-bolder text-dark">Akses Website Tracer Study
                </div>
              <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Description-->
            <div class="fw-bold fs-6 fs-lg-4 text-muted">Akses Halaman Website <a href="https://tracerstudy.unm.ac.id"> https://tracerstudy.unm.ac.id</a></div>
            <!--end::Description-->
          </div>
          <!--end::Story-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-3 px-5">
          <!--begin::Story-->
          <div class="text-center mb-10 mb-md-0">
            <!--begin::Illustration-->
            <img src="assets/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9" alt="" />
            <!--end::Illustration-->
            <!--begin::Heading-->
            <div class="d-flex flex-center mb-5">
              <!--begin::Badge-->
              <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">2</span>
              <!--end::Badge-->
              <!--begin::Title-->
              <div class="fs-5 fs-lg-3 fw-bolder text-dark">Login
                </div>
              <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Description-->
            <div class="fw-bold fs-6 fs-lg-4 text-muted">Login Menggunakan Username dan Password Nim Pada Saat Berkuliah di UNM</div>
            <!--end::Description-->
          </div>
          <!--end::Story-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-3 px-5">
          <!--begin::Story-->
          <div class="text-center mb-10 mb-md-0">
            <!--begin::Illustration-->
            <img src="assets/media/illustrations/sketchy-1/17.png" class="mh-125px mb-9" alt="" />
            <!--end::Illustration-->
            <!--begin::Heading-->
            <div class="d-flex flex-center mb-5">
              <!--begin::Badge-->
              <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">3</span>
              <!--end::Badge-->
              <!--begin::Title-->
              <div class="fs-5 fs-lg-3 fw-bolder text-dark">Ubah Profile</div>
              <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Description-->
            <div class="fw-bold fs-6 fs-lg-4 text-muted">Melakukan Update Terhadap Data Profile Sesuai dengan Status Alumni Pada Saat Ini</div>
            <!--end::Description-->
          </div>
          <!--end::Story-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-3 px-5">
          <!--begin::Story-->
          <div class="text-center mb-10 mb-md-0">
            <!--begin::Illustration-->
            <img src="assets/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9" alt="" />
            <!--end::Illustration-->
            <!--begin::Heading-->
            <div class="d-flex flex-center mb-5">
              <!--begin::Badge-->
              <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">4</span>
              <!--end::Badge-->
              <!--begin::Title-->
              <div class="fs-5 fs-lg-3 fw-bolder text-dark">Melakukan Pengisian</div>
              <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Description-->
            <div class="fw-bold fs-6 fs-lg-4 text-muted">Melakukan Pengisian Kuesioner Sesuai Dengan Status dan Kondisi Alumni Pada Saat Ini</div>
            <!--end::Description-->
          </div>
          <!--end::Story-->
        </div>
        <!--end::Col-->
      </div>
    </div>
    <!--end::Container-->
  </div>
  <!--end::Team Section-->
  
  <!--begin::Statistics Section-->
  <div class="0">
    <!--begin::Curve top-->
    <div class="landing-curve landing-dark-color">
      <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
      </svg>
    </div>
    <!--end::Curve top-->
    <!--begin::Wrapper-->
    <div class="pb-15 pt-18 landing-dark-bg">
      <!--begin::Container-->
      <div class="container">
        <!--begin::Heading-->
        <div class="text-center mt-15 mb-18" id="lulusan" data-kt-scroll-offset="{default: 100, lg: 150}">
          <!--begin::Title-->
          <h3 class="fs-2hx text-white fw-bolder mb-5">Jumlah Lulusan Tahunan</h3>
          <!--end::Title-->
          <!--begin::Description-->
          <div class="fs-5 text-gray-700 fw-bold">Save thousands to millions of bucks by using single tool
          <br />for different amazing and great useful admin</div>
          <!--end::Description-->
        </div>
        <!--end::Heading-->
        <!--begin::Statistics-->
        <div class="d-flex flex-center">
          <!--begin::Items-->
          <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
            <!--begin::Item-->
            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
              <!--begin::Symbol-->
              <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
              <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                  <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                </svg>
              </span>
              <!--end::Svg Icon-->
              <div class="mb-0">
                <!--begin::Value-->
                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                  <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="3876" data-kt-countup-suffix="">0</div>
                </div>
                <!--end::Value-->
                <!--begin::Label-->
                <span class="text-gray-600 fw-bold fs-5 lh-0">Lulusan Tahun 2019</span>
                <!--end::Label-->
              </div>
              <!--end::Info-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
              <!--begin::Symbol-->
              <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
              <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z" fill="black" />
                  <path opacity="0.3" d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z" fill="black" />
                  <path opacity="0.3" d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z" fill="black" />
                </svg>
              </span>
              <!--end::Svg Icon-->
              <!--end::Symbol-->
              <!--begin::Info-->
              <div class="mb-0">
                <!--begin::Value-->
                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                  <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="2302" data-kt-countup-suffix="">0</div>
                </div>
                <!--end::Value-->
                <!--begin::Label-->
                <span class="text-gray-600 fw-bold fs-5 lh-0">Lulusan Tahun 2020</span>
                <!--end::Label-->
              </div>
              <!--end::Info-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
              <!--begin::Symbol-->
              <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
              <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black" />
                  <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black" />
                  <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black" />
                </svg>
              </span>
              <!--end::Svg Icon-->
              <!--end::Symbol-->
              <!--begin::Info-->
              <div class="mb-0">
                <!--begin::Value-->
                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                  <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="5592" data-kt-countup-suffix="">0</div>
                </div>
                <!--end::Value-->
                <!--begin::Label-->
                <span class="text-gray-600 fw-bold fs-5 lh-0">Lulusan Tahun 2021</span>
                <!--end::Label-->
              </div>
              <!--end::Info-->
            </div>
            <!--end::Item-->
          </div>
          <!--end::Items-->
        </div>
        <!--end::Statistics-->
        <!--begin::Testimonial-->
        <div class="fs-2 fw-bold text-muted text-center mb-3">
        <span class="fs-1 lh-1 text-gray-700">“</span>When you care about your topic, you’ll write about it in a
        <br />
        <span class="text-gray-700 me-1">more powerful</span>, emotionally expressive way
        <span class="fs-1 lh-1 text-gray-700">“</span></div>
        <!--end::Testimonial-->
        <!--begin::Author-->
        <div class="fs-2 fw-bold text-muted text-center">
          <a href="../../demo1/dist/account/security.html" class="link-primary fs-4 fw-bolder">Marcus Levy,</a>
          <span class="fs-4 fw-bolder text-gray-600">KeenThemes CEO</span>
        </div>
        <!--end::Author-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::Wrapper-->
  </div>
  <!--end::Statistics Section-->
  
  <!--begin::Pricing Section-->
  <div class="mt-sm-n10">
    
    <!--begin::Wrapper-->
    <div class="landing-dark-bg" style="border-top: 1px dashed #2c3f5b;">
      <!--begin::Container-->
      <div class="container">
        <!--begin::Plans-->
        <div class="d-flex flex-column container pt-lg-15">
          <!--begin::Heading-->
          <div class="mb-5 text-center">
            <h1 class="fs-2hx fw-bolder text-white mb-5" id="tentang" data-kt-scroll-offset="{default: 100, lg: 150}">Aplikasi Tracer Studi UNM</h1>
            {{-- <div class="text-gray-600 fw-bold fs-5">Save thousands to millions of bucks by using single tool for different --}}
            {{-- <br />amazing and outstanding cool and great useful admin</div> --}}
          </div>
          <!--end::Heading-->
          <!--begin::Pricing-->
          <div class="text-center" id="kt_pricing">
            <!--begin::Nav group-->
            {{-- <div class="nav-group landing-dark-bg d-inline-flex mb-15" data-kt-buttons="true" style="border: 1px dashed #2B4666;">
              <a href="#" class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3 me-2 active" data-kt-plan="month">Monthly</a>
              <a href="#" class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3" data-kt-plan="annual">Annual</a>
            </div> --}}
            <!--end::Nav group-->
            <!--begin::Row-->
            <div class="row g-10">
              <!--begin::Col-->
              {{-- <div class="col-xl-4">
                <div class="d-flex h-100 align-items-center">
                  <!--begin::Option-->
                  <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                    <!--begin::Heading-->
                    <div class="mb-7 text-center">
                      <!--begin::Title-->
                      <h1 class="text-dark mb-5 fw-boldest">Startup</h1>
                      <!--end::Title-->
                      <!--begin::Description-->
                      <div class="text-gray-400 fw-bold mb-5">Best Settings for Startups</div>
                      <!--end::Description-->
                      <!--begin::Price-->
                      <div class="text-center">
                        <span class="mb-2 text-primary">$</span>
                        <span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="99" data-kt-plan-price-annual="999">99</span>
                        <span class="fs-7 fw-bold opacity-50" data-kt-plan-price-month="Mon" data-kt-plan-price-annual="Ann">/ Mon</span>
                      </div>
                      <!--end::Price-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Features-->
                    <div class="w-100 mb-10">
                      <!--begin::Item-->
                      <div class="d-flex flex-stack mb-5">
                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 10 Active Users</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                        <span class="svg-icon svg-icon-1 svg-icon-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </div>
                      <!--end::Item-->
                      <!--begin::Item-->
                      <div class="d-flex flex-stack mb-5">
                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 30 Project Integrations</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                        <span class="svg-icon svg-icon-1 svg-icon-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </div>
                      <!--end::Item-->
                      <!--begin::Item-->
                      <div class="d-flex flex-stack mb-5">
                        <span class="fw-bold fs-6 text-gray-800">Keen Analytics Platform</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                        <span class="svg-icon svg-icon-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black" />
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </div>
                      <!--end::Item-->
                      <!--begin::Item-->
                      <div class="d-flex flex-stack mb-5">
                        <span class="fw-bold fs-6 text-gray-800">Targets Timelines &amp; Files</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                        <span class="svg-icon svg-icon-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black" />
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </div>
                      <!--end::Item-->
                      <!--begin::Item-->
                      <div class="d-flex flex-stack">
                        <span class="fw-bold fs-6 text-gray-800">Unlimited Projects</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                        <span class="svg-icon svg-icon-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black" />
                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </div>
                      <!--end::Item-->
                    </div>
                    <!--end::Features-->
                    <!--begin::Select-->
                    <a href="#" class="btn btn-primary">Select</a>
                    <!--end::Select-->
                  </div>
                  <!--end::Option-->
                </div>
              </div> --}}
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-xl-12">
                <div class="d-flex h-100 align-items-center">
                  <!--begin::Option-->
                  <div class="w-100 d-flex flex-column flex-center rounded-3 bg-primary py-20 px-10">
                    <!--begin::Heading-->
                    <div class="mb-7 text-center">
                      <!--begin::Title-->
                      <h1 class="text-white mb-5 fw-boldest">Para Alumni yang terhormat,</h1>
                      <!--end::Title-->
                      <!--begin::Description-->
                      <div class="text-white fw-bold mb-5" style="text-align: justify;
                      font-size: 18px;">

                        Tracer Study (Studi Penelusuran Alumni) Universitas Negeri Makassar merupakan survei yang dilakukan untuk mengukur proses pendidikan tinggi UNM dalam membekali para alumni untuk memasuki masa transisi dari dunia kampus ke dunia kerja. Selain itu, Tracer Study UNM juga bertujuan untuk mendapatkan masukan bagi perbaikan sistem pendidikan dan pembelajaran UNM.
                        <br>
                        <br>
                        Merupakan suatu hal yang membanggakan jika Anda bersedia meluangkan waktu sejenak untuk membantu Kami dalam pelaksanaan suatu survei yang ditujukan kepada seluruh alumni Universitas Negeri Makasar.
                        <br>
                        <br>
                        Partisipasi para alumni dalam mengisi kuesioner Tracer Study sangat berharga dalam memberikan kontribusi pengembangan dan peningkatan mutu pendidikan dan pembelajaran di Universitas Negeri Makassar di masa yang akan datang. Kami yakin Anda akan bersedia untuk saling berbagi dengan almamater Anda guna berlangsungnya proses peningkatan' mutu pendidikan secara berkelanjutan.</div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Select-->
                    {{-- <a href="#" class="btn btn-color-primary btn-active-light-primary btn-light">Select</a> --}}
                    <!--end::Select-->
                  </div>
                  <!--end::Option-->
                </div>
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              {{-- <div class="col-xl-4">
                <div class="d-flex h-100 align-items-center">
                  <!--begin::Option-->
                  <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                    <!--begin::Heading-->
                    <div class="mb-7 text-center">
                      <!--begin::Title-->
                      <h1 class="text-dark mb-5 fw-boldest">Enterprise</h1>
                      <!--end::Title-->
                      <!--begin::Description-->
                      <div class="text-gray-400 fw-bold mb-5">Best Settings for Enterprise</div>
                      <!--end::Description-->
                      <!--begin::Price-->
                      <div class="text-center">
                        <span class="mb-2 text-primary">$</span>
                        <span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="999" data-kt-plan-price-annual="9999">999</span>
                        <span class="fs-7 fw-bold opacity-50" data-kt-plan-price-month="Mon" data-kt-plan-price-annual="Ann">/ Mon</span>
                      </div>
                      <!--end::Price-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Features-->
                    <div class="w-100 mb-10">
                      <!--begin::Item-->
                      <div class="d-flex flex-stack mb-5">
                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 10 Active Users</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                        <span class="svg-icon svg-icon-1 svg-icon-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </div>
                      <!--end::Item-->
                      <!--begin::Item-->
                      <div class="d-flex flex-stack mb-5">
                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 30 Project Integrations</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                        <span class="svg-icon svg-icon-1 svg-icon-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </div>
                      <!--end::Item-->
                      <!--begin::Item-->
                      <div class="d-flex flex-stack mb-5">
                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Keen Analytics Platform</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                        <span class="svg-icon svg-icon-1 svg-icon-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </div>
                      <!--end::Item-->
                      <!--begin::Item-->
                      <div class="d-flex flex-stack mb-5">
                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Targets Timelines &amp; Files</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                        <span class="svg-icon svg-icon-1 svg-icon-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </div>
                      <!--end::Item-->
                      <!--begin::Item-->
                      <div class="d-flex flex-stack">
                        <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Unlimited Projects</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                        <span class="svg-icon svg-icon-1 svg-icon-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </div>
                      <!--end::Item-->
                    </div>
                    <!--end::Features-->
                    <!--begin::Select-->
                    <a href="#" class="btn btn-primary">Select</a>
                    <!--end::Select-->
                  </div>
                  <!--end::Option-->
                </div>
              </div> --}}
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Pricing-->
        </div>
        <!--end::Plans-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Curve bottom-->
    <div class="landing-curve landing-dark-color">
      <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
      </svg>
    </div>
    <!--end::Curve bottom-->
  </div>
  <!--end::Pricing Section-->
  <!--begin::Testimonials Section-->
  <div class="mt-20 mb-n20 position-relative z-index-2">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Heading-->
      <div class="text-center mb-17">
        <!--begin::Title-->
        <h3 class="fs-2hx text-dark mb-5" id="kontak" data-kt-scroll-offset="{default: 125, lg: 150}">Kontak Tracer Study UNM</h3>
        <!--end::Title-->
        <!--begin::Description-->
        <div class="fs-5 text-muted fw-bold">Jika Ada Yang Ingin Ditanyakan Silahkan Hubungi Kami</div>
        <!--end::Description-->
      </div>
      <!--end::Heading-->
      <!--begin::Row-->
      <div class="row g-lg-10 mb-10 mb-lg-20">
        <!--begin::Col-->
        <div class="col-lg-12">
          <!--begin::Testimonial-->
          <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
            <!--begin::Row-->
            <div class="row g-10">
              <!--begin::Col-->
              <div class="card p-5 col-md-6 pe-lg-10" style="box-shadow: 0 0 84px 0 rgb(136 87 125 / 18%);">
                <!--begin::Form-->
                <form action="" class="form mb-15" method="post" id="kt_contact_form">
                  {{-- <h1 class="fw-bolder text-dark mb-9">Send Us Email</h1> --}}
                  <!--begin::Input group-->
                  <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                      <!--begin::Label-->
                      <label class="fs-5 fw-bold mb-2">Nama Lengkap</label>
                      <!--end::Label-->
                      <!--begin::Input-->
                      <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                      <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                      <!--end::Label-->
                      <label class="fs-5 fw-bold mb-2">Email</label>
                      <!--end::Label-->
                      <!--end::Input-->
                      <input type="text" class="form-control form-control-solid" placeholder="" name="email" />
                      <!--end::Input-->
                    </div>
                    <!--end::Col-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="d-flex flex-column mb-5 fv-row">
                    <!--begin::Label-->
                    <label class="fs-5 fw-bold mb-2">No Handphone</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control-solid" placeholder="" name="subject" />
                    <!--end::Input-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="d-flex flex-column mb-10 fv-row">
                    <label class="fs-6 fw-bold mb-2">Message</label>
                    <textarea class="form-control form-control-solid" rows="6" name="message" placeholder=""></textarea>
                  </div>
                  <!--end::Input group-->
                  <!--begin::Submit-->
                  <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                    <!--begin::Indicator-->
                    <span class="indicator-label">Send Message</span>
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator-->
                  </button>
                  <!--end::Submit-->
                </form>
                <!--end::Form-->
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-md-6 ps-lg-10">
                <!--begin::Map-->
                <div id="kt_contact_map" class="w-100 rounded mb-2 mb-lg-0 mt-2" style="height: 486px">
                  <div class="rounded landing-dark-border p-9 mb-10">
                    <!--begin::Title-->
                    <h2 class="">Sekretariat</h2>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <span class="fw-normal fs-4 "> <strong> Gedung Phinisi Lantai 6</strong> <br>  
                      Jl.A.P Pettarani <br>  
                      Makassar 90222 <br>  
                      Indonesia <br>  
                      P: +62 822-3140-2975 <br>  
                    </span>
                    <!--end::Text-->
                  </div>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.597122737833!2d119.43243431536229!3d-5.168324553636237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee29192be2437%3A0xf9f6d01676cfaae1!2sMenara%20Pinisi%20UNM!5e0!3m2!1sid!2sid!4v1646895194745!5m2!1sid!2sid" width="100%" height="250" frameborder="0" style="border:0"></iframe>
                </div>
                <!--end::Map-->
              </div>
              <!--end::Col-->
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Testimonial-->
        </div>
        <!--end::Col-->
       
      </div>
      <!--end::Row-->
      <!--begin::Highlight-->
      <div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">
        <!--begin::Content-->
        <div class="my-2 me-5">
          <!--begin::Title-->
          <div class="fs-1 fs-lg-2qx fw-bolder text-white mb-2">Start With Metronic Today,
          <span class="fw-normal">Speed Up Development!</span></div>
          <!--end::Title-->
          <!--begin::Description-->
          <div class="fs-6 fs-lg-5 text-white fw-bold opacity-75">Join over 100,000 Professionals Community to Stay Ahead</div>
          <!--end::Description-->
        </div>
        <!--end::Content-->
        <!--begin::Link-->
        <a href="https://1.envato.market/EA4JP" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Purchase on Themeforest</a>
        <!--end::Link-->
      </div>
      <!--end::Highlight-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Testimonials Section-->
  <!--begin::Footer Section-->
  <div class="mb-0">
    <!--begin::Curve top-->
    <div class="landing-curve landing-dark-color">
      <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
      </svg>
    </div>
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
              <h2 class="text-white">Would you need a Custom License?</h2>
              <!--end::Title-->
              <!--begin::Text-->
              <span class="fw-normal fs-4 text-gray-700">Email us to
              <a href="https://keenthemes.com/support" class="text-white opacity-50 text-hover-primary">support@keenthemes.com</a></span>
              <!--end::Text-->
            </div>
            <!--end::Block-->
            <!--begin::Block-->
            <div class="rounded landing-dark-border p-9">
              <!--begin::Title-->
              <h2 class="text-white">How About a Custom Project?</h2>
              <!--end::Title-->
              <!--begin::Text-->
              <span class="fw-normal fs-4 text-gray-700">Use Our Custom Development Service.
              <a href="../../demo1/dist/pages/user-profile/overview.html" class="text-white opacity-50 text-hover-primary">Click to Get a Quote</a></span>
              <!--end::Text-->
            </div>
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
                <h4 class="fw-bolder text-gray-400 mb-6">More for Metronic</h4>
                <!--end::Subtitle-->
                <!--begin::Link-->
                <a href="https://keenthemes.com/faqs" class="text-white opacity-50 text-hover-primary fs-5 mb-6">FAQ</a>
                <!--end::Link-->
                <!--begin::Link-->
                <a href="../../demo1/dist/documentation/getting-started.html" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Documentaions</a>
                <!--end::Link-->
                <!--begin::Link-->
                <a href="https://www.youtube.com/c/KeenThemesTuts/videos" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Video Tuts</a>
                <!--end::Link-->
                <!--begin::Link-->
                <a href="../../demo1/dist/documentation/getting-started/changelog.html" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Changelog</a>
                <!--end::Link-->
                <!--begin::Link-->
                <a href="https://devs.keenthemes.com/" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Support Forum</a>
                <!--end::Link-->
                <!--begin::Link-->
                <a href="https://keenthemes.com/blog" class="text-white opacity-50 text-hover-primary fs-5">Blog</a>
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
                  <img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2" alt="" />
                  <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                </a>
                <!--end::Link-->
                <!--begin::Link-->
                <a href="https://github.com/KeenthemesHub" class="mb-6">
                  <img src="assets/media/svg/brand-logos/github.svg" class="h-20px me-2" alt="" />
                  <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Github</span>
                </a>
                <!--end::Link-->
                <!--begin::Link-->
                <a href="https://twitter.com/keenthemes" class="mb-6">
                  <img src="assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2" alt="" />
                  <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
                </a>
                <!--end::Link-->
                <!--begin::Link-->
                <a href="https://dribbble.com/keenthemes" class="mb-6">
                  <img src="assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-20px me-2" alt="" />
                  <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Dribbble</span>
                </a>
                <!--end::Link-->
                <!--begin::Link-->
                <a href="https://www.instagram.com/keenthemes" class="mb-6">
                  <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2" alt="" />
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
              <img alt="Logo" src="assets/media/logos/logo-landing.svg" class="h-15px h-md-20px" />
            </a>
            <!--end::Logo image-->
            <!--begin::Logo image-->
            <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="https://keenthemes.com">© 2022 Keenthemes Inc.</span>
            <!--end::Logo image-->
          </div>
          <!--end::Copyright-->
          <!--begin::Menu-->
          <ul class="menu menu-gray-600 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
            <li class="menu-item">
              <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
            </li>
            <li class="menu-item mx-5">
              <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
            </li>
            <li class="menu-item">
              <a href="" target="_blank" class="menu-link px-2">Purchase</a>
            </li>
          </ul>
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
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
      </svg>
    </span>
    <!--end::Svg Icon-->
  </div>
  <!--end::Scrolltop-->
</div>

@endsection

@push('prepend-script')
  <!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>

@endpush
@push('addon-script')
<script>
 
</script>
@endpush