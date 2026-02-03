@extends('layouts.user')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="mb-3">Masuk Admin Panel</h5>

                <form method="POST" action="{{ route('admin.password.store', absolute: false) }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Password Admin</label>
                        <input type="password" name="admin_password" class="form-control" required>
                        @error('admin_password')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Masuk</button>
                    <a href="{{ route('user.beranda') }}" class="btn btn-link">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
