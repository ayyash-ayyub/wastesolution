@extends('layouts.admin')

@section('title', 'Master Inventarisasi')
@section('page_title', 'Master Inventarisasi')

@section('content')
<div class="row">
    <div class="col-md-5">
        @include('inventarisasi._form')
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Data Master Inventarisasi</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th style="width: 60px">ID</th>
                            <th>Kategori</th>
                            <th>Sub Kategori</th>
                            <th>Tonase (Kg)</th>
                            <th>Uji</th>
                            <th style="width: 140px" class="text-right">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->sub_kategori ?? '-' }}</td>
                                <td>{{ number_format((float) $item->tonase, 2) }}</td>
                                <td>{{ $item->uji_kualitas }}</td>
                                <td class="text-right">
                                    <a href="{{ route('master-inventarisasi.edit', $item) }}" class="text-warning mr-2" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('master-inventarisasi.destroy', $item) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0 m-0" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center p-3">Belum ada data</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
