@extends('layouts.admin')

@section('title', 'Data Kemitraan')
@section('page_title', 'Data Kemitraan')

@section('content')
<div class="row">
    <div class="col-md-5">
        @include('kemitraan._form')
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Data Kemitraan</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th style="width: 60px">ID</th>
                            <th>Nama Mitra</th>
                            <th>Jenis</th>
                            <th>Kegiatan</th>
                            <th>Penerima</th>
                            <th style="width: 120px" class="text-right">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_mitra }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ number_format($item->jumlah_penerima_manfaat) }}</td>
                                <td class="text-right">
                                    <a href="{{ route('master-kemitraan.show', $item) }}" class="text-info mr-2" title="Detail"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('master-kemitraan.edit', $item) }}" class="text-warning mr-2" title="Edit Data"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('master-kemitraan.destroy', $item) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Hapus data ini?')">
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
            </div>
        </div>
    </div>
</div>
@endsection
