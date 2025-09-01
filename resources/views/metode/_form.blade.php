@php
    $isEdit = isset($editItem);
    $action = $isEdit ? route('master-metode.update', $editItem) : route('master-metode.store');
    $kategoriValue = old('kategori_sampah', $isEdit ? $editItem->kategori_sampah : '');
    $subValue = old('nama_metode', $isEdit ? ($editItem->nama_metode ?? '') : '');
@endphp

<div class="card">
    <div class="card-header {{ $isEdit ? 'bg-warning' : '' }}">
        <h3 class="card-title mb-0">{{ $isEdit ? 'Edit Master Metode' : 'Tambah Master Metode' }}</h3>
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
                <label>Kategori Sampah</label>
                <select name="kategori_sampah" id="kategori_sampah" class="form-control" required>
                    <option value="" disabled {{ $kategoriValue === '' ? 'selected' : '' }}>-- Pilih Kategori --</option>
                    @foreach($kategori as $opt)
                        <option value="{{ $opt }}" {{ $kategoriValue === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" id="metode_group">
                <label>Nama Metode</label>
                <select name="nama_metode" id="nama_metode" class="form-control">
                    <option value="">-- Pilih Sub Kategori --</option>
                </select>
            </div>
        </div>
        <div class="card-footer text-right">
            @if ($isEdit)
                <a href="{{ route('master-metode.index') }}" class="btn btn-secondary">Batal</a>
            @endif
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>

<script>
    const subOptions = @json($methodOptions);

    function fillSubKategori(kategori, preselect = '') {
        const select = document.getElementById('nama_metode');
        const group = document.getElementById('metode_group');
        select.innerHTML = '';
        const subs = subOptions[kategori] || [];
        if (!subs.length) {
            group.style.display = 'none';
            return;
        }
        group.style.display = '';
        const ph = document.createElement('option');
        ph.value = '';
        ph.textContent = '-- Pilih Metode --';
        select.appendChild(ph);
        subs.forEach(s => {
            const opt = document.createElement('option');
            opt.value = s;
            opt.textContent = s;
            if (preselect && preselect === s) opt.selected = true;
            select.appendChild(opt);
        });
    }

    document.addEventListener('DOMContentLoaded', function(){
        const kategoriSel = document.getElementById('kategori_sampah');
        const preselect = @json($subValue);
        if (kategoriSel) {
            kategoriSel.addEventListener('change', function(){
                fillSubKategori(this.value);
            });
            if (kategoriSel.value) {
                fillSubKategori(kategoriSel.value, preselect);
            } else {
                document.getElementById('metode_group').style.display = 'none';
            }
        }
    });
</script>
