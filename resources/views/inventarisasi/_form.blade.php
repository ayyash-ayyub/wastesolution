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
                <label>
                    Tonase (otomatis) [Ton]
                    <i class="fas fa-info-circle text-muted ml-1" data-toggle="tooltip" title="Nilai tonase ditampilkan dalam Ton (1 Ton = 1000 Kg) dan dihitung otomatis dari Data Limbah."></i>
                </label>
                <input type="text" name="tonase" id="tonase" class="form-control" value="{{ $tonaseValue }}" readonly>
                <small id="tonase_kg_hint" class="form-text text-muted">&nbsp;</small>
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
            // Convert Kg to Ton for display
            const kg = Number(invTonaseMap['__NULL__'] || 0);
            document.getElementById('tonase').value = (kg / 1000).toFixed(2);
            const hint = document.getElementById('tonase_kg_hint');
            if (hint) {
                hint.textContent = `≈ ${kg.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 2})} Kg`;
            }
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
        const valKg = invTonaseMap[sub || '__NULL__'] || 0;
        const field = document.getElementById('tonase');
        const ton = Number(valKg) / 1000;
        field.value = (isFinite(ton) ? ton : 0).toFixed(2);
        const hint = document.getElementById('tonase_kg_hint');
        if (hint) {
            const kg = Number(valKg);
            hint.textContent = `≈ ${kg.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 2})} Kg`;
        }
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

        // Initialize Bootstrap tooltip for info icon
        if (typeof $ !== 'undefined' && $.fn.tooltip) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
</script>
