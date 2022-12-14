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
    <!--projrct-->

    <section id="projek">
        <div class="container pt-5">
            <div class="row text-center">
                <div class="col mb-3">
                    <h2 style="font-size: 35px; font-family: cambria">MY PROJECTS</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($projek as $item)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5><a href="{{ route('projek.detail',['id' => $item->id]) }}">{{ $item->nama_proyek }}</a></h5>
                            <p class="card-text">{{ substr(strip_tags($item->deskripsi), 0, 40) }}....</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,32L26.7,48C53.3,64,107,96,160,128C213.3,160,267,192,320,186.7C373.3,181,427,139,480,106.7C533.3,75,587,53,640,64C693.3,75,747,117,800,117.3C853.3,117,907,75,960,80C1013.3,85,1067,139,1120,176C1173.3,213,1227,235,1280,229.3C1333.3,224,1387,192,1413,176L1440,160L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z">
            </path>
        </svg>
    </section>

    <!--projrct-->
@endsection
