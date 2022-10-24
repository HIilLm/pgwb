@extends('layouts.dashboard')
@section('title', $project->nama_proyek)
@section('content-title', $project->nama_proyek)
@section('css')
    <style>
        .gambar {
            width: 300px;
            height: 300px;
            background-position: center center;
            background-repeat: no-repeat;
            /* border-radius: 50%; */
            background-size: 100%;

        }

        a {
            color: #858796;
        }

        a:hover{
            color:#858796;
            text-decoration: none;
        }
    </style>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="gambar" style="background-image: url('{{ asset('storage/' . $project->foto) }}')"></div>
                    <h1>{{ $project->nama_proyek }} | <a href="{{ route('siswa.show', ['siswa' => $project->id_siswa]) }}">{{ $project->siswa->name }}</a>  </h1>
                    <h2>{{ $project->tanggal }}</h2>
                    <p>{{ $project->deskripsi }}</p>
                    <a class="btn btn-danger" href="{{ url()->previous() }}">Back</a>

                    <a href="{{ route('project.edit', ['project' => $project->id]) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>

        </div>
@endsection
