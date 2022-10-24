@extends('layouts.dashboard')
@section('title', 'Siswa')
@section('content-title', 'Siswa')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Nisn</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                            <th>Name</th>
                            <th>Nisn</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($siswa as $s)
                            <tr>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->nisn }}</td>
                                <td>{{ $s->email }}</td>
                                <td>{{ $s->jenis_kelamin }}</td>
                                <td>{{ $s->alamat }}</td>
                                <td>
                                    <a href="{{ route('siswa.edit', ['siswa' => $s->id]) }}" class="btn btn-warning btn-circle btn-sm">
                                        {{-- <i class="fas fa-exclamation-triangle"></i> --}}
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('siswa.show', ['siswa' => $s->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                        {{-- <i class="fas fa-exclamation-triangle"></i> --}}
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form id="form-delete{{ $s->id }}"
                                        action="{{ route('siswa.destroy', ['siswa' => $s->id]) }}"
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
