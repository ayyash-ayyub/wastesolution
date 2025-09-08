@extends('layouts.admin')

@section('title', 'Data Limbah')
@section('page_title', 'Data Limbah')

@section('content')
<div class="row">
    <div class="col-md-5">
        @include('datalimbah._form')
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Daftar Data Limbah</h3>
                <a href="{{ route('data-limbah.export') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-1"></i> Download file CSV
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th style="width: 60px">ID</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Sub Kategori</th>
                                <th>Metode</th>
                                <th>Tonasi(Kg)</th>
                                <th>Lokasi</th>
                                <th style="width: 140px" class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_limbah }}</td>
                                <td>{{ $item->kategori_limbah }}</td>
                                <td>{{ $item->sub_kategori_limbah ?? '-' }}</td>
                                <td>{{ $item->metode ?? '-' }}</td>
                                <td>{{ number_format((float) $item->tonasi, 2) }}</td>
                                <td>{{ optional($item->masterLokasi)->nama_site ?? '-' }}</td>
                                <td class="text-right">
                                    <a href="{{ route('data-limbah.edit', $item) }}" class="text-warning mr-2" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('data-limbah.destroy', $item) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0 m-0" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="text-center p-3">Belum ada data</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-3">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
