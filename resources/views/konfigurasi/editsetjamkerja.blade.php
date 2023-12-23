@extends('layouts.admin.tabler')
@section('title', 'Set Jam Kerja')

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
                                    <a href="/karyawan" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 12l14 0"></path>
                                            <path d="M5 12l6 6"></path>
                                            <path d="M5 12l6 -6"></path>
                                        </svg>
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
      
        <div class="col-md-6">
            <form action="/konfigurasi/updatesetjamkerja" class="card" method="POST">
            @csrf
              <div class="card-header">
                <input type="hidden" name="nik" value="{{ $karyawan->nik }}">
                <h3 class="card-title">{{ $karyawan->nama_lengkap }}</h3>
              </div>
              <div class="card-body">
    
                @foreach ($setjamkerja as $s)
                <div class="mb-3">
                  <label class="form-label required">{{ $s->hari }}</label>
                  <input type="hidden" name="hari[]" value="{{ $s->hari }}">
                  <div>
                    <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                        <option value="">Pilih Jam Kerja</option>
                        @foreach ($jamkerja as $d)
                        <option {{ $d->kode_jam_kerja==$s->kode_jam_kerja ? 'selected' : '' }} value="{{ $d->kode_jam_kerja }}">{{ $d->nama_jam_kerja }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                @endforeach
                
              </div>
              <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
        </div>

        <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Master Jam Kerja</h3>
              </div>
              <div class="card-body">
    
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Awal Masuk</th>
                                <th class="text-center">Jam Masuk</th>
                                <th class="text-center">Akhir Masuk</th>
                                <th class="text-center">Jam Pulang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jamkerja as $d)
                            <tr>
                                <td>{{ $d->nama_jam_kerja }}</td>
                                <td class="text-center">{{ $d->awal_jam_masuk }}</td>
                                <td class="text-center">{{ $d->jam_masuk }}</td>
                                <td class="text-center">{{ $d->akhir_jam_masuk }}</td>
                                <td class="text-center">{{ $d->jam_pulang }}</td>
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
@endsection
