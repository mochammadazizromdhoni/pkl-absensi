@extends('admin.layouts.app')

@section('title','Data User')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card shadow-sm">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <div>
            <h4 class="fw-bold mb-1">Data User</h4>
            <small class="text-muted">
                Total {{ $users->count() }} User
            </small>
        </div>

        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah User
        </a>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th width="70">No</th>
                        <th>User</th>
                        <th>Email</th>
                        <th width="120">Role</th>
                        <th width="170">Dibuat</th>
                        <th width="200" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            <div class="d-flex align-items-center">

                                <div class="rounded-circle bg-primary text-white fw-bold d-flex align-items-center justify-content-center me-3"
                                    style="width:45px;height:45px;">

                                    {{ strtoupper(substr($user->name,0,1)) }}

                                </div>

                                <div>

                                    <div class="fw-bold">
                                        {{ $user->name }}
                                    </div>

                                    <small class="text-muted">
                                        ID : {{ $user->id }}
                                    </small>

                                </div>

                            </div>

                        </td>

                        <td>{{ $user->email }}</td>

                        <td>

                            @switch($user->role)

                                @case('admin')
                                    <span class="badge bg-primary">Admin</span>
                                    @break

                                @case('pkl')
                                    <span class="badge bg-success">PKL</span>
                                    @break

                                @case('sales')
                                    <span class="badge bg-warning text-dark">Sales</span>
                                    @break

                                @case('teknisi')
                                    <span class="badge bg-danger">Teknisi</span>
                                    @break

                                @default
                                    <span class="badge bg-secondary">
                                        {{ ucfirst($user->role) }}
                                    </span>

                            @endswitch

                        </td>

                        <td>
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                        <td>
    <div class="action-group">

        <a href="{{ route('admin.users.show',$user->id) }}"
           class="action-btn action-view"
           title="Detail">
            <i class="bi bi-eye"></i>
        </a>

        <a href="{{ route('admin.users.edit',$user->id) }}"
           class="action-btn action-edit"
           title="Edit">
            <i class="bi bi-pencil-square"></i>
        </a>

        <form action="{{ route('admin.users.destroy',$user->id) }}"
              method="POST"
              class="d-inline">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="action-btn action-delete"
                    title="Hapus"
                    onclick="return confirm('Yakin ingin menghapus user ini?')">
                <i class="bi bi-trash"></i>
            </button>
        </form>

    </div>
</td>
                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-5">

                            <i class="bi bi-people fs-1 text-muted"></i>

                            <h5 class="mt-3">
                                Belum ada data user
                            </h5>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection