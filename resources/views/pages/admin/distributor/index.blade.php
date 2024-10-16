@extends('layouts.admin.main')
@section('title', 'Admin Distributor')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Distributor</div>
            </div>
        </div>

        <a href="{{ route('admin.distributor.create') }}" class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-plus"></i> Tambah Distributor
        </a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Distributor</th>
                            <th>Lokasi</th>
                            <th>Kontak</th>
                            <th>Email</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($distributors as $distributor)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $distributor->nama_distributor }}</td>
                                <td>{{ $distributor->lokasi }}</td>
                                <td>{{ $distributor->kontak }}</td>
                                <td>{{ $distributor->email }}</td>
                                <td>{{ $distributor->created_at->format('d-m-Y H:i') }}</td>
                                <td>{{ $distributor->updated_at->format('d-m-Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.distributor.show', $distributor->id) }}"
                                        class="badge badge-info">Detail</a>
                                    <a href="{{ route('admin.distributor.edit', $distributor->id) }}"
                                        class="badge badge-warning">Edit</a>
                                    <a href="#" class="badge badge-danger"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $distributor->id }}').submit();">Hapus</a>
                                    <form id="delete-form-{{ $distributor->id }}"
                                        action="{{ route('admin.distributor.destroy', $distributor->id) }}" method="post"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Distributor Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection