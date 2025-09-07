@extends('layouts.admin')

@section('title', 'Data Pelaporan')
@section('page_title', 'Data Pelaporan')

@section('content')
<div class="row">
    <div class="col-md-5">
        @include('pelaporan._form')
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Data Pelaporan</h3>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('master-pelaporan.index') }}" class="mb-3">
                    <div class="form-row">
                        <div class="col-md-5 mb-2">
                            <input type="text" id="filter_range" class="form-control" placeholder="Filter rentang tanggal" autocomplete="off">
                            <input type="hidden" name="filter_mulai" id="filter_mulai" value="{{ $filterMulai ?? '' }}">
                            <input type="hidden" name="filter_selesai" id="filter_selesai" value="{{ $filterSelesai ?? '' }}">
                        </div>
                        <div class="col-md-3 mb-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('master-pelaporan.index') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th style="width: 60px">ID</th>
                            <th>Nama Laporan</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th>Lampiran</th>
                            <th style="width: 140px" class="text-right">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_laporan }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->periode_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($item->periode_selesai)->format('d M Y') }}</td>
                                <td>
                                    <span class="badge {{ $item->status === 'sudah dilaporkan' ? 'badge-success' : 'badge-secondary' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if(!empty($item->lampiran_dokumen))
                                        <a href="{{ $item->lampiran_dokumen }}" target="_blank" rel="noopener">Lihat</a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('master-pelaporan.edit', $item) }}" class="text-warning mr-2" title="Edit Data"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('master-pelaporan.destroy', $item) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0 m-0" title="Hapus Data"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center p-3">Belum ada data</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <script>
                document.addEventListener('DOMContentLoaded', function(){
                    const rangeInput = document.getElementById('filter_range');
                    const mulai = document.getElementById('filter_mulai');
                    const selesai = document.getElementById('filter_selesai');
                    const start = mulai.value ? moment(mulai.value, 'YYYY-MM-DD') : moment().startOf('month');
                    const end = selesai.value ? moment(selesai.value, 'YYYY-MM-DD') : moment().endOf('month');

                    function cb(s, e) {
                        rangeInput.value = s.format('YYYY-MM-DD') + ' - ' + e.format('YYYY-MM-DD');
                        mulai.value = s.format('YYYY-MM-DD');
                        selesai.value = e.format('YYYY-MM-DD');
                    }

                    if (typeof $(rangeInput).daterangepicker === 'function') {
                        $(rangeInput).daterangepicker({
                            startDate: start,
                            endDate: end,
                            autoUpdateInput: false,
                            locale: { format: 'YYYY-MM-DD' }
                        }, cb);

                        if (mulai.value && selesai.value) {
                            rangeInput.value = start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD');
                        }
                    }
                });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
