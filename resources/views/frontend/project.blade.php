@extends('layouts.profil')
@section('css')
<style>
    a {
            color: black;
            text-decoration: none
        }

        a:hover{
            color:#858796;
            text-decoration: underline;
        }
</style>
@endsection
@section('content')
    {{ $projek->nama_proyek }}
@endsection
