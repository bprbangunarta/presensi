@extends('layouts.admin.tabler')
@section('title', 'Data Izin dan Sakit')

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
                                Data Izin dan Sakit
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
                                {{ Session::get('warning')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="input-icon mb-2">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M16 3l0 4"></path>
                                        <path d="M8 3l0 4"></path>
                                        <path d="M4 11l16 0"></path>
                                        <path d="M8 15h2v2h-2z"></path>
                                    </svg>
                                </span>
                                <input type="text" value="{{ Request('dari') }}" id="dari" class="form-control" placeholder="Dari" name="dari">
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="input-icon mb-2">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M16 3l0 4"></path>
                                        <path d="M8 3l0 4"></path>
                                        <path d="M4 11l16 0"></path>
                                        <path d="M8 15h2v2h-2z"></path>
                                    </svg>
                                </span>
                                <input type="text" value="{{ Request('sampai') }}" id="sampai" class="form-control" placeholder="Sampai" name="sampai">
                            </div>
                        </div>
                    </div>
                    
                    <form action="/presensi/izinsakit" method="GET" autocomplete="off">
                        <div class="input-group mb-2">
                            <input type="text"  value="{{ Request('nama_lengkap') }}" id="nama_lengkap" class="form-control" placeholder="Nama Karyawan" name="nama_lengkap">
                            <button class="btn" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z">
                                </path>
                            </svg>
                            Filter
                            </button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered table-vcenter">
                            <thead>
                                <tr>
                                    <!--<th class="text-center">No</th>-->
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Nik</th>
                                    <th class="text-center">Nama Karyawan</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($izinsakit as $d)
                                <tr>
                                    <!--<td class="text-center">{{ $loop->iteration }}</td>-->
                                    <td>{{ date('d-m-Y',strtotime($d->tgl_izin)) }}</td>
                                    <td>{{ $d->nik }}</td>
                                    <td>{{ $d->nama_lengkap }}</td>
                                    <td>{{ $d->jabatan }}</td>
                                    <td class="text-center">{{ $d->status == "i" ? "Izin" : "Sakit" }}</td>
                                    <td>{{ $d->keterangan }}</td>
                                    <td class="text-center">
                                        @if ($d->status_approved==1)
                                        <span class="badge bg-success">Disetujui</span>
                                        @elseif($d->status_approved==2)
                                        <span class="badge bg-danger">Ditolak</span>
                                        @else
                                        <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($d->status_approved==0)
                                        <a href="#" id="approve" id_izinsakit="{{ $d->id }}">
                                            <span class="badge bg-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5"></path>
                                                    <path d="M10 14l10 -10"></path>
                                                    <path d="M15 4l5 0l0 5"></path>
                                                </svg>
                                            </span>
                                        </a>

                                        @else
                                        <a href="/presensi/{{ $d->id }}/batalkanizinsakit" title="Batalkan">
                                            <span class="badge bg-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 10l4 4m0 -4l-4 4"></path>
                                                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                                                </svg>
                                            </span>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p></p>
                        {{ $izinsakit->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>

            </div>
        </div>
      </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal modal-blur fade" id="modal-izinsakit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Status Izin dan Sakit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/presensi/approveizinsakit" method="POST">
                    @csrf
                    <input type="hidden" id="id_izinsakit_form" name="id_izinsakit_form">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <select name="status_approved" id="status_approved" class="form-select">
                                    <option value="1">Disetujui</option>
                                    <option value="2">Ditolak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-gropu">
                                <button class="btn btn-primary w-100" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 14l11 -11"></path>
                                        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                                    </svg>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@push('myscript')
<script>
    $(function() {
        $("#approve").click(function(e) {
            e.preventDefault();
            var id_izinsakit = $(this).attr("id_izinsakit");
            $("#id_izinsakit_form").val(id_izinsakit);
            $("#modal-izinsakit").modal("show");
        });

        $("#dari, #sampai").datepicker({
            autoclose: true
            , todayHighlight: true
            , format: 'yyyy-mm-dd'
        });
    });

</script>
@endpush
