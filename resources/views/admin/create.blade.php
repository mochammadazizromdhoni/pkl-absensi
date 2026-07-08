@extends('admin.layouts.app')

@section('title','Tambah User')

@section('content')

<div class="card shadow-sm">

    <div class="card-header bg-white">

        <h5 class="mb-0 fw-bold">
            <i class="bi bi-person-plus"></i>
            Tambah User Baru
        </h5>

        <small class="text-muted">
            Tambahkan pengguna baru ke sistem
        </small>

    </div>


    <div class="card-body">

        <form action="{{ route('admin.store') }}" method="POST">

            @csrf


            <div class="row">


                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Nama Lengkap
                    </label>

                    <input 
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Masukkan nama"
                        value="{{ old('name') }}"
                        required>

                </div>



                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Email
                    </label>

                    <input 
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="contoh@email.com"
                        value="{{ old('email') }}"
                        required>

                </div>



                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Password
                    </label>

                    <input 
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required>

                </div>



                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Konfirmasi Password
                    </label>

                    <input 
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Ulangi password"
                        required>

                </div>



                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Role User
                    </label>


                    <select 
                        name="role"
                        class="form-select"
                        required>


                        <option value="">
                            -- Pilih Role --
                        </option>


                        <option value="admin">
                            Admin
                        </option>


                        <option value="pkl">
                            PKL
                        </option>


                        <option value="sales">
                            Sales
                        </option>


                        <option value="teknisi">
                            Teknisi
                        </option>


                    </select>

                </div>


            </div>



            <div class="d-flex justify-content-end gap-2">


                <a href="{{ route('dashboard') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>
                    Kembali

                </a>



                <button 
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-save"></i>
                    Simpan User

                </button>


            </div>


        </form>


    </div>

</div>


@endsection