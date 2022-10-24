@extends('layouts.dashboard')
@section('title', 'Jenis Kontak')
@section('content-title', 'Jenis Kontak')
@section('css')
<style>
input.ini{
    color: transparent;
}
input::selection.ini {   background: transparent;  } input::-moz-selection.ini {   background: transparent;  }
</style>
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form action="{{ route('jeniskontak.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-2">
                        <input class="form-control @error('jenis') is-invalid @enderror" name="jenis" type="text"
                            id="jenis">
                        @error('jenis')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Jenis Kontak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Jenis Kontak</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($jeniskontak as $s)
                            <tr>
                                <td>{{ $s->jenis }}</td>
                                <td class="d-flex">
                                    <div class="mr-3">
                                        <form id="form-update" div
                                            action="{{ route('jeniskontak.update', ['jeniskontak' => $s->id]) }}" method="post">
                                            @method('put')
                                            @csrf
                                            <input class="form-control ini @error('jenis') is-invalid @enderror mr-3"
                                                name="jenis" value="{{ $s->jenis }}" type="text" id="jenis" style="margin-right: 30px">
                                            @error('jenis')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </form>
                                    </div>
                                    <a class="btn btn-warning btn-circle btn-sm" onclick="whatupdate()"><i class="fas fa-edit"></i></a>
                                    <form id="form-delete{{ $s->id }}"
                                        action="{{ route('jeniskontak.destroy', ['jeniskontak' => $s->id]) }}" method="post"
                                        style="display: none">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    <a class="btn btn-danger btn-circle btn-sm ms-5" href="#"
                                        onclick="what({{ $s->id }})"><i class="fas fa-skull-crossbones"></i></a>
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
        function whatupdate() {
            Swal.fire({
                title: 'confirm update?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-update').submit();
                    Swal.fire(
                        'updated!',
                        'Your data has been updated.',
                        'success'
                    )
                }
            })
        }
    </script>
@endsection
