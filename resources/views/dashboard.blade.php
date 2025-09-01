@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                Selamat datang, <strong>{{ auth()->user()->name }}</strong>!
            </div>
        </div>
    </div>
@endsection

