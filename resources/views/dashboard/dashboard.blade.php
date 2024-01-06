@extends('layouts.mobile.app')
@section('title', 'Dashboard')

@section('content')
<!-- Shortcut -->
<div class="section wallet-card-section pt-1">
    <div class="wallet-card">
        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <span class="title">Jam Digital</span>
                <h1 class="total text-primary">
                    @php
                    echo date("H:i:s");
                    @endphp
                </h1>
            </div>
            <div class="right">
                <a href="/proseslogout" class="button logout">
                    <ion-icon name="log-out-outline"></ion-icon>
                </a>
            </div>
        </div>
        <!-- * Balance -->
        <!-- Wallet Footer -->
        <div class="wallet-footer">
            <div class="item">
                <a href="/presensi/histori">
                    <div class="icon-wrapper bg-success">
                        <ion-icon name="time-outline"></ion-icon>
                    </div>
                    <strong>Histori</strong>
                </a>
            </div>
            <div class="item">
                <a href="/presensi/izin">
                    <div class="icon-wrapper bg-warning">
                        <ion-icon name="calendar-outline"></ion-icon>
                    </div>
                    <strong>Perizinan</strong>
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <div class="icon-wrapper">
                        <ion-icon name="map-outline"></ion-icon>
                    </div>
                    <strong>Lokasi</strong>
                </a>
            </div>
            <div class="item">
                <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#actionSheetManual">
                    <div class="icon-wrapper bg-danger">
                        <ion-icon name="alert-circle-outline"></ion-icon>
                    </div>
                    <strong>Manual</strong>
                </a>
            </div>
        </div>
        <!-- * Wallet Footer -->
    </div>
</div>
<!-- Shortcut -->

<!-- Rekap -->
<div class="section">
    <div class="row mt-2">
        <div class="col-6">
            <div class="stat-box bg-success">
                <div class="title text-light">Total Hadir</div>
                <div class="value text-light">{{ $rekappresensi->jmlhadir }} Hari</div>
            </div>
        </div>
        <div class="col-6">
            <div class="stat-box bg-danger">
                <div class="title text-light">Terlambat</div>
                <div class="value text-light">{{ $rekappresensi->jmlterlambat }} Hari</div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <div class="stat-box bg-warning">
                <div class="title text-light">Total Izin</div>
                @if($rekapizin->jmlizin == "")
                <div class="value text-light">0 Hari</div>
                @else
                <div class="value text-light">{{ $rekapizin->jmlizin }} Hari</div>
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="stat-box bg-primary">
                <div class="title text-light">Total Sakit</div>
                @if($rekapizin->jmlsakit == "")
                <div class="value text-light">0 Hari</div>
                @else
                <div class="value text-light">{{ $rekapizin->jmlsakit }} Hari</div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- * Rekap -->

<div class="section mt-2">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs style1" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab">
                        Presensi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#card" role="tab">
                        Leaderboard
                    </a>
                </li>
            </ul>
            <div class="tab-content mt-1">
                <div class="tab-pane fade show active" id="overview" role="tabpanel">
                    <div class="transactions">
                        <!-- item -->
                        <a href="#" class="item">
                            <div class="detail">
                                @if ($presensihariini != null)
                                @php
                                $path = Storage::url('uploads/absensi/'.$presensihariini->foto_in);
                                @endphp
                                <img src="{{ url($path) }}" alt="img" class="image-block imaged w48">
                                @else
                                <img src="mobile/img/sample/brand/1.jpg" alt="img" class="image-block imaged w48">
                                @endif
                                <div>
                                    <strong>Masuk</strong>
                                    <p>
                                        @php
                                        echo date("Y-m-d");
                                        @endphp
                                    </p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="price text-primary">
                                    {{ $presensihariini != null ? $presensihariini->jam_in : '00:00:00' }}
                                </div>
                            </div>
                        </a>
                        <!-- * item -->

                        <!-- item -->
                        <a href="#" class="item">
                            <div class="detail">
                                @if ($presensihariini != null && $presensihariini->jam_out != null )
                                @php
                                $path = Storage::url('uploads/absensi/'.$presensihariini->foto_out);
                                @endphp
                                <img src="{{ url($path) }}" alt="img" class="image-block imaged w48">
                                @else
                                <img src="mobile/img/sample/brand/1.jpg" alt="img" class="image-block imaged w48">
                                @endif
                                <div>
                                    <strong>Pulang</strong>
                                    <p>
                                        @php
                                        echo date("Y-m-d");
                                        @endphp
                                    </p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="price text-primary">
                                    {{ $presensihariini != null && $presensihariini->jam_out != null ?
                                    $presensihariini->jam_out :
                                    '00:00:00' }}
                                </div>
                            </div>
                        </a>
                        <!-- * item -->
                    </div>
                </div>
                <div class="tab-pane fade" id="card" role="tabpanel">
                    <ul class="listview image-listview" id="showhistori">
                        @foreach ($leaderboard as $d)
                        <li>
                            <div class="item">
                                @php
                                $path = Storage::url('uploads/absensi/'.$d->foto_in);
                                @endphp
                                <img src="{{ url($path) }}" alt="image" class="image">
                                <div class="in">
                                    <div><b>{{ $d->nama_lengkap }}</b>
                                    </div>
                                    <span class="badge {{ $d->jam_in < $d->jam_masuk ? " bg-success" : "bg-danger" }}"">
                                        {{ $d->jam_in }}
                                    </span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Histori -->
<div class="section full mt-2 mb-3">
    <div class="section-heading padding">
        <h2 class="title">Histori</h2>
        <a href="/presensi/histori" class="link">View All</a>
    </div>
    <!-- carousel small -->
    <div class="carousel-small splide">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($historibulanini as $d)
                @php
                $path = Storage::url('uploads/absensi/'.$d->foto_in);
                @endphp
                <li class="splide__slide">
                    <a href="#">
                        <div class="user-card">
                            <img src="{{ url($path) }}" alt="img" class="imaged w-100">
                            <strong>TGL {{ date("d",strtotime($d->tgl_presensi)) }}</strong>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- * carousel small -->
</div>
<!-- * Presensi -->

<!-- Manual Action Sheet -->
<div class="modal fade action-sheet" id="actionSheetManual" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manual Absen</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <p>
                        Mohon maaf fitur untuk melakukan manual presensi masih dalam pengembangan.
                    </p>
                    <a href="#" class="btn btn-primary btn-lg btn-block" data-bs-dismiss="modal">Tutup</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Manual Action Sheet -->
@endsection