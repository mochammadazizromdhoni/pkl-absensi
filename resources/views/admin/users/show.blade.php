@extends('admin.layouts.app')

@section('title','Detail User')

@section('content')

<div class="card">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <div>

            <h4 class="fw-bold mb-1">
                Detail User
            </h4>

            <small class="text-muted">
                Informasi lengkap pengguna
            </small>

        </div>

        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </a>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-lg-3 text-center">

                <div class="mx-auto mb-3 d-flex align-items-center justify-content-center text-white fw-bold"
                    style="width:120px;height:120px;
                    border-radius:50%;
                    background:linear-gradient(135deg,#2563eb,#60a5fa);
                    font-size:42px;">

                    {{ strtoupper(substr($user->name,0,1)) }}

                </div>

                <h4 class="fw-bold">
                    {{ $user->name }}
                </h4>

                @switch($user->role)

                    @case('admin')
                        <span class="badge bg-primary px-3 py-2">Admin</span>
                    @break

                    @case('pkl')
                        <span class="badge bg-success px-3 py-2">PKL</span>
                    @break

                    @case('sales')
                        <span class="badge bg-warning text-dark px-3 py-2">Sales</span>
                    @break

                    @case('teknisi')
                        <span class="badge bg-danger px-3 py-2">Teknisi</span>
                    @break

                    @default
                        <span class="badge bg-secondary px-3 py-2">
                            {{ ucfirst($user->role) }}
                        </span>

                @endswitch

            </div>

            <div class="col-lg-9">

                <table class="table table-bordered">

                    <tr>
                        <th width="220">ID User</th>
                        <td>{{ $user->id }}</td>
                    </tr>

                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $user->name }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <th>Role</th>
                        <td>{{ ucfirst($user->role) }}</td>
                    </tr>

                    <tr>
                        <th>Dibuat</th>
                        <td>{{ $user->created_at->format('d F Y H:i') }}</td>
                    </tr>

                    <tr>
                        <th>Terakhir Diubah</th>
                        <td>{{ $user->updated_at->format('d F Y H:i') }}</td>
                    </tr>

                </table>

                <div class="mt-4">

                    <a href="{{ route('admin.users.edit',$user->id) }}"
                        class="btn btn-warning">

                        <i class="bi bi-pencil-square"></i>

                        Edit

                    </a>

                    @if($user->id != auth()->id())

                    <form action="{{ route('admin.users.destroy',$user->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger"
                            onclick="return confirm('Yakin ingin menghapus user ini?')">

                            <i class="bi bi-trash"></i>

                            Hapus

                        </button>

                    </form>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection