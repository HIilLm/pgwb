@extends('layouts.dashboard')
@section('title','Edit Contact')
@section('content-title', 'Edit Contact')
@section('content')
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <form action="{{ route('contact.update', ['contact' => $kontak->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col">
                            <div class="mb-3">
                                <label for="id_siswa" class="form-label">Kontak Siswa</label>
                                <select name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror"
                                    id="id_siswa" aria-label="Default select example">
                                    <option selected value="">Kontak Siswa</option>
                                    @foreach ($siswa as $s)
                                        <option value="{{ $s->id }}" {{ $s->id == $kontak->id_siswa ? 'selected' : '' }}>{{ $s->name }}</option>
                                    @endforeach
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
                                <label for="id_jenis" class="form-label">Jenis Kontak</label>
                                <select name="id_jenis" class="form-control @error('id_jenis') is-invalid @enderror"
                                    id="id_jenis" aria-label="Default select example">
                                    <option selected value="">Kontak Berjenis</option>
                                    @foreach ($jenis as $s)
                                        <option value="{{ $s->id }}" {{ $s->id == $kontak->id_jenis ? 'selected' : '' }}>{{ $s->jenis }}</option>
                                    @endforeach
                                </select>
                                @error('id_jenis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label is-invalid">Deskripsi</label>
                                <input type="text" name="deskripsi"
                                    class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                    aria-describedby="our-people-deskripsi" value="{{ $kontak->deskripsi }}">
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a class="btn btn-danger mt-2" href="{{ url()->previous() }}">Back</a>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
