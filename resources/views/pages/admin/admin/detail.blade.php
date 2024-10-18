@extends('layouts.admin.main')

@section('title', 'Admin Detail')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin Detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.admin') }}">Admin</a>
                </div>
                <div class="breadcrumb-item">
                    Admin Detail
                </div>
            </div>
        </div>
        <div class="container">
            <h1>Detail Admin</h1>
            <div class="form-group">
                <label for="name">Nama:</label>
                <p>{{ $admin->name }}</p>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <p>{{ $admin->username }}</p>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <p>{{ $admin->email }}</p>
            </div>
            <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.delete', $admin->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
            </form>
        </div>
    </section>
</div>
@endsection