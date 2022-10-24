@extends('layouts.profil')
@section('content')
    <!--profil-->

    <section class="jumbotron mt-5" style="text-align: center">
        {{-- @if (Auth::user()->profil != null)
            <img src="{{ asset('storage/' . Auth::user()->profil) }}" alt="foto profil" width="200"
                class="rounded-circle mt-4" />
        @else
            <img src="{{ asset('/dashboard/img/undraw_profile.svg') }}" alt="foto profil" width="200"
                class="rounded-circle mt-4" />
        @endif
        <h1 class="nama">{{ Auth::user()->name }}</h1>
        <p class="lead">{{ Auth::user()->status }}</p> --}}

    </section>

    <!--akhir profil-->
@endsection
