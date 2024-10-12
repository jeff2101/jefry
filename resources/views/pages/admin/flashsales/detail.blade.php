@extends('layouts.admin.main')
@section('title', 'Detail Flash Sale')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.flashsales') }}">Flash Sales</a>
                </div>
                <div class="breadcrumb-item">Detail Flash Sale</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Flash Sale</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="product">Nama Produk</label>
                                    <p>{{ $flashsale->product ? $flashsale->product->name : 'Produk Tidak Ditemukan' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="discount_price">Harga Diskon</label>
                                    <p>Rp {{ number_format($flashsale->discount_price, 2, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="start_time">Waktu Mulai</label>
                                    <p>{{ \Carbon\Carbon::parse($flashsale->start_time)->format('d-m-Y H:i') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="end_time">Waktu Berakhir</label>
                                    <p>{{ $flashsale->end_time ? \Carbon\Carbon::parse($flashsale->end_time)->format('d-m-Y H:i') : 'Belum Ditentukan' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{ route('admin.flashsales') }}" class="btn btn-secondary">Kembali</a>
                                <a href="{{ route('flashsales.edit', $flashsale->id) }}"
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