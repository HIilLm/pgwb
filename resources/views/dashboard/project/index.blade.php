@extends('layouts.dashboard')
@section('title', 'Project ')
@section('content-title', 'Project ADIK ADIK')
@section('css')
    <style>
        .gambar {
            width: 200px;
            height: 100px;
            background-position: center center;
            background-repeat: no-repeat;
            border-radius: 50%;
            background-size: 100%;
        }

        a {
            color: #858796;
        }

        a:hover {
            color: #858796;
            text-decoration: none;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    {{-- <a href="{{ route('project.create') }}" class="btn btn-primary">Create</a> --}}
                    Data Siswa
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($siswa as $s)
                                    <tr>
                                        <td>{{ $s->nisn }}</td>
                                        <td>{{ $s->name }}</td>
                                        <td>
                                            <a onclick="show({{ $s->id }})" class="tn btn-primary btn-circle btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('buat.page',$s->id) }}"
                                                class="btn btn-warning btn-circle btn-sm">
                                                <i class="fas fa-plus"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    Project Siswa
                </div>
                <div class="card-body" id="project">
                    <div class="text-center"> Pilih Siswa terlebih Dahulu</div>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    {{-- <script src="https://unpkg.com/@popperjs/core@2"></script> --}}
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

        function show(id) {
            $.get('/dashboard/project/' + id, function(data) {
                $('#project').html(data);
            })
        }
    </script>
@endsection
