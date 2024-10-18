@extends('layouts.admin.main')
@section('title', 'Create Admin')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.user') }}">Admin</a>
                </div>
                <div class="breadcrumb-item">
                    Tambah User
                </div>
            </div>
        </div>
        <div class="container">
            <h2>Tambah Admin Baru</h2>

            <form action="{{ route('admin.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.admin') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
        @endsection