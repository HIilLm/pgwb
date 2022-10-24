@extends('layouts.dashboard')
@section('title','Contact')
@section('content-title', 'Contact')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('contact.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kontak Siswa</th>
                        <th>Jenis Kontak</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kontak Siswa</th>
                        <th>Jenis Kontak</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($siswa as $s)
                        <tr>
                            <td>{{ $s->siswa->name }}</td>
                            <td>{{ $s->jenis->jenis }}</td>
                            <td>{{ substr(strip_tags($s->deskripsi), 0, 40) }}....</td>
                            <td>
                                <a href="{{ route('contact.edit', ['contact' => $s->id]) }}" class="btn btn-warning btn-circle btn-sm">
                                    {{-- <i class="fas fa-exclamation-triangle"></i> --}}
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form id="form-delete{{ $s->id }}"
                                    action="{{ route('contact.destroy', ['contact' => $s->id]) }}"
                                    method="post" style="display: none">
                                    @method('delete')
                                    @csrf
                                </form>
                                <a href="#" onclick="what({{ $s->id }})" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-skull-crossbones"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> --}}
<script>
function what(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#form-delete' + id).submit();
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
}
</script>
@endsection
