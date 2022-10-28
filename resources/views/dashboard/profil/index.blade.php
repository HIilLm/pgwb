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
Halo Admin
@endsection
