@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

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


                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection