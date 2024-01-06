@extends('layouts.admin.tabler')
@section('title', 'Monitoring Attendance')

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
                                            Monitoring
                                        </div>
                                        <h2 class="page-title">
                                            Attendance Karyawan
                                        </h2>
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
                                            {{ Session::get('warning') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="input-icon mb-3">
                                <form action="/presensi/monitoring" method="GET">
                                    <div class="input-group mb-2">
                                        <input type="text" id="tanggal" value="{{ Request('tanggal') }}" name="tanggal"
                                            value="" class="form-control" placeholder="Tanggal Presensi"
                                            autocomplete="off">
                                        <button class="btn" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-filter" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z">
                                                </path>
                                            </svg>
                                            Filter
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Nik</th>
                                            <th class="text-center">Nama Karyawan</th>
                                            <th class="text-center">Dept</th>
                                            <th class="text-center">Jam Masuk</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Jam Pulang</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Maps</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    function selisih($jam_masuk, $jam_keluar)
                                    {
                                        [$h, $m, $s] = explode(':', $jam_masuk);
                                        $dtAwal = mktime($h, $m, $s, '1', '1', '1');
                                        [$h, $m, $s] = explode(':', $jam_keluar);
                                        $dtAkhir = mktime($h, $m, $s, '1', '1', '1');
                                        $dtSelisih = $dtAkhir - $dtAwal;
                                        $totalmenit = $dtSelisih / 60;
                                        $jam = explode('.', $totalmenit / 60);
                                        $sisamenit = $totalmenit / 60 - $jam[0];
                                        $sisamenit2 = $sisamenit * 60;
                                        $jml_jam = $jam[0];
                                        return $jml_jam . ':' . round($sisamenit2);
                                    }
                                    ?>
                                    @foreach ($presensi as $d)
                                        @php
                                            $foto_in = Storage::url('uploads/absensi/' . $d->foto_in);
                                            $foto_out = Storage::url('uploads/absensi/' . $d->foto_out);
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration + $presensi->firstItem() - 1 }}</td>
                                            <td>{{ $d->nik }}</td>
                                            <td>{{ $d->nama_lengkap }}</td>
                                            <td>{{ $d->kode_dept }}</td>
                                            <!--<td>{{ $d->nama_jam_kerja }} ({{ $d->jam_masuk }} s/d {{ $d->jam_pulang }})</td>-->
                                            <td class="text-center">{{ $d->jam_in }}</td>
                                            <td class="text-center">
                                                <img src="{{ url($foto_in) }}" class="avatar" alt="">
                                            </td>
                                            <td class="text-center">{!! $d->jam_out != null
                                                ? $d->jam_out
                                                : '<span
                                                                                                                                    class="badge bg-danger">Belum Absen</span>' !!}</td>
                                            <td class="text-center">
                                                @if ($d->jam_out != null)
                                                    <img src="{{ url($foto_out) }}" class="avatar" alt="">
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-hourglass-high" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M6.5 7h11"></path>
                                                        <path
                                                            d="M6 20v-2a6 6 0 1 1 12 0v2a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1z">
                                                        </path>
                                                        <path
                                                            d="M6 4v2a6 6 0 1 0 12 0v-2a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1z">
                                                        </path>
                                                    </svg>
                                                @endif

                                            </td>
                                            <td class="text-center">
                                                @if ($d->jam_in >= $d->jam_masuk)
                                                    @php
                                                        $jamterlambat = selisih($d->jam_masuk, $d->jam_in);
                                                    @endphp
                                                    <span class="badge bg-danger">Terlambat {{ $jamterlambat }}</span>
                                                @else
                                                    <span class="badge bg-success">Tepat Waktu</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="tampilkanpeta" id="{{ $d->id }}">
                                                    <span class="badge bg-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-eye" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                            <path
                                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <p></p>
                                {{ $presensi->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tampil Peta --}}
    <div class="modal modal-blur fade" id="modal-tampilkanpeta" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lokasi Presensi User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadmap">

                </div>

            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script>
        $(function() {
            $("#tanggal").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            });
        });
    </script>

    <script>
        $(function() {
            $(".tampilkanpeta").click(function(e) {
                var id = $(this).attr("id");
                $.ajax({
                    type: 'POST',
                    url: '/tampilkanpeta',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    cache: false,
                    success: function(respond) {
                        $("#loadmap").html(respond);
                    }
                });
                $("#modal-tampilkanpeta").modal("show");
            });
        });
    </script>
@endpush
