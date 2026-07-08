@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card">

            <div class="card-header bg-white">
                <h4 class="mb-0 fw-bold">
                    Edit User
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.update', $admin->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $admin->name) }}">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $admin->email) }}">

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Role
                        </label>

                        <select
                            name="role"
                            class="form-select @error('role') is-invalid @enderror">

                            <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="pkl" {{ $admin->role == 'pkl' ? 'selected' : '' }}>
                                PKL
                            </option>

                            <option value="sales" {{ $admin->role == 'sales' ? 'selected' : '' }}>
                                Sales
                            </option>

                            <option value="teknisi" {{ $admin->role == 'teknisi' ? 'selected' : '' }}>
                                Teknisi
                            </option>

                        </select>

                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Password Baru
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti password.
                        </small>

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control">

                    </div>

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i>
                            Update User
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection