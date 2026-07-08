<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard PKL</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#F3F6FB;
        }

        .card{
            background:white;
            border-radius:18px;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
        }

        .menu-card:hover{
            transform:translateY(-5px);
            transition:.3s;
        }

    </style>

</head>

<body>

<div class="min-h-screen pb-28">

    <!-- HEADER -->

    <div class="bg-blue-600 rounded-b-[35px]">

        <div class="max-w-7xl mx-auto px-6 py-8">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-blue-200">

                        Selamat Datang 👋

                    </p>

                    <h1 class="text-3xl font-bold text-white">

                        {{ Auth::user()->name }}

                    </h1>

                    <p id="jam" class="text-blue-100 mt-2"></p>

                </div>

                <div class="flex items-center gap-3">

                    <img
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=2563eb"
                    class="w-14 h-14 rounded-full border-4 border-white">

                </div>

            </div>

        </div>

    </div>


    <div class="max-w-7xl mx-auto px-5 mt-6">

        <!-- ABSENSI -->

        <div class="card p-6">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-xl font-bold">

                        Absensi Hari Ini

                    </h2>

                    <p class="text-gray-500 mt-1">

                        Status :
                        <span class="text-red-500 font-semibold">

                            Belum Absen

                        </span>

                    </p>

                </div>

                <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Absen

                </button>

            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mt-8">

                <div class="bg-blue-50 rounded-xl p-5">

                    <p class="text-gray-500">

                        Jam Masuk

                    </p>

                    <h1 class="text-3xl font-bold text-blue-600">

                        --:--

                    </h1>

                </div>

                <div class="bg-red-50 rounded-xl p-5">

                    <p class="text-gray-500">

                        Jam Pulang

                    </p>

                    <h1 class="text-3xl font-bold text-red-500">

                        --:--

                    </h1>

                </div>

                <div class="bg-green-50 rounded-xl p-5">

                    <p class="text-gray-500">

                        Lokasi

                    </p>

                    <h1 class="font-semibold text-green-600">

                        Belum Terdeteksi

                    </h1>

                </div>

                <div class="bg-yellow-50 rounded-xl p-5">

                    <p class="text-gray-500">

                        Face ID

                    </p>

                    <h1 class="font-semibold text-yellow-600">

                        Belum Verifikasi

                    </h1>

                </div>

            </div>

        </div>

        <!-- STATISTIK -->

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mt-6">

            <div class="card p-5 text-center">

                <h1 class="text-4xl font-bold text-green-600">

                    20

                </h1>

                <p class="mt-2">

                    Hadir

                </p>

            </div>

            <div class="card p-5 text-center">

                <h1 class="text-4xl font-bold text-yellow-500">

                    2

                </h1>

                <p class="mt-2">

                    Izin

                </p>

            </div>

            <div class="card p-5 text-center">

                <h1 class="text-4xl font-bold text-red-500">

                    0

                </h1>

                <p class="mt-2">

                    Alpha

                </p>

            </div>

            <div class="card p-5 text-center">

                <h1 class="text-4xl font-bold text-blue-600">

                    18

                </h1>

                <p class="mt-2">

                    Jurnal

                </p>

            </div>

        </div>

        <!-- MENU CEPAT -->

        <h2 class="text-2xl font-bold mt-8 mb-4">

            Menu Cepat

        </h2>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">

            <div class="card menu-card p-6 text-center">

                📖

                <h3 class="font-semibold mt-3">

                    Jurnal

                </h3>

            </div>

            <div class="card menu-card p-6 text-center">

                📅

                <h3 class="font-semibold mt-3">

                    Rekap

                </h3>

            </div>
                        <div class="card menu-card p-6 text-center">

                📍

                <h3 class="font-semibold mt-3">

                    Tempat PKL

                </h3>

            </div>

            <div class="card menu-card p-6 text-center">

                👤

                <h3 class="font-semibold mt-3">

                    Profil

                </h3>

            </div>

        </div>



        <!-- PENGUMUMAN & RIWAYAT -->

        <div class="grid lg:grid-cols-2 gap-6 mt-8">

            <div class="card p-6">

                <h2 class="text-xl font-bold mb-5">

                    📢 Pengumuman

                </h2>

                <div class="space-y-4">

                    <div class="bg-blue-50 p-4 rounded-xl">

                        <h3 class="font-semibold">

                            Briefing Pagi

                        </h3>

                        <p class="text-gray-500 text-sm mt-1">

                            Briefing dimulai pukul 08.00 WIB.

                        </p>

                    </div>

                    <div class="bg-green-50 p-4 rounded-xl">

                        <h3 class="font-semibold">

                            Jurnal Harian

                        </h3>

                        <p class="text-gray-500 text-sm mt-1">

                            Jangan lupa mengisi jurnal sebelum pulang.

                        </p>

                    </div>

                    <div class="bg-yellow-50 p-4 rounded-xl">

                        <h3 class="font-semibold">

                            Seragam

                        </h3>

                        <p class="text-gray-500 text-sm mt-1">

                            Hari Jumat memakai batik.

                        </p>

                    </div>

                </div>

            </div>



            <div class="card p-6">

                <h2 class="text-xl font-bold mb-5">

                    📜 Riwayat Absensi

                </h2>

                <div class="space-y-4">

                    <div class="flex justify-between items-center border-b pb-3">

                        <div>

                            <h3 class="font-semibold">

                                Senin

                            </h3>

                            <p class="text-sm text-gray-500">

                                07 Juli 2026

                            </p>

                        </div>

                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                            Hadir

                        </span>

                    </div>

                    <div class="flex justify-between items-center border-b pb-3">

                        <div>

                            <h3 class="font-semibold">

                                Minggu

                            </h3>

                            <p class="text-sm text-gray-500">

                                06 Juli 2026

                            </p>

                        </div>

                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                            Hadir

                        </span>

                    </div>

                    <div class="flex justify-between items-center border-b pb-3">

                        <div>

                            <h3 class="font-semibold">

                                Sabtu

                            </h3>

                            <p class="text-sm text-gray-500">

                                05 Juli 2026

                            </p>

                        </div>

                        <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm">

                            Izin

                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <div>

                            <h3 class="font-semibold">

                                Jumat

                            </h3>

                            <p class="text-sm text-gray-500">

                                04 Juli 2026

                            </p>

                        </div>

                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">

                            Hadir

                        </span>

                    </div>

                </div>

            </div>

        </div>
            </div>

