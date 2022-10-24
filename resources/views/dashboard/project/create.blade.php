@extends('layouts.dashboard')
@section('title', 'Create New Project')
@section('content-title', 'Create New Project ' . $siswa->name )
@section('content')
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('make.page') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="filePhoto" class="form-label">Project Image
                                </label>
                                <input class="form-control @error('foto') is-invalid @enderror" name="foto" type="file"
                                    id="filePhoto" accept="image/*" value="{{ old('foto') }}">
                                <div class="col-md-3">
                                    <img id="output" class="mt-3" style="max-height: 200px; max-width: 300px;">
                                </div>
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="nama_proyek" class="form-label is-invalid">Nama Project</label>
                                        <input type="text" name="nama_proyek"
                                            class="form-control @error('nama_proyek') is-invalid @enderror" id="nama_proyek"
                                            aria-describedby="our-people-nama_proyek" value="{{ old('nama_proyek') }}">
                                        @error('nama_proyek')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col d-none">
                                    <div class="mb-3">
                                        <label for="id_siswa" class="form-label">Project Siswa</label>
                                        <select name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror" id="id_siswa"
                                            aria-label="Default select example" >
                                            {{-- @foreach ($siswa as $s) --}}
                                            <option value="{{ $siswa->id }}">{{ $siswa->name }}</option>
                                            {{-- @endforeach --}}
                                        </select>
                                        @error('id_siswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label is-invalid">Tanggal</label>
                                        <input type="date" name="tanggal"
                                            class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" tanggal"
                                            value="{{ old('tanggal') }}">
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label is-invalid">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" class="form-control @error('deskripsi') is-invalid @enderror"
                                    rows="10">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            <a class="btn btn-danger mt-2" href="{{ url()->previous() }}">Back</a>

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
        </script>
@endsection
