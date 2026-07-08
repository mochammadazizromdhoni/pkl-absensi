<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl">
            Dashboard Teknisi
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto">

            <div class="grid grid-cols-4 gap-5">

                <div class="bg-blue-500 text-white rounded-xl p-5 shadow">
                    <h2 class="text-xl font-bold">30</h2>
                    <p>Tiket Servis</p>
                </div>

                <div class="bg-green-500 text-white rounded-xl p-5 shadow">
                    <h2 class="text-xl font-bold">18</h2>
                    <p>Servis Selesai</p>
                </div>

                <div class="bg-yellow-500 text-white rounded-xl p-5 shadow">
                    <h2 class="text-xl font-bold">12</h2>
                    <p>Servis Diproses</p>
                </div>

                <div class="bg-red-500 text-white rounded-xl p-5 shadow">
                    <h2 class="text-xl font-bold">4</h2>
                    <p>Prioritas Tinggi</p>
                </div>

            </div>

            <div class="bg-white rounded-xl shadow mt-8 p-6">

                <h2 class="text-xl font-bold mb-4">
                    Selamat Datang Teknisi 👋
                </h2>

                <p>
                    Anda berhasil login sebagai Teknisi.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>