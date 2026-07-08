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
    font-family:'Segoe UI',sans-serif;
}


body{

    background:#f8fafc;
    margin:0;

}


/* SIDEBAR */

.sidebar{

    position:fixed;
    top:0;
    left:0;
    height:100vh;
    width:260px;

    background:
    linear-gradient(180deg,#2563eb,#1e40af);

    padding:25px 18px;

    color:white;

    z-index:1000;

}


.logo{

    height:55px;
    width:auto;
    margin-bottom:35px;

}



.sidebar .menu-title{

    font-size:12px;
    opacity:.7;
    margin:20px 10px 10px;

}



.sidebar a{

    display:flex;

    align-items:center;

    gap:14px;

    color:white;

    text-decoration:none;

    padding:13px 15px;

    border-radius:14px;

    margin-bottom:8px;

    font-weight:600;

    transition:.3s;

}



.sidebar a:hover,
.sidebar a.active{

    background:rgba(255,255,255,.18);

    transform:translateX(5px);

}



.sidebar i{

    font-size:20px;

}





/* CONTENT */

.main{

    margin-left:260px;

    min-height:100vh;

}



/* NAVBAR */


.navbar{

    height:75px;

    background:white!important;

    box-shadow:0 5px 20px rgba(0,0,0,.05);

    padding:0 35px;

}



.avatar{

    width:42px;
    height:42px;

    border-radius:50%;

    background:#2563eb;

    color:white;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:bold;

}



.dropdown-menu{

    border:none;

    border-radius:15px;

    box-shadow:0 15px 30px rgba(0,0,0,.1);

}



.content{

    padding:35px;

}



/* CARD */


.card{

    border:none;

    border-radius:20px;

    box-shadow:
    0 15px 35px rgba(0,0,0,.06);

}





.btn{

    border-radius:12px;

    padding:10px 18px;

    font-weight:600;

}



.form-control{

    border-radius:14px;

    padding:12px;

}





@media(max-width:991px){


.sidebar{

    left:-260px;

}


.main{

    margin-left:0;

}


}



</style>


@stack('css')


</head>



<body>



<!-- SIDEBAR -->

<div class="sidebar">


<img src="{{asset('assets/logo.jpeg')}}" class="logo">



<div class="menu-title">

MENU UTAMA

</div>



<a href="{{route('admin.dashboard')}}" class="active">

<i class="bi bi-grid"></i>

Dashboard

</a>




<a href="{{route('admin.dashboard')}}">

<i class="bi bi-people"></i>

Users

</a>



<a href="#">

<i class="bi bi-box-seam"></i>

Data

</a>



<a href="#">

<i class="bi bi-calendar-check"></i>

Absensi

</a>



<a href="#">

<i class="bi bi-file-earmark-text"></i>

Laporan

</a>



<div class="menu-title">

SETTING

</div>



<a href="{{route('profile.edit')}}">

<i class="bi bi-person"></i>

Profile

</a>



</div>






<!-- MAIN -->


<div class="main">



<nav class="navbar navbar-expand-lg">


<div class="container-fluid">



<div>

<h5 class="mb-0 fw-bold">

Admin Panel

</h5>

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

{{strtoupper(substr(auth()->user()->name,0,1))}}

</div>



<span class="ms-2 fw-semibold">

{{auth()->user()->name}}

</span>


</a>




<ul class="dropdown-menu dropdown-menu-end">



<li>

<a class="dropdown-item"
href="{{route('profile.edit')}}">

<i class="bi bi-person me-2"></i>

Profile

</a>

</li>


<li>
<hr>
</li>



<li>


<form method="POST"
action="{{route('logout')}}">

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

<div class="alert alert-success">

{{session('success')}}

</div>

@endif




@yield('content')



</div>



</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


@stack('js')


</body>

</html>