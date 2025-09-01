@php
    $isEdit = isset($editItem);
    $action = $isEdit ? route('master-limbah.update', $editItem) : route('master-limbah.store');
    $method = $isEdit ? 'PUT' : 'POST';
    $kategoriValue = old('nama_kategori', $isEdit ? $editItem->nama_kategori : '');
    $subValue = old('nama_subkategori', $isEdit ? ($editItem->nama_subkategori ?? '') : '');
@endphp

<div class="card">
    <div class="card-header {{ $isEdit ? 'bg-warning' : '' }}">
        <h3 class="card-title mb-0">{{ $isEdit ? 'Edit Master Limbah' : 'Tambah Master Limbah' }}</h3>
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
                <label>Nama Kategori</label>
                <select name="nama_kategori" id="nama_kategori" class="form-control" required>
                    <option value="" disabled {{ $kategoriValue === '' ? 'selected' : '' }}>-- Pilih Kategori --</option>
                    <option value="Non B3" {{ $kategoriValue === 'Non B3' ? 'selected' : '' }}>Non B3</option>
                    <option value="B3" {{ $kategoriValue === 'B3' ? 'selected' : '' }}>B3</option>
                    <option value="Ipal" {{ $kategoriValue === 'Ipal' ? 'selected' : '' }}>Ipal</option>
                </select>
            </div>
            <div class="form-group" id="subkategori_group">
                <label>Nama Sub Kategori</label>
                <input type="text" name="nama_subkategori" id="nama_subkategori" class="form-control" value="{{ $subValue }}" placeholder="Masukkan sub kategori">
            </div>
        </div>
        <div class="card-footer text-right">
            @if ($isEdit)
                <a href="{{ route('master-limbah.index') }}" class="btn btn-secondary">Batal</a>
            @endif
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<script>
    function toggleSubkategori() {
        var kategori = document.getElementById('nama_kategori').value;
        var group = document.getElementById('subkategori_group');
        if (kategori === 'Ipal') {
            group.style.display = 'none';
            document.getElementById('nama_subkategori').value = '';
        } else {
            group.style.display = '';
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        var select = document.getElementById('nama_kategori');
        if (select) {
            select.addEventListener('change', toggleSubkategori);
            toggleSubkategori();
        }
    });
</script>

