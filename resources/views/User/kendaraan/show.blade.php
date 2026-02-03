@include('partials.head')

<div class="container py-4">
<div class="row">
<div class="col-md-6">
    <img src="{{ asset($kendaraan->gambar) }}" class="img-fluid rounded">
</div>
<div class="col-md-6">
    <h3>{{ $kendaraan->nama }}</h3>
    <p>No Polisi: {{ $kendaraan->nomor_polisi }}</p>
    <p>Jenis: {{ $kendaraan->jenisKendaraan->nama }}</p>
    <p>Tahun: {{ $kendaraan->tahun }}</p>
    <h4 class="text-primary">Rp {{ number_format($kendaraan->harga) }}</h4>
</div>
</div>
</div>

@include('partials.script')
