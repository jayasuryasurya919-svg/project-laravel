@extends('layouts.user')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="rounded-circle bg-primary-subtle text-primary p-2">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Masuk Admin Panel</h5>
                        <small class="text-muted">Masukkan password admin untuk lanjut</small>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.password.store', absolute: false) }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Password Admin</label>
                        <input type="password" name="admin_password" class="form-control" required>
                        @error('admin_password')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary">Masuk</button>
                        <a href="{{ route('user.beranda') }}" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
