@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary mb-3">
        + Tambah Kendaraan
    </a>

    <div class="row">
        @foreach($kendaraans as $k)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">

                @if($k->gambar)
                    <img src="{{ asset('storage/'.$k->gambar) }}"
                         class="card-img-top"
                         style="height:200px;object-fit:cover">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image"
                         class="card-img-top">
                @endif

                <div class="card-body">
                    <h5>{{ $k->nama }}</h5>
                    <p>{{ $k->jenis->nama }}</p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('kendaraan.edit',$k->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('kendaraan.destroy',$k->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin hapus data?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
