@extends('layouts.dashboard')
@section('title', 'Edit Dashboard')
@section('content-title', 'Edit Dashboard')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="{{ route('dashboard.update', ['dashboard' => $siswa->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label is-invalid">Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        aria-describedby="our-people-name" value="{{ $siswa->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="about" class="form-label">about</label>
                                    <input type="text" name="about"
                                        class="form-control @error('about') is-invalid @enderror" id="about"
                                        value="{{ $siswa->about }}">
                                    @error('about')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="mb-3">
                            <label for="filePhoto" class="form-label">Opportunity Image
                            </label>
                            <input class="form-control @error('profil') is-invalid @enderror" name="profil" type="file"
                                id="filePhoto" accept="image/*" value="{{ old('profil') }}">
                            <div class="col-md-3">
                                <img id="output" class="mt-3" style="max-height: 200px; max-width: 300px;"
                                    src="{{ asset('storage/' . $siswa->profil) }}">
                            </div>

                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                </div>
                    </form>
                    <div class="col">
                        <form id="form-delete{{ $siswa->id }}" action="/dashboard/image/{{ $siswa->id }}"
                            method="post">
                            @csrf
                            @if ($siswa->profil != null)
                                <button type="submit" class="btn btn-danger mt-2">Hapus Gambar</button>
                            @else
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        $(function() {
            $("#filePhoto").change(function(event) {
                var x = URL.createObjectURL(event.target.files[0]);
                $("#output").attr("src", x);
                console.log(event);
            });
        });

        $(function() {
            $("#photo").change(function(event) {
                var x = URL.createObjectURL(event.target.files[0]);
                $("#out").attr("src", x);
                console.log(event);
            });
        });
    </script>
@endsection
