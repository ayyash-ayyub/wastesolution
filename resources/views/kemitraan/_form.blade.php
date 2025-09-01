@php
    $isEdit = isset($editItem);
    $action = $isEdit ? route('master-kemitraan.update', $editItem) : route('master-kemitraan.store');
    $namaValue = old('nama_mitra', $isEdit ? $editItem->nama_mitra : '');
    $jenisValue = old('jenis', $isEdit ? $editItem->jenis : '');
    $kegiatanValue = old('nama_kegiatan', $isEdit ? $editItem->nama_kegiatan : '');
    $sasaranValue = old('sasaran', $isEdit ? $editItem->sasaran : '');
    $penerimaValue = old('jumlah_penerima_manfaat', $isEdit ? $editItem->jumlah_penerima_manfaat : '');
    $jenisOptions = $jenisOptions ?? ['Komunitas','Perusahaan','Pemerintah','Akademisi','Lainnya'];
@endphp

<div class="card">
    <div class="card-header {{ $isEdit ? 'bg-warning' : '' }}">
        <h3 class="card-title mb-0">{{ $isEdit ? 'Edit Kemitraan' : 'Tambah Kemitraan' }}</h3>
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
                <label>Nama Mitra</label>
                <input type="text" name="nama_mitra" class="form-control" value="{{ $namaValue }}" required>
            </div>

            <div class="form-group">
                <label>Jenis</label>
                <select name="jenis" class="form-control" required>
                    <option value="" disabled {{ $jenisValue === '' ? 'selected' : '' }}>-- Pilih Jenis --</option>
                    @foreach($jenisOptions as $opt)
                        <option value="{{ $opt }}" {{ $jenisValue === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Nama Kegiatan/Program</label>
                <input type="text" name="nama_kegiatan" class="form-control" value="{{ $kegiatanValue }}" required>
            </div>

            <div class="form-group">
                <label>Sasaran</label>
                <input type="text" name="sasaran" class="form-control" value="{{ $sasaranValue }}" required>
            </div>

            <div class="form-group">
                <label>Jumlah Penerima Manfaat</label>
                <input type="number" min="0" step="1" name="jumlah_penerima_manfaat" class="form-control" value="{{ $penerimaValue }}" required>
            </div>
        </div>
        <div class="card-footer text-right">
            @if ($isEdit)
                <a href="{{ route('master-kemitraan.index') }}" class="btn btn-secondary">Batal</a>
            @endif
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
