@extends('layouts.admin.main')
@section('title', 'Admin Flash Sale')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Flash Sale</div>
            </div>
        </div>
        <a href="{{ route('flashsales.create') }}" class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-plus"></i> Tambah Flash Sale
        </a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga Diskon</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Berakhir</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $no = 0; // Inisialisasi nomor urut
                    @endphp
                    @if(isset($flash_sales) && count($flash_sales) > 0)
                        @forelse ($flash_sales as $item)
                            <tr>
                                <td>{{ ++$no }}</td> <!-- Increment nomor urut -->
                                <td>{{ optional($item->product)->name }}</td>
                                <td>{{ $item->discount_price }} Points</td>
                                <td>{{ \Carbon\Carbon::parse($item->start_time)->format('Y-m-d H:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->end_time)->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('flashsales.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                                    <a href="{{ route('admin.flashsales.show', $item->id) }}"
                                        class="badge badge-info">Detail</a>
                                    <form action="{{ route('flashsales.delete', $item->id) }}" method="post"
                                        style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="badge badge-danger"
                                            data-confirm-delete="true">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Flash Sale Kosong</td>
                            </tr>
                        @endforelse
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Data Flash Sale Kosong</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </section>
</div>
@endsection