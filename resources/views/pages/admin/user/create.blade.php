@extends('layouts.admin.main')
@section('title', 'Create User')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.user') }}">Users</a>
                </div>
                <div class="breadcrumb-item">
                    Tambah User
                </div>
            </div>
        </div>
        <div class="container">
            <h1>Tambah Pengguna</h1>
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="point">Poin</label>
                    <input type="number" name="point" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        @endsection