@extends('layouts.presensi')
@section('title', 'Riwayat Presensi')

@section('header')
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">HISTORI</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
@endsection
@section('content')
<div class="section mt-2">
    <div class="card">
        <div class="card-body">
            <form>
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label>Pilih Bulan</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <option value="">Bulan</option>
                            @for ($i=1; $i<=12; $i++) <option value="{{ $i }}" {{ date("m")==$i ? 'selected' : '' }}>{{
                                $namabulan[$i] }}</option>
                                @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label>Pilih Tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <option value="">Tahun</option>
                            @php
                            $tahunmulai = 2022;
                            $tahunskrg = date("Y");
                            @endphp
                            @for ($tahun=$tahunmulai; $tahun<= $tahunskrg; $tahun++) <option value="{{ $tahun }}" {{
                                date("Y")==$tahun ? 'selected' : '' }}>{{ $tahun }}
                                </option>
                                @endfor
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-1">
        <button class="btn btn-primary btn-block" id="getdata">
            Lihat Histori
        </button>
    </div>
</div>

<div class="mt-1 mb-1">
    <ul class="listview image-listview inset" id="showhistori">
    </ul>
</div>

@endsection


@push('myscript')
<script>
    $(function() {
        $("#getdata").click(function(e) {
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            $.ajax({
                type: 'POST'
                , url: '/gethistori'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , bulan: bulan
                    , tahun: tahun
                }
                , cache: false
                , success: function(respond) {
                    $("#showhistori").html(respond);
                }
            });
        });
    });

</script>
@endpush