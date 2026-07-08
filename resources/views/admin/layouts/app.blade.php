<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>@yield('title','Admin Dashboard')</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter','Segoe UI',sans-serif;
}

body{
    background:#eef3f9;
}

/* ======================
        SIDEBAR
====================== */

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:270px;
    height:100vh;
    background:linear-gradient(
        180deg,
        #0b1f48 0%,
        #1749a5 55%,
        #2f7df6 100%
    );
    padding:24px 18px;
    overflow-y:auto;
    box-shadow:0 18px 45px rgba(0,0,0,.25);
}

/* LOGO */

.logo-box{
    background:#fff;
    border-radius:22px;
    padding:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
    margin-bottom:35px;
}

.logo{
    width:100%;
    height:70px;
    object-fit:contain;
    display:block;
}

/* MENU */

.menu-title{
    color:#b8c7e6;
    font-size:11px;
    letter-spacing:2px;
    margin:22px 12px 10px;
    text-transform:uppercase;
}

.sidebar a{
    display:flex;
    align-items:center;
    gap:15px;
    color:#e7edf8;
    text-decoration:none;
    padding:14px 16px;
    border-radius:15px;
    margin-bottom:8px;
    transition:.3s;
    font-weight:600;
}

.sidebar a i{
    font-size:21px;
}

.sidebar a:hover{
    background:rgba(255,255,255,.18);
    transform:translateX(5px);
    color:#fff;
}

.sidebar a.active{
    background:#fff;
    color:#2563eb;
    box-shadow:0 10px 20px rgba(0,0,0,.12);
}

/* ======================
        MAIN
====================== */

.main{
    margin-left:270px;
    min-height:100vh;
}

/* ======================
        NAVBAR
====================== */

.navbar{
    height:88px;
    background:#fff!important;
    padding:0 40px;
    border-bottom:1px solid #edf2f7;
    box-shadow:0 8px 25px rgba(15,23,42,.05);
}

.navbar h5{
    font-size:24px;
    font-weight:700;
}

.avatar{
    width:48px;
    height:48px;
    border-radius:50%;
    background:linear-gradient(135deg,#2563eb,#60a5fa);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
    font-weight:700;
}

/* ======================
        CONTENT
====================== */

.content{
    padding:35px;
}

/* ======================
        CARD
====================== */

.card{
    border:none;
    border-radius:22px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 10px 35px rgba(15,23,42,.08);
    transition:.35s;
}

.card:hover{
    transform:translateY(-4px);
    box-shadow:0 18px 45px rgba(15,23,42,.12);
}

/* ======================
        TABLE
====================== */

.table{
    margin-bottom:0;
}

.table thead th{
    background:#f8fafc;
    color:#475569;
    font-weight:700;
    border:none;
    padding:16px;
}

.table tbody td{
    padding:18px;
    vertical-align:middle;
}

.table tbody tr{
    transition:.25s;
}

.table tbody tr:hover{
    background:#f4f8ff;
}

/* ======================
        BUTTON
====================== */

.btn{
    border-radius:12px;
    font-weight:600;
    padding:10px 18px;
    transition:.3s;
}

.btn-sm{
    padding:8px 12px;
}

.badge{
    border-radius:30px;
    padding:8px 14px;
}

/* ======================
        DROPDOWN
====================== */

.dropdown-menu{
    border:none;
    border-radius:18px;
    padding:10px;
    box-shadow:0 20px 40px rgba(0,0,0,.12);
}

.dropdown-item{
    border-radius:10px;
    padding:10px;
}

.dropdown-item:hover{
    background:#eff6ff;
}

.action-group{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
}

.action-btn{
    width:40px;
    height:40px;
    display:flex;
    align-items:center;
    justify-content:center;
    border:none;
    border-radius:12px;
    background:transparent;
    text-decoration:none;
    cursor:pointer;
    transition:.25s ease;
}

.action-btn i{
    font-size:18px;
    transition:.25s;
}

.action-view{
    color:#06b6d4;
}

.action-view:hover{
    background:rgba(6,182,212,.10);
    color:#0891b2;
    transform:translateY(-2px);
}

.action-edit{
    color:#f59e0b;
}

.action-edit:hover{
    background:rgba(245,158,11,.10);
    color:#d97706;
    transform:translateY(-2px);
}

.action-delete{
    color:#ef4444;
}

.action-delete:hover{
    background:rgba(239,68,68,.10);
    color:#dc2626;
    transform:translateY(-2px);
}

.action-btn:hover i{
    transform:scale(1.15);
}

.action-btn:active{
    transform:scale(.95);
}

/* ======================
      RESPONSIVE
====================== */

@media(max-width:991px){

.sidebar{
    transform:translateX(-100%);
}

.main{
    margin-left:0;
}

}

</style>

@stack('css')

</head>

<body>

<div class="sidebar">

<div class="logo-box">

<img src="{{ asset('assets/logo.jpeg') }}" class="logo">

</div>

<div class="menu-title">
MENU UTAMA
</div>

<a href="{{ route('admin.dashboard') }}"
class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

<i class="bi bi-grid-fill"></i>

Dashboard

</a>

<a href="{{ route('admin.users.index') }}"
class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">

<i class="bi bi-people-fill"></i>

Users

</a>

<a href="#">
<i class="bi bi-box-seam-fill"></i>
Data
</a>

<a href="#">
<i class="bi bi-calendar-check-fill"></i>
Absensi
</a>

<a href="#">
<i class="bi bi-file-earmark-text-fill"></i>
Laporan
</a>

<div class="menu-title">
SETTING
</div>

<a href="{{ route('profile.edit') }}">
<i class="bi bi-person-circle"></i>
Profile
</a>

</div>

<div class="main">

<nav class="navbar">

<div class="container-fluid">

<div>

<h5>Admin Panel</h5>

<small class="text-muted">
Dashboard Management
</small>

</div>

<ul class="navbar-nav ms-auto">

<li class="nav-item dropdown">

<a class="nav-link dropdown-toggle d-flex align-items-center"
href="#"
data-bs-toggle="dropdown">

<div class="avatar">
{{ strtoupper(substr(auth()->user()->name,0,1)) }}
</div>

<div class="ms-3">

<div class="fw-bold">

{{ auth()->user()->name }}

</div>

<small class="text-muted">

Administrator

</small>

</div>

</a>

<ul class="dropdown-menu dropdown-menu-end">

<li>

<a class="dropdown-item"
href="{{ route('profile.edit') }}">

<i class="bi bi-person me-2"></i>

Profile

</a>

</li>

<li><hr></li>

<li>

<form method="POST"
action="{{ route('logout') }}">

@csrf

<button class="dropdown-item text-danger">

<i class="bi bi-box-arrow-right me-2"></i>

Logout

</button>

</form>

</li>

</ul>

</li>

</ul>

</div>
</nav>

<div class="content">

    @if(session('success'))
        <div class="alert alert-success rounded-4">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el=>{
    new bootstrap.Tooltip(el);
});
</script>
@stack('js')

</body>
</html>