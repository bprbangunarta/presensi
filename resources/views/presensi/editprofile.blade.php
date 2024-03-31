@extends('layouts.presensi')
@section('title', 'Edit Profile')

@section('header')
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">PROFIL</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
@endsection

@section('content')

<div class="section p-1">
    @php
    $messagesuccess = Session::get('success');
    $messageerror = Session::get('error');
    @endphp
    @if (Session::get('success'))
    <div class="alert alert-success mb-1">
        {{ $messagesuccess }}
    </div>
    @endif
    @if (Session::get('error'))
    <div class="alert alert-warning mb-1">
        {{ $messageerror }}
    </div>
    @endif
    <form action="/presensi/{{ $karyawan->nik }}/updateprofile" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card    ">
            <div class="card-body pb-1">

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $karyawan->nama_lengkap }}" name="nama_lengkap" placeholder="Nama Lengkap">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Nomor HP</label>
                        <input type="text" inputmode="numeric" class="form-control" value="{{ $karyawan->no_hp }}" name="no_hp" placeholder="No. HP">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Password</label>
                        <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Your password">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="custom-file-upload mt-1 mb-1" id="fileUpload1">
                    <input type="file" name="foto" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                    <label for="fileuploadInput">
                        <span>
                            <strong>
                                <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                <i>Upload a Photo</i>
                            </strong>
                        </span>
                    </label>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <button type="submit" class="btn btn-primary btn-block">
                            Update Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection