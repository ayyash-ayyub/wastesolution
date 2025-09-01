@php
    $isEdit = isset($editItem);
    $action = $isEdit ? route('data-limbah.update', $editItem) : route('data-limbah.store');
    $kategoriValue = old('kategori_limbah', $isEdit ? $editItem->kategori_limbah : '');
    $subValue = old('sub_kategori_limbah', $isEdit ? ($editItem->sub_kategori_limbah ?? '') : '');
    $namaValue = old('nama_limbah', $isEdit ? $editItem->nama_limbah : '');
    $metodeIdValue = old('master_metode_id', $isEdit ? ($editItem->master_metode_id ?? '') : '');
    $tonasiValue = old('tonasi', $isEdit ? $editItem->tonasi : '');
    $lokasiIdValue = old('master_lokasi_id', $isEdit ? ($editItem->master_lokasi_id ?? '') : '');
@endphp

<div class="card">
    <div class="card-header {{ $isEdit ? 'bg-warning' : '' }}">
        <h3 class="card-title mb-0">{{ $isEdit ? 'Edit Data Limbah' : 'Tambah Data Limbah' }}</h3>
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
                <label>Nama Limbah</label>
                <input type="text" name="nama_limbah" class="form-control" value="{{ $namaValue }}" placeholder="Masukkan nama limbah" required>
            </div>

            <div class="form-group">
                <label>Kategori Limbah</label>
                <select name="kategori_limbah" id="kategori_limbah" class="form-control" required>
                    <option value="" disabled {{ $kategoriValue === '' ? 'selected' : '' }}>-- Pilih Kategori --</option>
                    @foreach($kategoriOptions as $opt)
                        <option value="{{ $opt }}" {{ $kategoriValue === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" id="subkategori_group">
                <label>Sub Kategori Limbah</label>
                <select name="sub_kategori_limbah" id="sub_kategori_limbah" class="form-control">
                    <option value="">-- Pilih Sub Kategori --</option>
                </select>
            </div>

            <div class="form-group" id="metode_group">
                <label>Metode</label>
                <select name="master_metode_id" id="master_metode_id" class="form-control">
                    <option value="">-- Pilih Metode --</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tonasi</label>
                <input type="number" step="0.01" min="0" name="tonasi" class="form-control" value="{{ $tonasiValue }}" placeholder="0.00" required>
            </div>

            <div class="form-group">
                <label>Lokasi</label>
                <select name="master_lokasi_id" id="master_lokasi_id" class="form-control" required>
                    <option value="" disabled {{ $lokasiIdValue === '' ? 'selected' : '' }}>-- Pilih Lokasi --</option>
                    @foreach($lokasiOptions as $lok)
                        <option value="{{ $lok->id }}" {{ (string) $lokasiIdValue === (string) $lok->id ? 'selected' : '' }}>{{ $lok->nama_site }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-footer text-right">
            @if ($isEdit)
                <a href="{{ route('data-limbah.index') }}" class="btn btn-secondary">Batal</a>
            @endif
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<script>
    const subMap = @json($subKategoriMap);
    const metodeMap = @json($metodeMap);

    function fillSubKategori(kategori, preselect = '') {
        const select = document.getElementById('sub_kategori_limbah');
        const group = document.getElementById('subkategori_group');
        select.innerHTML = '';

        const subs = subMap[kategori] || [];
        if (!subs.length) {
            group.style.display = 'none';
            return;
        }
        group.style.display = '';

        const ph = document.createElement('option');
        ph.value = '';
        ph.textContent = '-- Pilih Sub Kategori --';
        select.appendChild(ph);

        subs.forEach(s => {
            const opt = document.createElement('option');
            opt.value = s;
            opt.textContent = s;
            if (preselect && preselect === s) opt.selected = true;
            select.appendChild(opt);
        });
    }

    function fillMetode(kategori, preselect = '') {
        const select = document.getElementById('master_metode_id');
        const group = document.getElementById('metode_group');
        select.innerHTML = '';
        const list = metodeMap[kategori] || [];
        if (!list.length) {
            group.style.display = 'none';
            return;
        }
        group.style.display = '';
        const ph = document.createElement('option');
        ph.value = '';
        ph.textContent = '-- Pilih Metode --';
        select.appendChild(ph);
        list.forEach(s => {
            const opt = document.createElement('option');
            opt.value = s.id;
            opt.textContent = s.nama;
            if (preselect && String(preselect) === String(s.id)) opt.selected = true;
            select.appendChild(opt);
        });
    }

    document.addEventListener('DOMContentLoaded', function(){
        const kategoriSel = document.getElementById('kategori_limbah');
        const preselect = @json($subValue);
        const preMetode = @json($metodeIdValue);
        if (kategoriSel) {
            kategoriSel.addEventListener('change', function(){
                fillSubKategori(this.value);
                fillMetode(this.value);
            });
            if (kategoriSel.value) {
                fillSubKategori(kategoriSel.value, preselect);
                fillMetode(kategoriSel.value, preMetode);
            } else {
                document.getElementById('subkategori_group').style.display = 'none';
                document.getElementById('metode_group').style.display = 'none';
            }
        }
    });
</script>
