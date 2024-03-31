<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Login - Attendance</title>
    <link rel="icon" type="image/png" href="https://www.ninjaxpress.co/favicon/favicon.ico" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.ninjaxpress.co/favicon/favicon.ico">
    <link rel="stylesheet" href="{{ asset('mobile/css/style.css') }}">
    <link rel="manifest" href="{{ asset('mobile/__manifest.json') }}">

    {{-- Meta Description --}}
    <meta name="description" content="Pencatatan kehadirian karyawan Ninja Express">
    <meta name="keywords" content="Ninja Express" />

    <meta content='Aplikasi Presensi' property='og:title' />
    <meta content='https://presensi.bprbangunarta.co.id/' property='og:url' />
    <meta content='Aplikasi Presensi' property='og:site_name' />
    <meta content='website' property='og:type' />
    <meta content='Pencatatan kehadirian karyawan Ninja Express' property='og:description' />
    <meta content='Aplikasi Presensi' property='og:image:alt' />
    <meta content='https://media.suara.com/pictures/970x544/2021/05/22/38015-cara-cek-resi-ninja-xpress.jpg' property='og:image' />
</head>

<body class="bg-white">
    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="pageTitle">ATTENDANCE</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1>Log in</h1>
            <h4>ATTENDANCE APP</h4>
        </div>

        <div class="section mb-5 p-2">
            <form action="/proseslogin" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">NIK</label>
                                <input type="text" name="nik" class="form-control" id="nik"
                                    placeholder="Nomer Induk">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Kata Sandi">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Masuk</button>
                </div>
            </form>

            @php
                $messagewarning = Session::get('warning');
            @endphp
            @if (Session::get('warning'))
                <div class="mt-1">
                    <div class="alert alert-imaged alert-warning" role="alert">
                        <div>
                            <strong>{{ $messagewarning }}</strong>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- * App Capsule -->

    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="{{ asset('mobile/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="{{ asset('mobile/js/plugins/splide/splide.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('mobile/js/base.js') }}"></script>


</body>

</html>
