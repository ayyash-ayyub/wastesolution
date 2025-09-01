@php
    $isEdit = isset($editItem);
    $action = $isEdit ? route('master-pelaporan.update', $editItem) : route('master-pelaporan.store');
    $namaValue = old('nama_laporan', $isEdit ? $editItem->nama_laporan : '');
    $mulaiValue = old('periode_mulai', $isEdit ? $editItem->periode_mulai : '');
    $selesaiValue = old('periode_selesai', $isEdit ? $editItem->periode_selesai : '');
    $statusValue = old('status', $isEdit ? $editItem->status : 'belum dilaporkan');
    $ketValue = old('keterangan', $isEdit ? ($editItem->keterangan ?? '') : '');
    $statuses = $statuses ?? ['sudah dilaporkan','belum dilaporkan'];
@endphp

<div class="card">
    <div class="card-header {{ $isEdit ? 'bg-warning' : '' }}">
        <h3 class="card-title mb-0">{{ $isEdit ? 'Edit Master Pelaporan' : 'Tambah Master Pelaporan' }}</h3>
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
                <label>Nama Laporan</label>
                <input type="text" name="nama_laporan" class="form-control" value="{{ $namaValue }}" placeholder="Masukkan nama laporan" required>
            </div>

            <div class="form-group">
                <label>Periode Pelaporan</label>
                <input type="text" id="periode_range" class="form-control" placeholder="Pilih rentang tanggal" autocomplete="off">
                <input type="hidden" name="periode_mulai" id="periode_mulai" value="{{ $mulaiValue }}">
                <input type="hidden" name="periode_selesai" id="periode_selesai" value="{{ $selesaiValue }}">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    @foreach($statuses as $st)
                        <option value="{{ $st }}" {{ $statusValue === $st ? 'selected' : '' }}>{{ ucfirst($st) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan tambahan (opsional)">{{ $ketValue }}</textarea>
            </div>
        </div>
        <div class="card-footer text-right">
            @if ($isEdit)
                <a href="{{ route('master-pelaporan.index') }}" class="btn btn-secondary">Batal</a>
            @endif
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<!-- Daterangepicker (CDN) -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
    const rangeInput = document.getElementById('periode_range');
    const mulai = document.getElementById('periode_mulai');
    const selesai = document.getElementById('periode_selesai');
    const start = mulai.value ? moment(mulai.value, 'YYYY-MM-DD') : moment().startOf('month');
    const end = selesai.value ? moment(selesai.value, 'YYYY-MM-DD') : moment().endOf('month');

    function cb(s, e) {
        rangeInput.value = s.format('YYYY-MM-DD') + ' - ' + e.format('YYYY-MM-DD');
        mulai.value = s.format('YYYY-MM-DD');
        selesai.value = e.format('YYYY-MM-DD');
    }

    $(rangeInput).daterangepicker({
        startDate: start,
        endDate: end,
        locale: { format: 'YYYY-MM-DD' }
    }, cb);

    // Initialize display
    cb(start, end);
});
</script>

