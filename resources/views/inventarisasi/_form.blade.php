@php
    $isEdit = isset($editItem);
    $action = $isEdit ? route('master-inventarisasi.update', $editItem) : route('master-inventarisasi.store');
    $kategoriValue = old('kategori', $isEdit ? $editItem->kategori : '');
    $subValue = old('sub_kategori', $isEdit ? ($editItem->sub_kategori ?? '') : '');
    $ujiValue = old('uji_kualitas', $isEdit ? $editItem->uji_kualitas : 'Air');
    $tonaseValue = old('tonase', $isEdit ? $editItem->tonase : '0.00');
@endphp

<div class="card">
    <div class="card-header {{ $isEdit ? 'bg-warning' : '' }}">
        <h3 class="card-title mb-0">{{ $isEdit ? 'Edit Master Inventarisasi' : 'Tambah Master Inventarisasi' }}</h3>
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
                <label>Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="" disabled {{ $kategoriValue === '' ? 'selected' : '' }}>-- Pilih Kategori --</option>
                    <option value="B3" {{ $kategoriValue === 'B3' ? 'selected' : '' }}>B3</option>
                    <option value="Non B3" {{ $kategoriValue === 'Non B3' ? 'selected' : '' }}>Non B3</option>
                </select>
            </div>

            <div class="form-group" id="subkategori_group">
                <label>Sub Kategori</label>
                <select name="sub_kategori" id="sub_kategori" class="form-control">
                    <option value="">-- Pilih Sub Kategori --</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tonase (otomatis)</label>
                <input type="text" name="tonase" id="tonase" class="form-control" value="{{ $tonaseValue }}" readonly>
            </div>

            <div class="form-group">
                <label>Uji Kualitas Lingkungan</label>
                <select name="uji_kualitas" class="form-control" required>
                    @foreach($ujiOptions as $opt)
                        <option value="{{ $opt }}" {{ $ujiValue === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-footer text-right">
            @if ($isEdit)
                <a href="{{ route('master-inventarisasi.index') }}" class="btn btn-secondary">Batal</a>
            @endif
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>

<script>
    const invSubMap = @json($subKategoriMap);
    const invTonaseMap = @json($tonaseMap);

    function invFillSubKategori(kategori, preselect = '') {
        const select = document.getElementById('sub_kategori');
        const group = document.getElementById('subkategori_group');
        select.innerHTML = '';
        const list = invSubMap[kategori] || [];
        if (!list.length) {
            group.style.display = 'none';
            document.getElementById('tonase').value = (invTonaseMap['__NULL__'] || 0).toFixed ? (invTonaseMap['__NULL__'] || 0).toFixed(2) : (invTonaseMap['__NULL__'] || 0);
            return;
        }
        group.style.display = '';
        const ph = document.createElement('option');
        ph.value = '';
        ph.textContent = '-- Pilih Sub Kategori --';
        select.appendChild(ph);
        list.forEach(s => {
            const opt = document.createElement('option');
            opt.value = s;
            opt.textContent = s;
            if (preselect && preselect === s) opt.selected = true;
            select.appendChild(opt);
        });
        // When filled, if there is a preselect, update tonase
        if (preselect) invUpdateTonase(preselect);
    }

    function invUpdateTonase(sub) {
        const val = invTonaseMap[sub || '__NULL__'] || 0;
        const field = document.getElementById('tonase');
        field.value = Number(val).toFixed ? Number(val).toFixed(2) : val;
    }

    document.addEventListener('DOMContentLoaded', function(){
        const kategoriSel = document.getElementById('kategori');
        const preselect = @json($subValue);
        if (kategoriSel) {
            kategoriSel.addEventListener('change', function(){
                invFillSubKategori(this.value);
            });
            document.getElementById('sub_kategori').addEventListener('change', function(){
                invUpdateTonase(this.value);
            });
            if (kategoriSel.value) {
                invFillSubKategori(kategoriSel.value, preselect);
            } else {
                document.getElementById('subkategori_group').style.display = 'none';
                invUpdateTonase('');
            }
        }
    });
</script>
