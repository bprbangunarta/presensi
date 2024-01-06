@extends('layouts.admin.print')
@section('title', 'Print Rekepitulasi')

@section('content')
<?php
    function selisih($jam_masuk, $jam_keluar)
    {
        list($h, $m, $s) = explode(":", $jam_masuk);
        $dtAwal = mktime($h, $m, $s, "1", "1", "1");
        list($h, $m, $s) = explode(":", $jam_keluar);
        $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
        $dtSelisih = $dtAkhir - $dtAwal;
        $totalmenit = $dtSelisih / 60;
        $jam = explode(".", $totalmenit / 60);
        $sisamenit = ($totalmenit / 60) - $jam[0];
        $sisamenit2 = $sisamenit * 60;
        $jml_jam = $jam[0];
        return $jml_jam . ":" . round($sisamenit2);
    }
?>

<div class="page-body">
    <div class="container-xl">
      <div class="card card-lg">
        <div class="card-body">
          <div class="row fs-5" style="margin-top: -20px;">

            <div class="col-12">
              <img src="https://simontok.bprbangunarta.co.id/assets/img/banner.png" class="navbar-brand-image mb-2">
            </div>

            <div class="col-12 mb-2">
              <div style="border-bottom: solid #034871 2px ;"></div>
            </div>

            <div class="col-6">
              <p class="h3">HRD Manager</p>
              <address>
                Jl. H. Iksan No.89, Pamanukan<br>
                Kec. Pamanukan, Subang<br>
                Jawa Barat, 41254<br>
              </address>
            </div>

            <div class="col-12 mb-2">
              <h4 class="text-center">LAPORAN PRESENSI PERIODE {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }}</h4>
            </div>
          </div>

          <table class="table table-bordered table-responsive table-vcenter fs-5">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center">Nik</th>
                    <th rowspan="2" class="text-center">Nama Karyawan</th>
                    <th colspan="31" class="text-center">Tanggal</th>
                    <th rowspan="2" class="text-center">TH</th>
                    <th rowspan="2" class="text-center">TT</th>
                </tr>
                <tr class="text-center">
                    <?php
                    for($i=1; $i<=31; $i++){
                    ?>
                    <th>{{ $i }}</th>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            @foreach ($rekap as $d)
            <tr>
                <td>{{ $d->nik }}</td>
                <td>{{ $d->nama_lengkap }}</td>

                <?php
                $totalhadir = 0;
                $totalterlambat = 0;
                for($i=1; $i<=31; $i++){
                    $tgl = "tgl_".$i;
                    if(empty($d->$tgl)){
                        $hadir = ['',''];
                        $totalhadir += 0;
                    }else{
                        $hadir = explode("-",$d->$tgl);
                        $totalhadir += 1;
                        if($hadir[0] > $d->jam_masuk){
                            $totalterlambat +=1;
                        }
                    }
                ?>

                <td class="text-center">
                    <span style="color:{{ $hadir[0]> $d->jam_masuk ? "red" : "" }}">{{ !empty($hadir[0]) ? $hadir[0] : '-' }}</span><br>
                    <span style="color:{{ $hadir[1]< $d->jam_pulang ? "red" : "" }}">{{ !empty($hadir[1]) ? $hadir[1] : '-' }}</span>
                </td>

                <?php
                }
                ?>
                <td style="text-align: center;">{{ $totalhadir }}</td>
                <td style="text-align: center;">{{ $totalterlambat }}</td>
            </tr>
            @endforeach
            
          </table>

          <div class="col-12 mb-2">

          </div>

          <div class="row mb-2 text-center fs-4">
            <div class="col-3 mb-2"></div>
            <div class="col-3 mb-2"></div>
            <div class="col-3 mb-2"></div>
            <div class="col-3 mb-5">
              Pamanukan, {{ date('d-m-Y') }}
            </div>
          </div>

          <div class="row text-center fs-4">
            <div class="col-3">
              <u>Moh. Muksin</u><br>
              <b>Direktur Utama</b>
            </div>
            <div class="col-3 mb-2">
            </div>
            <div class="col-3 mb-2">
            </div>
            <div class="col-3 mb-2">
              <u>Teguh Tiftazani Khara</u><br>
              <b>Kabag SDM & Umum</b>
            </div>
          </div>

        </div>
      </div>
    </div>
</div>
@endsection