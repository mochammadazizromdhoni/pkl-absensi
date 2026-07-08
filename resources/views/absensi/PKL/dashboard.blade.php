<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Dashboard PKL</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        body {
            background: #F8FAFC;
            color: #1E293B;
            -webkit-tap-highlight-color: transparent;
        }

        .card-shadow {
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05), 0 2px 12px -4px rgba(0, 0, 0, 0.03);
        }

        .menu-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px -5px rgba(37, 99, 235, 0.1), 0 8px 10px -6px rgba(37, 99, 235, 0.05);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;  
            scrollbar-width: none;  
        }
    </style>
</head>

<body class="antialiased select-none">

<div class="min-h-screen pb-32">

    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-b-[40px] shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <div class="flex justify-between items-center gap-4">
                
                <div class="flex items-center gap-4 min-w-0">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=2563eb&bold=true"
                         alt="Avatar" 
                         class="w-14 h-14 rounded-2xl border-2 border-white/50 shadow-md object-cover flex-shrink-0">
                    <div class="min-w-0">
                        <p class="text-blue-100 text-sm font-medium tracking-wide">Selamat Datang 👋</p>
                        <h1 class="text-2xl font-bold text-white leading-tight truncate">{{ Auth::user()->name }}</h1>
                        <p id="jam" class="text-blue-200/90 text-xs mt-1 font-mono bg-white/10 px-2.5 py-0.5 rounded-md inline-block truncate max-w-full"></p>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="flex-shrink-0">
                    @csrf
                    <button type="submit" 
                            class="flex items-center gap-2 bg-white/10 hover:bg-red-500/20 hover:text-red-300 text-white font-medium px-4 py-2.5 rounded-xl transition duration-300 border border-white/10 backdrop-blur-sm group">
                        <svg xmlns="http://www.w3.org/2000/xl" class="w-5 h-5 text-blue-200 group-hover:text-red-300 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="text-sm hidden sm:inline">Keluar</span>
                    </button>
                </form>

            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-5 mt-8 space-y-8">

        <div class="bg-white card-shadow rounded-3xl p-6 border border-slate-100">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 border-b border-slate-100 pb-5">
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Absensi Hari Ini</h2>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        <p class="text-sm text-slate-500">Status: <span class="text-red-500 font-semibold">Belum Absen</span></p>
                    </div>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 active:scale-95 text-white font-semibold px-8 py-3.5 rounded-2xl shadow-md shadow-blue-600/20 transition duration-150 flex items-center justify-center gap-2 w-full sm:w-auto">
                    <a href="{{ route('pkl.absensi') }}" class="bg-blue-600 hover:bg-blue-700 active:scale-95 text-white font-semibold px-8 py-3.5 rounded-2xl shadow-md shadow-blue-600/20 transition duration-150 flex items-center justify-center gap-2 w-full sm:w-auto text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Absen Sekarang
                    </a>
                </button>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
                <div class="bg-blue-50/60 rounded-2xl p-4 border border-blue-100/50">
                    <p class="text-xs font-medium text-blue-600 uppercase tracking-wider">Jam Masuk</p>
                    <h1 class="text-2xl font-bold text-slate-700 mt-1">-- : --</h1>
                </div>

                <div class="bg-rose-50/60 rounded-2xl p-4 border border-rose-100/50">
                    <p class="text-xs font-medium text-rose-600 uppercase tracking-wider">Jam Pulang</p>
                    <h1 class="text-2xl font-bold text-slate-700 mt-1">-- : --</h1>
                </div>

                <div class="bg-emerald-50/60 rounded-2xl p-4 border border-emerald-100/50">
                    <p class="text-xs font-medium text-emerald-600 uppercase tracking-wider">Lokasi</p>
                    <h1 class="text-sm font-semibold text-slate-600 mt-2 truncate">Belum Terdeteksi</h1>
                </div>

                <div class="bg-amber-50/60 rounded-2xl p-4 border border-amber-100/50">
                    <p class="text-xs font-medium text-amber-600 uppercase tracking-wider">Face ID</p>
                    <h1 class="text-sm font-semibold text-slate-600 mt-2">Belum Verifikasi</h1>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white card-shadow rounded-2xl p-5 border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xl flex-shrink-0">20</div>
                <div class="min-w-0">
                    <p class="text-sm font-semibold text-slate-700 truncate">Hadir</p>
                    <p class="text-xs text-slate-400 truncate">Hari Kerja</p>
                </div>
            </div>

            <div class="bg-white card-shadow rounded-2xl p-5 border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-xl flex-shrink-0">2</div>
                <div class="min-w-0">
                    <p class="text-sm font-semibold text-slate-700 truncate">Izin</p>
                    <p class="text-xs text-slate-400 truncate">Berkas/Sakit</p>
                </div>
            </div>

            <div class="bg-white card-shadow rounded-2xl p-5 border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center font-bold text-xl flex-shrink-0">0</div>
                <div class="min-w-0">
                    <p class="text-sm font-semibold text-slate-700 truncate">Alpha</p>
                    <p class="text-xs text-slate-400 truncate">Sengaja</p>
                </div>
            </div>

            <div class="bg-white card-shadow rounded-2xl p-5 border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xl flex-shrink-0">18</div>
                <div class="min-w-0">
                    <p class="text-sm font-semibold text-slate-700 truncate">Jurnal</p>
                    <p class="text-xs text-slate-400 truncate">Telah Terisi</p>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-xl font-bold text-slate-800 mb-4">Menu Cepat</h2>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                
                <div class="bg-white card-shadow menu-card rounded-2xl p-5 text-center border border-slate-100 cursor-pointer group">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl mx-auto flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-sm text-slate-700 mt-4">Jurnal</h3>
                </div>

                <div class="bg-white card-shadow menu-card rounded-2xl p-5 text-center border border-slate-100 cursor-pointer group">
                    <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl mx-auto flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-sm text-slate-700 mt-4">Rekap</h3>
                </div>

                <div class="bg-white card-shadow menu-card rounded-2xl p-5 text-center border border-slate-100 cursor-pointer group">
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl mx-auto flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-sm text-slate-700 mt-4">Tempat PKL</h3>
                </div>

                <div class="bg-white card-shadow menu-card rounded-2xl p-5 text-center border border-slate-100 cursor-pointer group">
                    <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-xl mx-auto flex items-center justify-center group-hover:bg-teal-600 group-hover:text-white transition duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-sm text-slate-700 mt-4">Profil</h3>
                </div>

            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-6">
            
            <div class="bg-white card-shadow rounded-3xl p-6 border border-slate-100">
                <div class="flex items-center gap-2 mb-5 border-b border-slate-100 pb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.414m-2.242-2.242L21 3m-3.6 3.6L21 3m0 0l-3.6 3.6M13 18h.01M13 14h.01M13 10h.01M10 18h.01M10 14h.01M10 10h.01M7 18h.01M7 14h.01M7 10h.01" />
                    </svg>
                    <h2 class="text-lg font-bold text-slate-800">Pengumuman Internal</h2>
                </div>

                <div class="space-y-4 max-h-[320px] overflow-y-auto pr-1 no-scrollbar">
                    <div class="bg-blue-50/60 p-4 rounded-2xl border border-blue-100/50">
                        <h3 class="font-semibold text-slate-800 text-sm">Briefing Pagi</h3>
                        <p class="text-slate-500 text-xs mt-1 leading-relaxed">Briefing koordinasi harian akan dimulai pukul 08.00 WIB secara tatap muka di ruang utama.</p>
                    </div>

                    <div class="bg-emerald-50/60 p-4 rounded-2xl border border-emerald-100/50">
                        <h3 class="font-semibold text-slate-800 text-sm">Jurnal Harian</h3>
                        <p class="text-slate-500 text-xs mt-1 leading-relaxed">Pemberitahuan: Mohon untuk mengisi rangkuman aktivitas jurnal harian sebelum melakukan absen pulang.</p>
                    </div>

                    <div class="bg-amber-50/60 p-4 rounded-2xl border border-amber-100/50">
                        <h3 class="font-semibold text-slate-800 text-sm">Ketentuan Seragam</h3>
                        <p class="text-slate-500 text-xs mt-1 leading-relaxed">Diingatkan kembali kepada seluruh peserta PKL, untuk hari Jumat wajib menggunakan pakaian batik rapi.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white card-shadow rounded-3xl p-6 border border-slate-100">
                <div class="flex items-center gap-2 mb-5 border-b border-slate-100 pb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-lg font-bold text-slate-800">Riwayat Absensi Terakhir</h2>
                </div>

                <div class="space-y-3.5">
                    <div class="flex justify-between items-center border-b border-slate-50 pb-3">
                        <div>
                            <h3 class="font-semibold text-slate-700 text-sm">Senin</h3>
                            <p class="text-xs text-slate-400 mt-0.5">07 Juli 2026</p>
                        </div>
                        <span class="bg-emerald-100/70 text-emerald-600 font-medium px-3 py-1 rounded-xl text-xs">Hadir</span>
                    </div>

                    <div class="flex justify-between items-center border-b border-slate-50 pb-3">
                        <div>
                            <h3 class="font-semibold text-slate-700 text-sm">Minggu</h3>
                            <p class="text-xs text-slate-400 mt-0.5">06 Juli 2026</p>
                        </div>
                        <span class="bg-emerald-100/70 text-emerald-600 font-medium px-3 py-1 rounded-xl text-xs">Hadir</span>
                    </div>

                    <div class="flex justify-between items-center border-b border-slate-50 pb-3">
                        <div>
                            <h3 class="font-semibold text-slate-700 text-sm">Sabtu</h3>
                            <p class="text-xs text-slate-400 mt-0.5">05 Juli 2026</p>
                        </div>
                        <span class="bg-amber-100/70 text-amber-600 font-medium px-3 py-1 rounded-xl text-xs">Izin</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-semibold text-slate-700 text-sm">Jumat</h3>
                            <p class="text-xs text-slate-400 mt-0.5">04 Juli 2026</p>
                        </div>
                        <span class="bg-emerald-100/70 text-emerald-600 font-medium px-3 py-1 rounded-xl text-xs">Hadir</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<nav class="fixed bottom-0 left-0 w-full bg-white/95 backdrop-blur-md border-t border-slate-100 shadow-2xl z-50">
    <div class="max-w-md mx-auto flex justify-between items-center h-16 px-4">

        <a href="{{ route('pkl.dashboard') }}" class="flex flex-col items-center justify-center text-blue-600 w-14 h-full active:scale-95 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="text-[10px] font-medium mt-0.5">Beranda</span>
        </a>

        <a href="#" class="flex flex-col items-center justify-center text-slate-400 hover:text-slate-600 w-14 h-full active:scale-95 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
            </svg>
            <span class="text-[10px] font-medium mt-0.5">Rekap</span>
        </a>

        <div class="relative w-16 h-full flex items-center justify-center">
            <a href="{{ route('pkl.absensi') }}" class="absolute -top-5 bg-gradient-to-tr from-blue-600 to-indigo-600 w-14 h-14 rounded-full flex items-center justify-center border-4 border-white shadow-lg shadow-blue-600/30 active:scale-90 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </a>
        </div>

        <a href="#" class="flex flex-col items-center justify-center text-slate-400 hover:text-slate-600 w-14 h-full active:scale-95 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <span class="text-[10px] font-medium mt-0.5">Jurnal</span>
        </a>

        <a href="#" class="flex flex-col items-center justify-center w-14 h-full active:scale-95 transition group">
            <div class="w-6 h-6 rounded-full overflow-hidden border border-slate-300 group-hover:border-blue-500 transition shadow-sm">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=2563eb&color=ffffff&bold=true" 
                     alt="Foto Profil" 
                     class="w-full h-full object-cover">
            </div>
            <span class="text-[10px] font-medium text-slate-400 group-hover:text-slate-600 mt-0.5">Profil</span>
        </a>

    </div>
</nav>

<script>
    function updateJam(){
        const now = new Date();
        const opsiTanggal = {
            weekday: "long",
            day: "numeric",
            month: "long",
            year: "numeric"
        };
        
        const formatWaktu = now.toLocaleTimeString("id-ID", { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        const formatTanggal = now.toLocaleDateString("id-ID", opsiTanggal);

        document.getElementById("jam").innerHTML = `${formatTanggal} • ${formatWaktu} WIB`;
    }

    setInterval(updateJam, 1000);
    updateJam();
</script>

</body>
</html>