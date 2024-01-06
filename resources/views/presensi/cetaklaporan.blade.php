@extends('layouts.admin.print')
@section('title', 'Print Laporan')

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

            <div class="col-6 text-end">
              <p class="h3">{{ $karyawan->nama_lengkap }}</p>
              <address>
                {{ $karyawan->nama_dept }}<br>
                {{ $karyawan->jabatan }}<br>
                {{ $karyawan->nik }}<br>
              </address>
            </div>

            <div class="col-12 mb-2">
              <h4 class="text-center">LAPORAN PRESENSI PERIODE {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }}</h4>
            </div>
          </div>

          <table class="table table-bordered table-responsive table-vcenter fs-4">
            <thead>
              <tr>
                <th class="text-center" style="width: 1%">No</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Jam Masuk</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Jam Pulang</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Jml Jam</th>
              </tr>
            </thead>

            @foreach ($presensi as $d)
            @php
            $path_in = Storage::url('uploads/absensi/'.$d->foto_in);
            $path_out = Storage::url('uploads/absensi/'.$d->foto_out);
            $jamterlambat = selisih($d->jam_masuk,$d->jam_in);
            @endphp
            <tr>
                <td  class="text-center">{{ $loop->iteration }}</td>
                <td  class="text-center">{{ date("d-m-Y",strtotime($d->tgl_presensi)) }}</td>
                <td  class="text-center">{{ $d->jam_in }}</td>
                <td  class="text-center"><img src="{{ url($path_in) }}" alt="" class="avatar"></td>
                <td  class="text-center">{{ $d->jam_out != null ? $d->jam_out : 'Belum Absen' }}</td>
                <td  class="text-center">
                    @if ($d->jam_out != null)
                    <img src="{{ url($path_out) }}" alt="" class="avatar">
                    @else
                    <img src="{{ asset('assets/img/camera.jpg') }}" alt="" class="avatar">
                    @endif
                </td>
                <td  class="text-center">
                    @if ($d->jam_in > $d->jam_masuk)
                    Terlambat {{ $jamterlambat }}
                    @else
                    Tepat Waktu
                    @endif
                </td>
                <td class="text-center">
                    @if ($d->jam_out != null)
                    @php
                    $jmljamkerja = selisih($d->jam_in,$d->jam_out);
                    @endphp
                    @else
                    @php
                    $jmljamkerja = 0;
                    @endphp
                    @endif
                    
                    {{ $jmljamkerja }}
                </td>
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