@extends('layouts.admin.tabler')
@section('title', 'Konfigurasi Jam Kerja')

@section('content')
<div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                <div class="page-pretitle">
                                Konfigurasi
                                </div>
                                <h2 class="page-title">
                                Jam Kerja
                                </h2>
                            </div>
                            <div class="col-auto ms-auto d-print-none">
                                <div class="btn-list">
                                <a href="#" class="btn btn-primary" id="btnTambahJK">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                    </svg>
                                    Tambah
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body border-bottom py-3">
                    <div class="row">
                        <div class="col-12">
                            @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif

                            @if (Session::get('warning'))
                            <div class="alert alert-warning">
                                {{ Session::get('warning')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">No</th>
                                    <th class="text-center">Kode JK</th>
                                    <th class="text-center">Nama JK</th>
                                    <th class="text-center">Awal Masuk</th>
                                    <th class="text-center">Akhir Masuk</th>
                                    <th class="text-center">Batas Masuk</th>
                                    <th class="text-center">Awal Pulang</th>
                                    <th class="text-center" width="7%">Edit</th>
                                    <th class="text-center" width="7%">Hapus</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($jam_kerja as $d)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $d->kode_jam_kerja }}</td>
                                    <td class="text-center">{{ $d->nama_jam_kerja }}</td>
                                    <td class="text-center">{{ $d->awal_jam_masuk }}</td>
                                    <td class="text-center">{{ $d->jam_masuk }}</td>
                                    <td class="text-center">{{ $d->akhir_jam_masuk }}</td>
                                    <td class="text-center">{{ $d->jam_pulang }}</td>
                                    <td class="text-center">
                                        <a class="edit" kode_jam_kerja="{{ $d->kode_jam_kerja }}">
                                            <span class="badge bg-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <form action="/konfigurasi/{{ $d->kode_jam_kerja }}/delete" method="POST" style="margin-left:5px">
                                            @csrf
                                            <a href="#" class="delete-confirm">
                                            <span class="badge bg-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" stroke-width="0" fill="currentColor"></path>
                                                <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
      </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal modal-blur fade" id="modal-inputjk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Jam Kerja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/konfigurasi/storejamkerja" method="POST" id="frmJK">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                                        <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                                        <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                                        <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M5 11h1v2h-1z"></path>
                                        <path d="M10 11l0 2"></path>
                                        <path d="M14 11h1v2h-1z"></path>
                                        <path d="M19 11l0 2"></path>
                                    </svg>
                                </span>
                                <input type="text" value="" id="kode_jam_kerja" class="form-control" placeholder="Kode Jam Kerja" name="kode_jam_kerja">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                                        <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                                        <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                                        <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M5 11h1v2h-1z"></path>
                                        <path d="M10 11l0 2"></path>
                                        <path d="M14 11h1v2h-1z"></path>
                                        <path d="M19 11l0 2"></path>
                                    </svg>
                                </span>
                                <input type="text" value="" id="nama_jam_kerja" class="form-control" placeholder="Nama Jam Kerja" name="nama_jam_kerja">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                        <path d="M12 10l0 3l2 0"></path>
                                        <path d="M7 4l-2.75 2"></path>
                                        <path d="M17 4l2.75 2"></path>
                                    </svg>
                                </span>
                                <input type="text" value="" id="awal_jam_masuk" class="form-control" placeholder="Awal Jam Masuk" name="awal_jam_masuk">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                        <path d="M12 10l0 3l2 0"></path>
                                        <path d="M7 4l-2.75 2"></path>
                                        <path d="M17 4l2.75 2"></path>
                                    </svg>
                                </span>
                                <input type="text" value="" id="jam_masuk" class="form-control" placeholder="Jam Masuk" name="jam_masuk">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                        <path d="M12 10l0 3l2 0"></path>
                                        <path d="M7 4l-2.75 2"></path>
                                        <path d="M17 4l2.75 2"></path>
                                    </svg>
                                </span>
                                <input type="text" value="" id="akhir_jam_masuk" class="form-control" placeholder="Akhir Jam Masuk" name="akhir_jam_masuk">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                        <path d="M12 10l0 3l2 0"></path>
                                        <path d="M7 4l-2.75 2"></path>
                                        <path d="M17 4l2.75 2"></path>
                                    </svg>
                                </span>
                                <input type="text" value="" id="jam_pulang" class="form-control" placeholder="Jam Pulang" name="jam_pulang">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-primary w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 14l11 -11"></path>
                                        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                                    </svg>
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal modal-blur fade" id="modal-editjk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Jam Kerja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="loadeditform">

            </div>

        </div>
    </div>
