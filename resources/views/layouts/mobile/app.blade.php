<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>@yield('title')</title>
    <meta name="description" content="Pencatatan presensi kehadirian karyawan BPR Bangunarta">
    <meta name="keywords" content="BPR Bangunarta, bprbangunarta" />

    <meta content='Aplikasi Presensi' property='og:title' />
    <meta content='https://presensi.bprbangunarta.co.id/' property='og:url' />
    <meta content='Aplikasi Presensi' property='og:site_name' />
    <meta content='website' property='og:type' />
    <meta content='Pencatatan presensi kehadirian karyawan BPR Bangunarta' property='og:description' />
    <meta content='Aplikasi Presensi' property='og:image:alt' />
    <meta content='https://presensi.bprbangunarta.co.id/assets/img/banner.png' property='og:image' />

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" sizes="32x32">
    <link rel="stylesheet" href="mobile/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="mobile/img/logo-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            PRESENSI
        </div>
        <div class="right">
            {{-- <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a> --}}
            <a href="/editprofile" class="headerButton">
                @if(!empty(Auth::guard('karyawan')->user()->foto))
                @php
                $path = Storage::url('uploads/karyawan/'.Auth::guard('karyawan')->user()->foto);
                @endphp
                <img src="{{ url($path) }}" alt="image" class="imaged w32">
                @else
                <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged w32">
                @endif
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        @yield('content')

        <!-- app footer -->
        <div class="appFooter">
            <div class="footer-title">
                PRESENSI GEOLOKASI
            </div>
            PT. BPR PAMANUKAN BANGUNARTA
        </div>
        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->

    @include('layouts.mobile.menu')

    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="mobile/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="mobile/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="mobile/js/base.js"></script>

    <script>
        // Add to Home with 2 seconds delay.
        AddtoHome("2000", "once");
    </script>

</body>

</html>