</div>

<!-- Bottom Navigation -->
<nav class="fixed bottom-0 left-0 w-full bg-white border-t shadow-lg">

    <div class="max-w-lg mx-auto flex justify-around items-center h-20">

        <!-- Dashboard -->
        <a href="{{ route('pkl.dashboard') }}"
           class="flex flex-col items-center text-blue-600">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-7 h-7"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 9.75L12 3l9 6.75V21a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1V9.75z"/>

            </svg>

            <span class="text-xs mt-1">Home</span>

        </a>

        <!-- Rekap -->
        <a href="#"
           class="flex flex-col items-center text-gray-500">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-7 h-7"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M8 7V3m8 4V3M5 11h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>

            </svg>

            <span class="text-xs mt-1">Rekap</span>

        </a>

        <!-- Scan QR -->
        <a href="#"
           class="-mt-12 bg-blue-600 w-20 h-20 rounded-full flex items-center justify-center border-4 border-white shadow-xl">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-9 h-9 text-white"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm11 0h1m3 0h1m-4 3h4m-4 3h1m3-3v3"/>

            </svg>

        </a>

        <!-- Jurnal -->
        <a href="#"
           class="flex flex-col items-center text-gray-500">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-7 h-7"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 6v6l4 2"/>

            </svg>

            <span class="text-xs mt-1">Jurnal</span>

        </a>

        <!-- Profil -->
        <a href="#"
           class="flex flex-col items-center text-gray-500">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-7 h-7"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M5.121 17.804A9 9 0 1118.879 17.8M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

            </svg>

            <span class="text-xs mt-1">Profil</span>

        </a>

    </div>

</nav>

<!-- Floating Logout -->
<form action="{{ route('logout') }}" method="POST"
      class="fixed top-5 right-5">
    @csrf

    <button
        class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl shadow-lg">

        Logout

    </button>

</form>

<script>

function updateJam(){

    const now=new Date();

    document.getElementById("jam").innerHTML=

    now.toLocaleDateString("id-ID",{

        weekday:"long",

        day:"numeric",

        month:"long",

        year:"numeric"

    })

    +" • "+

    now.toLocaleTimeString("id-ID");

}

setInterval(updateJam,1000);

updateJam();

</script>

</body>
</html>