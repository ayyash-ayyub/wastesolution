@php
    $isEdit = isset($editItem);
    $action = $isEdit ? route('master-lokasi.update', $editItem) : route('master-lokasi.store');
    $namaValue = old('nama_site', $isEdit ? $editItem->nama_site : '');
    $kordinatValue = old('kordinat', $isEdit ? ($editItem->kordinat ?? '') : '');
@endphp

<div class="card">
    <div class="card-header {{ $isEdit ? 'bg-warning' : '' }}">
        <h3 class="card-title mb-0">{{ $isEdit ? 'Edit Master Lokasi' : 'Tambah Master Lokasi' }}</h3>
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
                <label>Nama Site</label>
                <input type="text" name="nama_site" class="form-control" value="{{ $namaValue }}" placeholder="Masukkan nama site" required>
            </div>

            <div class="form-group">
                <label>Kordinat</label>
                <input type="text" name="kordinat" class="form-control" value="{{ $kordinatValue }}" placeholder="Contoh: -6.2,106.8">
            </div>
        </div>
        <div class="card-footer text-right">
            @if ($isEdit)
                <a href="{{ route('master-lokasi.index') }}" class="btn btn-secondary">Batal</a>
            @endif
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

