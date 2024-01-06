@extends('layouts.presensi')
@section('title', 'Perizinan')

@section('header')
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">PERIZINAN</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
@endsection
@section('content')
@if ($dataizin->isEmpty())
<div class="mt-2">
    <ul class="listview image-listview inset">
        <li>
            <div class="item">
                <img src="{{ asset('mobile/img/sample/brand/1.jpg') }}" alt="image" class="image">
                <div class="in">
                    <div>
                        Data perizinan
                        <footer>Tidak ada</footer>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
@endif

<div class="mt-2">
    <ul class="listview image-listview inset">
        @foreach ($dataizin as $d)
        <li>
            <div class="item">
                @php
                $path = Storage::url('uploads/karyawan/'.Auth::guard('karyawan')->user()->foto);
                @endphp
                <img src="{{ url($path) }}" alt="image" class="image">
                <div class="in">
                    <div>
                        {{ $d->keterangan }}
                        <footer>{{ date("d-m-Y",strtotime($d->tgl_izin)) }} ({{ $d->status== "s" ? "Sakit" : "Izin"
                            }})</footer>
                    </div>
                    @if ($d->status_approved == 0)
                    <span class="badge bg-warning">Waiting</span>
                    @elseif($d->status_approved==1)
                    <span class="badge bg-success">Approved</span>
                    @elseif($d->status_approved==2)
                    <span class="badge bg-danger">Decline</span>
                    @endif
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>

<div class="fab-button bottom-right" style="margin-bottom:70px">
    <a href="/presensi/buatizin" class="fab">
        <ion-icon name="add-outline"></ion-icon>
    </a>
</div>

@endsection