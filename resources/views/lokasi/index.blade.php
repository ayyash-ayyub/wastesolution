@extends('layouts.admin')

@section('title', 'Master Lokasi')
@section('page_title', 'Master Lokasi')

@section('content')
<div class="row">
    <div class="col-md-5">
        @include('lokasi._form')
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Data Master Lokasi</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th style="width: 60px">ID</th>
                            <th>Nama Site</th>
                            <th>Kordinat</th>
                            <th style="width: 120px" class="text-right">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_site }}</td>
                                <td>{{ $item->kordinat ?? '-' }}</td>
                                <td class="text-right">
                                    <a href="{{ route('master-lokasi.edit', $item) }}" class="text-warning mr-2" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('master-lokasi.destroy', $item) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0 m-0" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center p-3">Belum ada data</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

