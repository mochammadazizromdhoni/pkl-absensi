<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">
            Dashboard PKL
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-xl shadow-lg p-6 text-white mb-6">
                <h1 class="text-3xl font-bold">
                    👋 Selamat Datang, {{ Auth::user()->name }}
                </h1>

                <p class="mt-2 text-blue-100">
                    Semangat menjalankan PKL hari ini! 🚀
                </p>
            </div>

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

                <div class="bg-white rounded-xl shadow p-5 border-l-4 border-green-500">
                    <h3 class="text-gray-500">🟢 Hadir</h3>
                    <h1 class="text-4xl font-bold text-green-600 mt-2">20</h1>
                    <p class="text-gray-500">Hari</p>
                </div>

                <div class="bg-white rounded-xl shadow p-5 border-l-4 border-yellow-500">
                    <h3 class="text-gray-500">🟡 Izin</h3>
                    <h1 class="text-4xl font-bold text-yellow-500 mt-2">2</h1>
                    <p class="text-gray-500">Hari</p>
                </div>

                <div class="bg-white rounded-xl shadow p-5 border-l-4 border-red-500">
                    <h3 class="text-gray-500">🔴 Alpha</h3>
                    <h1 class="text-4xl font-bold text-red-500 mt-2">0</h1>
                    <p class="text-gray-500">Hari</p>
                </div>

                <div class="bg-white rounded-xl shadow p-5 border-l-4 border-blue-500">
                    <h3 class="text-gray-500">📖 Jurnal</h3>
                    <h1 class="text-4xl font-bold text-blue-600 mt-2">15</h1>
                    <p class="text-gray-500">Laporan</p>
                </div>

            </div>

            <!-- Status -->
            <div class="bg-white rounded-xl shadow p-6 mb-6">

                <h2 class="text-xl font-bold mb-4">
                    📍 Status Absensi Hari Ini
                </h2>

                <div class="grid md:grid-cols-3 gap-4">

                    <div class="bg-gray-100 rounded-lg p-4">
                        <h3 class="font-semibold">Status</h3>
                        <p class="text-red-600 mt-2">Belum Absen</p>
                    </div>

                    <div class="bg-gray-100 rounded-lg p-4">
                        <h3 class="font-semibold">Lokasi</h3>
                        <p class="mt-2">Belum Terdeteksi</p>
                    </div>

                    <div class="bg-gray-100 rounded-lg p-4">
                        <h3 class="font-semibold">Face Recognition</h3>
                        <p class="mt-2">Belum Verifikasi</p>
                    </div>

                </div>

                <div class="mt-6 flex gap-4">

                    <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow">
                        ✅ Absen Masuk
                    </button>

                    <button class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg shadow">
                        🚪 Absen Pulang
                    </button>

                </div>

            </div>

            <!-- Riwayat -->
            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="text-xl font-bold mb-4">
                    📅 Riwayat Absensi
                </h2>

                <table class="w-full text-left">

                    <thead class="bg-blue-600 text-white">

                        <tr>
                            <th class="p-3">Tanggal</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Masuk</th>
                            <th class="p-3">Pulang</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr class="border-b">
                            <td class="p-3">06 Juli 2026</td>
                            <td class="text-green-600">Hadir</td>
                            <td>08:00</td>
                            <td>-</td>
                        </tr>

                        <tr class="border-b">
                            <td class="p-3">05 Juli 2026</td>
                            <td class="text-green-600">Hadir</td>
                            <td>07:58</td>
                            <td>16:01</td>
                        </tr>

                        <tr>
                            <td class="p-3">04 Juli 2026</td>
                            <td class="text-yellow-500">Izin</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>