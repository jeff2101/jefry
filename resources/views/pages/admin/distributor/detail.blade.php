@extends('layouts.admin.main')

@section('title', 'Distributor Detail')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Distributor Detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.distributor') }}">Distributors</a>
                </div>
                <div class="breadcrumb-item">
                    Distributor Detail
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Distributor Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_distributor">Nama Distributor</label>
                                    <p>{{ $distributor->nama_distributor }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <p>{{ $distributor->lokasi }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="kontak">Kontak</label>
                                    <p>{{ $distributor->kontak }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <p>{{ $distributor->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="created_at">Tanggal Buat</label>
                                    <p>{{ $distributor->created_at->format('d-m-Y H:i') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="updated_at">Tanggal Update</label>
                                    <p>{{ $distributor->updated_at->format('d-m-Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{ route('admin.distributor') }}" class="btn btn-secondary">Kembali</a>
                                <a href="{{ route('admin.distributor.edit', $distributor->id) }}"
                                    class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection