<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto">

            <div class="grid grid-cols-4 gap-5">

                <div class="bg-blue-500 text-white rounded-xl p-5 shadow">
                    <h2 class="text-xl font-bold">120</h2>
                    <p>Total Pelanggan</p>
                </div>

                <div class="bg-green-500 text-white rounded-xl p-5 shadow">
                    <h2 class="text-xl font-bold">15</h2>
                    <p>PKL Aktif</p>
                </div>

                <div class="bg-yellow-500 text-white rounded-xl p-5 shadow">
                    <h2 class="text-xl font-bold">8</h2>
                    <p>Teknisi</p>
                </div>

                <div class="bg-red-500 text-white rounded-xl p-5 shadow">
                    <h2 class="text-xl font-bold">30</h2>
                    <p>Tiket Gangguan</p>
                </div>

            </div>

            <div class="bg-white rounded-xl shadow mt-8 p-6">

                <h2 class="text-xl font-bold mb-4">
                    Selamat Datang Administrator 👋
                </h2>

                <p>
                    Anda berhasil login sebagai Admin.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>