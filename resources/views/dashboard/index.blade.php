<x-main title="Dashboard">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
        <x-card label="Jumlah Transaksi" :count="$jumlah_transaksi" icon="cashier-dark.svg" :persen="$persen_jumlah_transaksi" />
        <x-card label="Omzet Penjualan" count="Rp. {{ number_format($total_penjualan, 0, ',', '.') }}" icon="cash.svg"
            :persen="$persen_penjualan" />
        <x-card label="Unit Terjual" count="{{ number_format($total_produk, 0, ',', '.') }}" icon="box-dark.svg"
            :persen="$persen_produk" />
        <x-card label="Unit Terjual" count="{{ number_format($total_produk, 0, ',', '.') }}" icon="box-dark.svg"
            :persen="$persen_penjualan" />
    </div>
    <div class="flex flex-row gap-5 mt-5">
        <div class="basis-2/3">
            <div class="card bg-primary">
                <div class="card-body">
                    <h2 class="card-title">Omzet Penjualan</h2>
                    <canvas id="acquisitions"></canvas>
                </div>
            </div>
        </div>
        <div class="basis-1/3">
            <div class="card bg-primary">
                <div class="card-body">
                    <h2 class="card-title">Stok Barang</h2>
                    <canvas id="barang"></canvas>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/chart1.js')
    <script>
        window.penjualan = @json($grafik_penjualan);
        window.barang = @json($grafik_barang)
    </script>
</x-main>
