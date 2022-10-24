@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content-title', 'Dashboard')
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

        .gambar2 {
            width: 200px;
            height: 200px;
            background-position: center center;
            background-repeat: no-repeat;
            border-radius: 50%;
            background-size: 100%;
            background-image: url('/dashboard/img/undraw_profile.svg')
        }
    </style>
@endsection
@section('content')
@if($siswa == null)
<a  class="btn btn-primary" href="/dashboard/siswa/create">Make Siswa</a>
@endif
@isset($siswa)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @if ($siswa->first() != null)
                            <div class="gambar" style="background-image: url('{{ asset('storage/' . $siswa->profil) }}')"></div>
                            {{-- <img class="img-profile rounded-circle"
            src="{{ asset('storage/' . $siswa->profil) }}"> --}}
                        @else
                            <div class="gambar2"></div>
                        @endif

                        <h1>{{ $siswa->name }}</h1>
                        <p>{{ $siswa->about }}</p>
                        <a href="{{ route('dashboard.edit', ['dashboard' => $siswa->id]) }}" class="btn btn-primary">Edit</a>

                    </div>
                </div>

            </div>
        @endisset

    @endsection
