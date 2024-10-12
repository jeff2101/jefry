@extends('layouts.admin.main')
@section('title', 'Admin Tambah Flash Sale')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.flashsales') }}">Flash Sale</a>
                </div>
                <div class="breadcrumb-item">Tambah Flash Sale</div>
            </div>
        </div>
        <a href="{{ route('admin.flashsales') }}" class="btn btn-icon icon-left btn-warning">Kembali</a>
        <div class="card mt-4">
            <form action="{{ route('flashsales.store') }}" class="needs-validation" novalidate="" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_id">Nama Produk</label>
                                <select id="product_id" class="form-control" name="product_id" required>
                                    <option value="" disabled {{ old('product_id') == '' ? 'selected' : '' }}>Pilih Produk
                                    </option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="discount_price">Harga Diskon (Point)</label>
                                <input id="discount_price" type="number" class="form-control" name="discount_price"
                                    value="{{ old('discount_price') }}" required>
                                @error('discount_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="start_time">Waktu Mulai</label>
                                <input id="start_time" type="datetime-local" class="form-control" name="start_time"
                                    value="{{ old('start_time') }}" required>
                                @error('start_time')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="end_time">Waktu Berakhir</label>
                                <input id="end_time" type="datetime-local" class="form-control" name="end_time"
                                    value="{{ old('end_time') }}">
                                @error('end_time')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection