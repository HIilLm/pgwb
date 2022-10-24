@extends('layouts.dashboard')
@section('title', 'Detail ' . $siswa->name)
@section('content-title', 'Detail ' . $siswa->name)
@section('css')
    <style>
        .gambar {
            width: 200px;
            height: 200px;
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
        <div class="col-lg-4">
            <div class="card mb-4 shadow">
                <div class="card-body" style="text-align: center">
                    <div class="gambar m-auto" style="background-image: url('{{ asset('storage/' . $siswa->profil) }}')">
                    </div>
                    <h3>{{ $siswa->name }} | {{ $siswa->jenis_kelamin }} </h3>
                    <h4>{{ $siswa->nisn }} | {{ $siswa->alamat }} </h4>
                    <h6><a href="mailto:{{ $siswa->email }}">{{ $siswa->email }}</a></h6>
                    <a class="btn btn-warning mt-2" href="{{ route('siswa.edit', ['siswa' => $siswa->id]) }}"><i
                            class="fas fa-edit"></i></a>
                    {{-- <a class="btn btn-danger mt-2" href="{{ url()->previous() }}">Back</a> --}}
                </div> {{-- card body --}}
            </div> {{-- card --}}

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-user-plus"
                            style="margin-right:10px;"></i> Kontak Siswa</h6>
                </div> {{-- card header --}}
                <div class="card-body">
                    <?php $last = count($kontak) - 1;
                    ?>
                    @if ($kontak->first() != null)
                        @foreach ($kontak as $index => $s)
                            @if ($index == $last)
                                <a href="{{ $s->deskripsi }}">{{ $s->jenis->jenis }} </a>
                            @else
                                <a href="{{ $s->deskripsi }}">{{ $s->jenis->jenis }}, </a>
                            @endif
                        @endforeach
                    @else
                        Belum ada Kontak,<a href="{{ route('contact.create') }}">Silahkan buat Kontak</a>
                    @endif

                </div> {{-- card body --}}
            </div> {{-- card --}}
        </div> {{-- col-4 --}}
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-tie"
                            style="margin-right:10px;"></i>About {{ $siswa->name }}</h6>
                </div> {{-- card header --}}
                <div class="card-body">
                    <p>{{ $siswa->about }}</p>
                </div> {{-- card body --}}
            </div> {{-- card --}}

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-folder-open"
                            style="margin-right:10px;"></i>Project {{ $siswa->name }}</h6>
                </div> {{-- card header --}}
                <div class="card-body">
                    <?php $last = count($project) - 1;
                    ?>
                    @if ($project->first() != null)
                        @foreach ($project as $index => $s)
                            @if ($index == $last)
                                <a href="{{ route('project.show', ['project' => $s->id]) }}">{{ $s->nama_proyek }}</a>
                            @else
                                <a href="{{ route('project.show', ['project' => $s->id]) }}">{{ $s->nama_proyek }},</a>
                            @endif
                        @endforeach
                    @else
                    Belum ada Project,<a href="{{ route('buat.page',$siswa->id) }}">Silahkan buat Project</a>
                    @endif
                </div> {{-- card body --}}
            </div> {{-- card --}}
        </div> {{-- col-8 --}}
    </div> {{-- row --}}

@endsection
