<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" sizes="32x32">
    <link rel="stylesheet" href="{{ asset('mobile/css/style.css') }}">

    {{-- Meta Description --}}
    <meta name="description" content="Pencatatan presensi kehadirian karyawan BPR Bangunarta">
    <meta name="keywords" content="BPR Bangunarta, bprbangunarta" />

    <meta content='Aplikasi Presensi' property='og:title' />
    <meta content='https://presensi.bprbangunarta.co.id/' property='og:url' />
    <meta content='Aplikasi Presensi' property='og:site_name' />
    <meta content='website' property='og:type' />
    <meta content='Pencatatan presensi kehadirian karyawan BPR Bangunarta' property='og:description' />
    <meta content='Aplikasi Presensi' property='og:image:alt' />
    <meta content='https://presensi.bprbangunarta.co.id/assets/img/banner.png' property='og:image' />

    <link rel="manifest" href="__manifest.json">
</head>

<body style="background-color:#e9ecef;">
    @yield('header')

    <!-- App Capsule -->
    <div id="appCapsule">
        @yield('content')
    </div>
    <!-- * App Capsule -->

    @include('layouts.bottomNav')

    @include('layouts.script')

</body>

</html>
