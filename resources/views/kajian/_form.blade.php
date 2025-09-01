@php
    $isEdit = isset($editItem);
    $action = $isEdit ? route('master-kajian.update', $editItem) : route('master-kajian.store');
    $judul = old('judul', $isEdit ? $editItem->judul : '');
    $penulis = old('penulis', $isEdit ? $editItem->penulis : '');
    $resume = old('resume', $isEdit ? $editItem->resume : '');
    $link = old('link_dokumen', $isEdit ? $editItem->link_dokumen : '');
@endphp

<div class="card">
    <div class="card-header {{ $isEdit ? 'bg-warning' : '' }}">
        <h3 class="card-title mb-0">{{ $isEdit ? 'Edit Kajian' : 'Tambah Kajian' }}</h3>
    </div>
    <form action="{{ $action }}" method="POST">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 pl-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $judul }}" required>
            </div>

            <div class="form-group">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ $penulis }}" required>
            </div>

            <div class="form-group">
                <label>Resume</label>
                <textarea name="resume" rows="4" class="form-control" required>{{ $resume }}</textarea>
            </div>

            <div class="form-group">
                <label>Link Dokumen</label>
                <input type="text" name="link_dokumen" class="form-control" value="{{ $link }}" required>
            </div>
        </div>
        <div class="card-footer text-right">
            @if ($isEdit)
                <a href="{{ route('master-kajian.index') }}" class="btn btn-secondary">Batal</a>
            @endif
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
