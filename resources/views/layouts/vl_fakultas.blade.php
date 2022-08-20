<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor5 color-header headercolor5">


<!-- Mirrored from codervent.com/rukada/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Apr 2022 06:43:48 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('partials.vp_css')
    <title>Fakultas | TRACERSTUDY</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        @include('partials.vp_f_sidebar')
        @include('partials.vp_header')
        @yield('content')
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->


    @stack('prepend-script')

    @include('partials.vp_js')
    {{-- @include('includes.admin.script') --}}

    @stack('addon-script')
</body>


<!-- Mirrored from codervent.com/rukada/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Apr 2022 06:44:50 GMT -->

</html>
