@extends('layouts.admin')

@section('title', 'Transaksi')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Data Transaksi</h5>
        <small class="text-muted">Daftar transaksi terbaru</small>
    </div>
    <a href="{{ route('admin.transaksi.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>Tambah Transaksi
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Peminjam</th>
                    <th>Kendaraan</th>
                    <th>No Polisi</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->user->name ?? $t->nama_peminjam }}</td>
                    <td>{{ $t->kendaraan->nama ?? '-' }}</td>
                    <td>{{ $t->kendaraan->nomor_polisi ?? '-' }}</td>
                    <td class="text-end">
                        <div class="btn-group btn-group-sm" role="group">
                            <button
                                type="button"
                                class="btn btn-outline-secondary"
                                data-bs-toggle="modal"
                                data-bs-target="#transaksiDetailModal"
                                data-peminjam="{{ $t->user->name ?? $t->nama_peminjam }}"
                                data-email="{{ $t->user->email ?? '-' }}"
                                data-userid="{{ $t->user_id ?? '-' }}"
                                data-role="{{ $t->user->role ?? '-' }}"
                                data-kendaraan="{{ $t->kendaraan->nama ?? '-' }}"
                                data-nopol="{{ $t->kendaraan->nomor_polisi ?? '-' }}"
                                data-harga="{{ number_format($t->kendaraan->harga ?? 0) }}"
                                data-lama="{{ $t->lama_hari }}"
                                data-total="{{ number_format($t->total_harga) }}"
                                data-tanggal="{{ $t->tanggal ? \Illuminate\Support\Carbon::parse($t->tanggal)->format('d-m-Y') : $t->created_at->format('d-m-Y') }}"
                                data-dibuat="{{ $t->created_at->format('d-m-Y H:i') }}"
                            >
                                <i class="bi bi-eye"></i>
                            </button>
                            <a href="{{ route('admin.transaksi.edit', $t->id) }}" class="btn btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.transaksi.destroy', $t->id) }}" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $transaksis->links() }}
</div>

<div class="modal fade" id="transaksiDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6"><strong>Peminjam:</strong> <span id="dt-peminjam"></span></div>
                    <div class="col-md-6"><strong>Email:</strong> <span id="dt-email"></span></div>
                    <div class="col-md-6"><strong>User ID:</strong> <span id="dt-userid"></span></div>
                    <div class="col-md-6"><strong>Role:</strong> <span id="dt-role"></span></div>
                    <div class="col-md-6"><strong>Kendaraan:</strong> <span id="dt-kendaraan"></span></div>
                    <div class="col-md-6"><strong>No Polisi:</strong> <span id="dt-nopol"></span></div>
                    <div class="col-md-6"><strong>Harga / Hari:</strong> Rp <span id="dt-harga"></span></div>
                    <div class="col-md-6"><strong>Lama (hari):</strong> <span id="dt-lama"></span></div>
                    <div class="col-md-6"><strong>Total:</strong> Rp <span id="dt-total"></span></div>
                    <div class="col-md-6"><strong>Tanggal Sewa:</strong> <span id="dt-tanggal"></span></div>
                    <div class="col-md-6"><strong>Dibuat:</strong> <span id="dt-dibuat"></span></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('transaksiDetailModal');
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const map = {
                peminjam: 'dt-peminjam',
                email: 'dt-email',
                userid: 'dt-userid',
                role: 'dt-role',
                kendaraan: 'dt-kendaraan',
                nopol: 'dt-nopol',
                harga: 'dt-harga',
                lama: 'dt-lama',
                total: 'dt-total',
                tanggal: 'dt-tanggal',
                dibuat: 'dt-dibuat',
            };
            Object.keys(map).forEach(key => {
                const value = button.getAttribute(`data-${key}`) || '-';
                document.getElementById(map[key]).textContent = value;
            });
        });
    });
</script>
@endpush
@endsection
