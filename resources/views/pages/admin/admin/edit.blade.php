@extends('layouts.admin.main')
@section('title', 'Edit Admin')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.distributor') }}">Admin</a>
                </div>
                <div class="breadcrumb-item">
                    Edit Admin
                </div>
            </div>
        </div>
        <div class="container">
            <h2>Edit Admin</h2>

            <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $admin->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="{{ old('username', $admin->username) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $admin->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('admin.admin') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
        @endsection