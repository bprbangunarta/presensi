<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="./assets/img/favicon.png">

    <title>@yield('title')</title>
    <!-- CSS files -->
    <link href="{{ asset('tabler/dist/css/tabler.min.css?1674944402') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-flags.min.css?1674944402') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-payments.min.css?1674944402') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/demo.min.css?1674944402') }}" rel="stylesheet" />
    <link href="./dist/css/demo.min.css?1674944402" rel="stylesheet" />
    <style>
    @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="{{ asset('tabler/dist/js/demo-theme.min.js?1674944402') }}"></script>
    <div class="page">
        <div class="page-wrapper">

            <!-- Page body -->
            @yield('content')

        </div>
    </div>

  <!-- Libs JS -->
  <script src="./dist/libs/apexcharts/dist/apexcharts.min.js?1674944402" defer></script>
  <script src="./dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1674944402" defer></script>
  <script src="./dist/libs/jsvectormap/dist/maps/world.js?1674944402" defer></script>
  <script src="./dist/libs/jsvectormap/dist/maps/world-merc.js?1674944402" defer></script>
  <!-- Tabler Core -->
  <script src="./dist/js/tabler.min.js?1674944402" defer></script>
  <script src="./dist/js/demo.min.js?1674944402" defer></script>

  <script>
    window.print();
  </script>

</body>

</html>