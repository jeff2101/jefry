@extends('layouts.admin.main')

@section('title', 'Edit Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.distributor') }}">User</a>
                </div>
                <div class="breadcrumb-item">
                    Edit User
                </div>
            </div>
        </div>
        <div class="container">
            <h1>Edit Pengguna</h1>
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password (Opsional)</label>
                    <input type="password" name="password" class="form-control">
                    <small>Isi jika ingin mengubah password</small>
                </div>
                <div class="form-group">
                    <label for="point">Poin</label>
                    <input type="number" name="point" class="form-control" value="{{ $user->point }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </form>
        </div>
        @endsection