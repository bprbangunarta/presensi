<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Login - Presensi</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon/192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('mobile/css/style.css') }}">
    <link rel="manifest" href="{{ asset('mobile/__manifest.json') }}">

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
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <img src="{{ asset('mobile/img/logo-icon.png') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->


    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="pageTitle">KEBIJAKAN PRIVASI</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mb-5 p-2">
            <p>
               Selamat datang di Aplikasi "BA PRESENSI" yang disediakan oleh BPR Bangunarta. Kami berkomitmen untuk melindungi privasi dan keamanan informasi pengguna kami.
            </p>
            <p>
                Kebijakan ini dirancang untuk menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi data yang Anda berikan kepada kami melalui aplikasi ini.
            </p> 
            <p>
             Kami mendorong Anda untuk membaca kebijakan ini dengan cermat untuk memahami hak dan kewajiban Anda saat menggunakan aplikasi "BA PRESENSI."
            </p>
            
            <h3>1. Informasi yang Kami Kumpulkan</h3>
            <p>
                Kami dapat mengumpulkan informasi pribadi seperti nama, nomor identifikasi karyawan, dan informasi kontak (seperti alamat email atau nomor telepon) yang Anda berikan secara sukarela.
            </p>
            <p>
                Kami juga dapat mengumpulkan data presensi karyawan yang mencakup waktu kedatangan dan kepergian dari tempat kerja.
            </p>
            <h3>2. Penggunaan Aplikasi</h3>
            <p>
                Kami menggunakan informasi yang dikumpulkan melalui aplikasi "BA PRESENSI" untuk tujuan berikut:
            </p>
            
            <ul>
                <li>Melakukan rekap presensi karyawan.</li>
                <li>Menyediakan laporan presensi kepada manajemen perusahaan.</li>
                <li>Memungkinkan komunikasi antara pengguna dan admin aplikasi.</li>
            </ul>
            
            <h3>3. Keamanan Data</h3>
            <p>
                Kami menjaga keamanan data Anda dengan mengambil langkah-langkah yang sesuai untuk melindungi informasi pribadi dari akses yang tidak sah, penggunaan, atau pengungkapan yang tidak sah.
            </p>
            <p>
                Kami menggunakan enkripsi dan teknologi keamanan lainnya untuk melindungi data Anda.
            </p>
            
            <h3>4. Berbagi Informasi</h3>
            <p>
                Kami tidak akan membagikan informasi pribadi Anda kepada pihak ketiga tanpa izin Anda, kecuali jika diperlukan oleh hukum atau regulasi yang berlaku.
            </p>
            
            <h3>5. Akses dan Kontrol</h3>
            <p>
                Anda memiliki hak untuk mengakses, memperbaiki, atau menghapus informasi pribadi Anda yang disimpan oleh aplikasi "BA PRESENSI." Anda juga dapat mengubah preferensi komunikasi Anda dengan kami.
            </p>
            
            <h3>6. Perubahan Kebijakan</h3>
            <p>
                Kebijakan ini dapat diperbarui dari waktu ke waktu untuk mencerminkan perubahan dalam praktik kami atau peraturan yang berlaku.
            </p>
            
            <p>
                Perubahan signifikan akan diberitahukan kepada Anda melalui pembaruan aplikasi atau melalui kontak yang Anda berikan kepada kami.
            </p>
            
            <p>
            Dengan menggunakan aplikasi "BA PRESENSI," Anda menyetujui kebijakan ini dan pemrosesan data yang dijelaskan di dalamnya. 
            </p>
            
            <p>
                Jika Anda tidak setuju dengan kebijakan ini, kami sarankan untuk tidak menggunakan aplikasi kami.
            </p>
            
            <p>
                Untuk pertanyaan atau klarifikasi lebih lanjut mengenai kebijakan ini, silakan hubungi kami di 082320099971.
            </p>
            
            <p>
                Terima kasih atas kepercayaan Anda kepada BPR Bangunarta dan penggunaan aplikasi "BA PRESENSI." Kami berusaha untuk memberikan pengalaman yang aman dan berguna bagi seluruh pengguna kami.
            </p>
            
            
        </div>
    </div>
    <!-- * App Capsule -->

    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="{{ asset('mobile/js/lib/bootstrap.bundle.min.js'); }}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="{{ asset('mobile/js/plugins/splide/splide.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('mobile/js/base.js') }}"></script>


</body>

</html>