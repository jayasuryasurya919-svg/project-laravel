{{-- ============================= --}}
{{-- JAVASCRIPT GLOBAL --}}
{{-- ============================= --}}

<!-- Bootstrap JS (WAJIB untuk modal, dropdown, sidebar) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- ============================= --}}
{{-- SWEETALERT (OPTIONAL tapi sangat direkomendasikan) --}}
{{-- ============================= --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: "{{ session('error') }}"
    });
</script>
@endif

{{-- ============================= --}}
{{-- KONFIRMASI HAPUS DATA --}}
{{-- ============================= --}}
<script>
    function confirmDelete(formId) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Data yang dihapus tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        })
    }
</script>

{{-- ============================= --}}
{{-- PREVIEW GAMBAR (FORM TAMBAH / EDIT) --}}
{{-- ============================= --}}
<script>
    function previewImage(input, previewId = 'preview-img') {
        const file = input.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(previewId).src = e.target.result;
            document.getElementById(previewId).classList.remove('d-none');
        }
        reader.readAsDataURL(file);
    }
</script>

{{-- ============================= --}}
{{-- DATATABLE SIMPLE (OPTIONAL) --}}
{{-- ============================= --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tables = document.querySelectorAll('.table-hover');
        tables.forEach(table => {
            table.classList.add('align-middle');
        });
    });
</script>

{{-- ============================= --}}
{{-- TOOLTIP BOOTSTRAP --}}
{{-- ============================= --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
