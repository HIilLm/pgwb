@extends('layouts.dashboard')
@section('title', 'Create Siswa')
@section('content-title', 'Create New Siswa')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="filePhoto" class="form-label">Siswa Image
                            </label>
                            <input class="form-control @error('profil') is-invalid @enderror" name="profil" type="file"
                                id="filePhoto" accept="image/*" value="{{ old('profil') }}">
                            <div class="col-md-3">
                                <img id="output" class="mt-3" style="max-height: 200px; max-width: 300px;">
                            </div>

                            @error('profil')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label is-invalid">Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        aria-describedby="our-people-name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nisn" class="form-label">Nisn</label>
                                    <input type="number" min="1" name="nisn"
                                        class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                                        value="{{ old('nisn') }}" >
                                    @error('nisn')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="email" class="form-label is-invalid">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label is-invalid">Alamat</label>
                                    <input type="text" name="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror" id="alamat" alamat"
                                        value="{{ old('alamat') }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                    @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="about" class="form-label is-invalid">About</label>
                            <textarea name="about" id="about" cols="30" class="form-control @error('about') is-invalid @enderror"
                                rows="10">{{ old('about') }}</textarea>
                            @error('about')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <a class="btn btn-danger mt-2" href="/dashboard/siswa">Back</a>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}

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
