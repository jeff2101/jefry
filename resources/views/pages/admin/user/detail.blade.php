@extends('layouts.admin.main')

@section('title', 'Distributor Detail')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User Detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">User</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.distributor') }}">User</a>
                </div>
                <div class="breadcrumb-item">
                    User Detail
                </div>
            </div>
        </div>
        <div class="container">
            <h1>Detail Pengguna</h1>
            <div class="form-group">
                <label for="name">Nama:</label>
                <p>{{ $user->name }}</p>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <p>{{ $user->email }}</p>
            </div>
            <div class="form-group">
                <label for="point">Poin:</label>
                <p>{{ $user->point }}</p>
            </div>
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('user.delete', $user->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
            </form>
        </div>
        @endsection