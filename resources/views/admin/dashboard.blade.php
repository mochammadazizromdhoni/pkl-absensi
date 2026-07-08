@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="row g-4 mb-4">

    <div class="col-lg-3 col-md-6">
        <div class="card h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Total User</small>
                    <h2 class="fw-bold mb-0">{{ $totalUser }}</h2>
                </div>

                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                    style="width:60px;height:60px;">
                    <i class="bi bi-people-fill fs-3"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Admin</small>
                    <h2 class="fw-bold mb-0">{{ $totalAdmin }}</h2>
                </div>

                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                    style="width:60px;height:60px;">
                    <i class="bi bi-person-badge-fill fs-3"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">PKL</small>
                    <h2 class="fw-bold mb-0">{{ $totalPKL }}</h2>
                </div>

                <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center"
                    style="width:60px;height:60px;">
                    <i class="bi bi-mortarboard-fill fs-3"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Sales & Teknisi</small>
                    <h2 class="fw-bold mb-0">{{ $totalSales + $totalTeknisi }}</h2>
                </div>

                <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center"
                    style="width:60px;height:60px;">
                    <i class="bi bi-person-workspace fs-3"></i>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <div>

            <h5 class="mb-0 fw-bold">
                Data User
            </h5>

            <small class="text-muted">
                Seluruh pengguna yang terdaftar
            </small>

        </div>

        <a href="{{ route('admin.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah User
        </a>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Dibuat</th>
                    <th width="170">Aksi</th>
                </tr>

                </thead>

                <tbody>

                @forelse($admins as $admin)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $admin->name }}</strong>
                    </td>

                    <td>{{ $admin->email }}</td>

                    <td>

                        @if($admin->role == 'admin')

                            <span class="badge bg-primary">
                                Admin
                            </span>

                        @elseif($admin->role == 'pkl')

                            <span class="badge bg-success">
                                PKL
                            </span>

                        @elseif($admin->role == 'sales')

                            <span class="badge bg-warning text-dark">
                                Sales
                            </span>

                        @elseif($admin->role == 'teknisi')

                            <span class="badge bg-danger">
                                Teknisi
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                {{ ucfirst($admin->role) }}
                            </span>

                        @endif

                    </td>

                    <td>{{ $admin->created_at->format('d M Y') }}</td>

                    <td>

                        <a href="{{ route('admin.edit',$admin->id) }}"
                            class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil-square"></i>

                        </a>

                        <form action="{{ route('admin.delete',$admin->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin ingin menghapus user ini?')"
                                class="btn btn-danger btn-sm">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center py-4">
                        Tidak ada data.
                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection