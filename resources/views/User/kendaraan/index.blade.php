@extends('layouts.user')

@section('content')
<div class="row">
@foreach($kendaraans as $item)
<div class="col-md-4 mb-3">
    <div class="card">
        <img src="{{ asset($item->gambar) }}" class="card-img-top">
        <div class="card-body">
            <h5>{{ $item->nama }}</h5>
            <a href="{{ route('user.kendaraan.show',$item->id) }}"
               class="btn btn-primary btn-sm">Detail</a>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection
