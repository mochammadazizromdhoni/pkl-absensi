<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Absensi Saya</title>

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
    </style>
</head>

<body class="antialiased select-none bg-slate-50">

<div class="min-h-screen pb-32 md:pb-12">
    
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-5 md:py-6 shadow-md sticky top-0 z-40">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-lg md:text-2xl font-bold tracking-wide">Absensi Saya</h1>
                <p id="live-clock" class="text-blue-100 text-xs md:text-sm mt-0.5 font-mono">--:-- WIB — 8 Jul 2026</p>
            </div>
            <a href="{{ route('pkl.dashboard') }}" class="p-2 bg-white/10 rounded-xl hover:bg-white/20 transition flex items-center gap-2 text-xs md:text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="hidden md:inline">Kembali ke Dashboard</span>
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            
            <div class="lg:col-span-2 space-y-6">
                
                <div class="bg-white card-shadow rounded-2xl p-5 md:p-6 border border-slate-100">
                    <div class="flex items-center gap-2 text-slate-800 font-semibold border-b border-slate-100 pb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <h2 class="text-sm md:text-base">Status Hari Ini — 08/07/2026</h2>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-5 bg-slate-50 p-4 rounded-xl">
                        <div class="text-center md:text-left border-r border-slate-200 last:border-0">
                            <p class="text-xs text-slate-400 font-medium uppercase tracking-wider">Jam Masuk</p>
                            <p class="text-2xl md:text-3xl font-bold text-slate-800 mt-1">07:17</p>
                        </div>
                        <div class="text-center md:text-left pl-0 md:pl-4">
                            <p class="text-xs text-slate-400 font-medium uppercase tracking-wider">Jam Pulang</p>
                            <p class="text-2xl md:text-3xl font-bold text-slate-300 mt-1">--:--</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-8 px-2 relative max-w-xl mx-auto">
                        <div class="absolute top-4 left-6 right-6 h-[2px] bg-slate-200 z-0"></div>
                        <div class="absolute top-4 left-6 w-[33%] h-[2px] bg-emerald-500 z-0"></div>

                        <div class="flex flex-col items-center z-10">
                            <div class="w-9 h-9 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold ring-4 ring-emerald-100">
                                ✓
                            </div>
                            <span class="text-[10px] md:text-xs font-medium text-slate-400 mt-1.5">Perangkat</span>
                        </div>

                        <div class="flex flex-col items-center z-10">
                            <div class="w-9 h-9 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold ring-4 ring-emerald-100">
                                2
                            </div>
                            <span class="text-[10px] md:text-xs font-semibold text-blue-600 mt-1.5">Lokasi GPS</span>
                        </div>

                        <div class="flex flex-col items-center z-10">
                            <div class="w-9 h-9 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center text-xs font-bold">
                                3
                            </div>
                            <span class="text-[10px] md:text-xs font-medium text-slate-400 mt-1.5">Selfie</span>
                        </div>

                        <div class="flex flex-col items-center z-10">
                            <div class="w-9 h-9 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center text-xs font-bold">
                                4
                            </div>
                            <span class="text-[10px] md:text-xs font-medium text-slate-400 mt-1.5">Konfirmasi</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-emerald-50 text-emerald-700 rounded-2xl px-5 py-4 flex items-center gap-3 border border-emerald-100 text-sm font-medium shadow-sm">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse shrink-0"></span>
                        <p>GPS aktif. Akurasi: <span class="font-bold">±5m</span></p>
                    </div>

                    <div class="bg-white card-shadow rounded-2xl p-4 border border-slate-100 flex flex-col justify-center">
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Lokasi Kerja</p>
                        <p class="text-sm font-semibold text-slate-700 mt-1">Lapangan / Area Teknisi (radius 5000m)</p>
                    </div>
                </div>

                <div class="bg-white card-shadow rounded-2xl p-5 md:p-6 border border-slate-100 space-y-4">
                    <div class="flex items-center gap-2 text-slate-800 font-semibold border-b border-slate-100 pb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <h2 class="text-sm md:text-base">Selfie Absen Pulang</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                        <div class="w-full aspect-[4/3] bg-slate-900 rounded-2xl flex flex-col items-center justify-center p-6 text-center text-slate-400 relative overflow-hidden border border-slate-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-slate-700 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            </svg>
                            <p class="text-xs">Klik tombol di samping/bawah untuk buka kamera</p>
                        </div>

                        <div class="space-y-3 w-full">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 active:scale-[0.98] text-white font-semibold py-3.5 rounded-xl transition duration-150 flex items-center justify-center gap-2 text-sm shadow-md shadow-blue-600/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                </svg>
                                Buka Kamera
                            </button>

                            <button class="w-full bg-rose-100 text-rose-400 font-semibold py-3.5 rounded-xl cursor-not-allowed text-sm flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Konfirmasi Absen Pulang
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white card-shadow rounded-2xl p-5 md:p-6 border border-slate-100">
                    <div class="flex items-center gap-2 text-slate-800 font-semibold border-b border-slate-100 pb-3 mb-4">
                        <svg xmlns="http://www.w3.org/2000/xl" class="w-5 h-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h2 class="text-sm md:text-base">Riwayat 7 Hari Terakhir</h2>
                    </div>

                    <div class="space-y-4 max-h-[420px] overflow-y-auto pr-1">
                        <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-3 last:border-none last:pb-0">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-700">8 Juli 2026</h4>
                                    <p class="text-xs text-slate-400 mt-0.5">07:17 — --:--</p>
                                </div>
                            </div>
                            <span class="bg-emerald-100 text-emerald-600 font-semibold px-2.5 py-1 rounded-lg text-xs">Hadir</span>
                        </div>

                        <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-3 last:border-none last:pb-0">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-700">7 Juli 2026</h4>
                                    <p class="text-xs text-slate-400 mt-0.5">07:22 — 17:26</p>
                                </div>
                            </div>
                            <span class="bg-emerald-100 text-emerald-600 font-semibold px-2.5 py-1 rounded-lg text-xs">Hadir</span>
                        </div>

                        <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-3 last:border-none last:pb-0">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-700">3 Juli 2026</h4>
                                    <p class="text-xs text-slate-400 mt-0.5">08:02 — 15:02</p>
                                </div>
                            </div>
                            <span class="bg-amber-100 text-amber-600 font-semibold px-2.5 py-1 rounded-lg text-xs">Pulang Cepat</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<nav class="fixed bottom-0 left-0 w-full bg-white/95 backdrop-blur-md border-t border-slate-100 shadow-2xl z-50">
    <div class="max-w-md lg:max-w-7xl mx-auto flex justify-between items-center h-16 px-6 md:px-12 lg:px-24">

        <a href="{{ route('pkl.dashboard') }}" class="flex flex-col items-center justify-center text-slate-400 hover:text-blue-600 w-14 h-full active:scale-95 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="text-[10px] font-medium mt-0.5">Beranda</span>
        </a>

        <a href="#" class="flex flex-col items-center justify-center text-slate-400 hover:text-blue-600 w-14 h-full active:scale-95 transition">
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

        <a href="#" class="flex flex-col items-center justify-center text-slate-400 hover:text-blue-600 w-14 h-full active:scale-95 transition">
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
            <span class="text-[10px] font-medium text-slate-400 group-hover:text-blue-600 mt-0.5">Profil</span>
        </a>

    </div>
</nav>

<script>
    function updateJam(){
        const now = new Date();
        const opsiTanggal = { day: 'numeric', month: 'short', year: 'numeric' };
        const formatWaktu = now.toLocaleTimeString("id-ID", { hour: '2-digit', minute: '2-digit' });
        const formatTanggal = now.toLocaleDateString("id-ID", opsiTanggal);

        document.getElementById("live-clock").innerHTML = `${formatWaktu} WIB — ${formatTanggal}`;
    }
    setInterval(updateJam, 1000);
    updateJam();
</script>

</body>
</html>