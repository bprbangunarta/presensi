@if ($histori->isEmpty())
<div class="card">
    <div class="alert alert-imaged alert-danger alert-dismissible fade show" role="alert">
        <div>
            <strong>Data presensi belum ada.</strong>
        </div>
    </div>
</div>
@endif
@foreach ($histori as $d)
<li>
    <div class="item">
        @php
        $path = Storage::url('uploads/absensi/'.$d->foto_in);
        @endphp
        <img src="{{ url($path) }}" alt="image" class="image">
        <div class="in">
            <div><b>Tanggal {{ date("d",strtotime($d->tgl_presensi)) }}</b></div>
            <span class="badge {{ $d->jam_in < $d->jam_masuk ? " bg-success" : "bg-danger" }}">
                {{ $d->jam_in }}
            </span>
            <span class="badge bg-warning">{{ $d->jam_out }}</span>
        </div>
    </div>
</li>
@endforeach