</div>
@endsection

@push('myscript')
<script>
    $(function() {
        $("#btnTambahJK").click(function() {
            $("#modal-inputjk").modal("show");
        });

        $(".delete-confirm").click(function(e) {
            var form = $(this).closest('form');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin Data Ini Mau Di Hapus ?'
                , text: "Jika Ya Maka Data Akan Terhapus Permanent"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Ya, Hapus Saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Deleted!'
                        , 'Data Berhasil Di Hapus'
                        , 'success'
                    )
                }
            })
        });

        $("#frmJK").submit(function() {
            var kode_jam_kerja = $("#kode_jam_kerja").val();
            var nama_jam_kerja = $("#nama_jam_kerja").val();
            var awal_jam_masuk = $("#awal_jam_masuk").val();
            var jam_masuk = $("#jam_masuk").val();
            var akhir_jam_masuk = $("#akhir_jam_masuk").val();
            var jam_pulang = $("#jam_pulang").val();

            if (kode_jam_kerja == "") {
                // alert('Nik Harus Diisi');
                Swal.fire({
                    title: 'Warning!'
                    , text: 'Kode Jam Kerja Harus Diisi !'
                    , icon: 'warning'
                    , confirmButtonText: 'Ok'
                }).then((result) => {
                    $("#kode_jam_kerja").focus();
                });

                return false;
            } else if (nama_jam_kerja == "") {
                // alert('Nik Harus Diisi');
                Swal.fire({
                    title: 'Warning!'
                    , text: 'Nama Jam Kerja Harus Diisi !'
                    , icon: 'warning'
                    , confirmButtonText: 'Ok'
                }).then((result) => {
                    $("#nama_jam_kerja").focus();
                });

                return false;
            } else if (awal_jam_masuk == "") {
                // alert('Nik Harus Diisi');
                Swal.fire({
                    title: 'Warning!'
                    , text: 'Awal Jam Masuk Harus Diisi !'
                    , icon: 'warning'
                    , confirmButtonText: 'Ok'
                }).then((result) => {
                    $("#awal_jam_masuk").focus();
                });

                return false;
            } else if (jam_masuk == "") {
                // alert('Nik Harus Diisi');
                Swal.fire({
                    title: 'Warning!'
                    , text: 'Jam Masuk Harus Diisi !'
                    , icon: 'warning'
                    , confirmButtonText: 'Ok'
                }).then((result) => {
                    $("#jam_masuk").focus();
                });

                return false;
            } else if (akhir_jam_masuk == "") {
                // alert('Nik Harus Diisi');
                Swal.fire({
                    title: 'Warning!'
                    , text: 'Akhir Masuk Harus Diisi !'
                    , icon: 'warning'
                    , confirmButtonText: 'Ok'
                }).then((result) => {
                    $("#akhir_jam_masuk").focus();
                });

                return false;
            } else if (jam_pulang == "") {
                // alert('Nik Harus Diisi');
                Swal.fire({
                    title: 'Warning!'
                    , text: 'Jam Pulang Harus Diisi !'
                    , icon: 'warning'
                    , confirmButtonText: 'Ok'
                }).then((result) => {
                    $("#jam_pulang").focus();
                });

                return false;
            }
        });


        $(".edit").click(function() {
            var kode_jam_kerja = $(this).attr('kode_jam_kerja');
            $.ajax({
                type: 'POST'
                , url: '/konfigurasi/editjamkerja'
                , cache: false
                , data: {
                    _token: "{{ csrf_token(); }}"
                    , kode_jam_kerja: kode_jam_kerja
                }
                , success: function(respond) {
                    $("#loadeditform").html(respond);
                }
            });
            $("#modal-editjk").modal("show");
        });
    });

</script>
@endpush
