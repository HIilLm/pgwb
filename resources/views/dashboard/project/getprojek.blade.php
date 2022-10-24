@if ($data->isEmpty())
    <h6 class="text-center"><B>Siswa belum punya project</B> </h6>
    {{-- <a class="link" href="{{ route('project.create') }}">Ayo buat</a> --}}
@else
    @foreach ($data as $p)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              {{ $p->nama_proyek }} | {{ $p->tanggal }}
            </div>
            <div class="card-body">
                {{-- <div class="gambar" style="background-image: url('{{ asset('storage/' . $p->foto) }}')"> --}}
                <img src="{{ asset('storage/' . $p->foto) }}" width="200px" height="100px" alt="{{ $p->foto }}">
                <div>{!! $p->deskripsi !!}</div>
            </div>
            <div class="card-footer">
                <a href="/dashboard/project/{{ $p->id }}/lihat" class="btn btn-primary btn-circle btn-sm">
                    <i class="fas fa-eye"></i></a>
                    <a href="{{ route('project.edit', ['project' => $p->id]) }}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                    <form id="form-delete{{ $p->id }}"
                        action="{{ route('project.destroy', ['project' => $p->id]) }}" method="post"
                        style="display: none">
                        @method('delete')
                        @csrf
                    </form>
                    <a href="#" onclick="what({{ $p->id }})" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-skull-crossbones"></i>
                    </a>
                </div>
            </div>
    @endforeach
@endif
