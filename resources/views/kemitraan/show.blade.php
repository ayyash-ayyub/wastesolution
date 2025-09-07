@extends('layouts.admin')

@section('title', 'Detail Data Kemitraan')
@section('page_title', 'Detail Data Kemitraan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">{{ $item->nama_mitra }}</h3>
            </div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-3">Jenis</dt>
                    <dd class="col-sm-9">{{ $item->jenis }}</dd>
                    <dt class="col-sm-3">Nama Kegiatan/Program</dt>
                    <dd class="col-sm-9">{{ $item->nama_kegiatan }}</dd>
                    <dt class="col-sm-3">Sasaran</dt>
                    <dd class="col-sm-9">{{ $item->sasaran }}</dd>
                    <dt class="col-sm-3">Jumlah Penerima Manfaat</dt>
                    <dd class="col-sm-9">{{ number_format($item->jumlah_penerima_manfaat) }}</dd>
                </dl>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('master-kemitraan.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('master-kemitraan.edit', $item) }}" class="btn btn-warning">Edit Data</a>
            </div>
        </div>
    </div>
</div>
@endsection
