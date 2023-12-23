@extends('layouts.presensi')
@section('title', 'Pengajuan Izin')

@section('header')
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">FORM PERIZINAN</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
@endsection

@section('content')
<div class="section p-2">
    <form method="POST" action="/presensi/storeizin" id="frmIzin">
        @csrf
        <div class="card">
            <div class="card-body pb-1">
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Tanggal</label>
                        <input type="date" id="tgl_izin" name="tgl_izin" class="form-control" placeholder="Tanggal">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Perizinan</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Izin / Sakit</option>
                            <option value="i">Izin</option>
                            <option value="s">Sakit</option>
                        </select>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="2" class="form-control"></textarea>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <button type="submit" class="btn btn-primary btn-block">
                            Kirim Pengajuan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
@push('myscript')
<script>
    var currYear = (new Date()).getFullYear();

    $(document).ready(function() {
        $(".datepicker").datepicker({

            format: "yyyy-mm-dd"
        });

        $("#tgl_izin").change(function(e) {
            var tgl_izin = $(this).val();
            $.ajax({
                type: 'POST'
                , url: '/presensi/cekpengajuanizin'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , tgl_izin: tgl_izin
                }
                , cache: false
                , success: function(respond) {
                    if (respond == 1) {
                        Swal.fire({
                            title: 'Oops !'
                            , text: 'Anda Sudah Melakukan Input Pengjuan Izin Pada Tanggal Tersebut !'
                            , icon: 'warning'
                        }).then((result) => {
                            $("#tgl_izin").val("");
                        });
                    }
                }
            });
        });

        $("#frmIzin").submit(function() {
            var tgl_izin = $("#tgl_izin").val();
            var status = $("#status").val();
            var keterangan = $("#keterangan").val();
            if (tgl_izin == "") {
                Swal.fire({
                    title: 'Oops !'
                    , text: 'Tanggal Harus Diisi'
                    , icon: 'warning'
                });
                return false;
            } else if (status == "") {
                Swal.fire({
                    title: 'Oops !'
                    , text: 'Status Harus Diisi'
                    , icon: 'warning'
                });
                return false;
            } else if (keterangan == "") {
                Swal.fire({
                    title: 'Oops !'
                    , text: 'Ketereangan Harus Diisi'
                    , icon: 'warning'
                });
                return false;
            }
        });
    });

</script>
@endpush