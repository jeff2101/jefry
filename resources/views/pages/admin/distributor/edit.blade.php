@extends('layouts.admin.main')

@section('title', 'Edit Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.distributor') }}">Distributors</a>
                </div>
                <div class="breadcrumb-item">
                    Edit Distributor
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Distributor Form</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.distributor.update', $distributor->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_distributor">Nama Distributor</label>
                                <input type="text" class="form-control" id="nama_distributor" name="nama_distributor"
                                    value="{{ $distributor->nama_distributor }}" required>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                    value="{{ $distributor->lokasi }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <input type="text" class="form-control" id="kontak" name="kontak"
                                    value="{{ $distributor->kontak }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $distributor->email }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Distributor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection