<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota</title>
    @vite('resources/css/app.css')
    <style>
        @media print {
            @page {
                size: 80mm auto;
                margin: 0;
            }
        }
    </style>
</head>

<body class="font-[consolas]">
    <div class="w-[80mm] p-2 flex flex-col overflow-hidden text-xs">
        <header class="text-center mb-2">
            <h1 class="font-bold text-2xl">BerkahCELL</h1>
            <p class="text-xs">Jl. Raya Timur, Majalengka, Jawa Barat</p>
            <p class="text-xs">Telp. 0821-1111-2222</p>
            <div class="border-y my-1 pt-0.5 border-black border-dashed"></div>
        </header>
        <main>
            <table class="w-full table-auto">
                <tr>
                    <td class="font-semibold">Tgl</td>
                    <td>:</td>
                    <td>{{ $penjualan->updated_at }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Id</td>
                    <td>:</td>
                    <td>{{ $penjualan->id }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Pelanggan</td>
                    <td>:</td>
                    <td>{{ $penjualan->pelanggan->nama }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Kasir</td>
                    <td>:</td>
                    <td>{{ $penjualan->user->nama_lengkap }}</td>
                </tr>
            </table>
            <div class="border-t border-black my-3 border-dashed"></div>
            <table class="w-full">
                @foreach ($penjualan->detailPenjualan as $detail)
                    <tr>
                        <td colspan="4">{{ $detail->nama_produk }}</td>
                    </tr>
                    <tr>
                        <td>{{ $detail->jumlah }}</td>
                        <td>X</td>
                        <td>{{ number_format($detail->harga, 0, ',', '.') }}</td>
                        <td class="text-right">Rp.
                            {{ number_format($detail->jumlah * $detail->harga, 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="border-t border-black my-3 border-dashed"></div>
            <table class="w-full">
                <tr>
                    <td>Total</td>
                    <td class="text-right">Rp. {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Bayar</td>
                    <td class="text-right">Rp. {{ number_format($penjualan->bayar, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Kembali</td>
                    <td class="text-right">Rp.
                        {{ number_format($penjualan->bayar - $penjualan->total_harga, 0, ',', '.') }}</td>
                </tr>
            </table>
            <div class="border-t border-black my-3 border-dashed"></div>
        </main>
        <footer>

            <p class="text-center text-xs">Terima Kasih atas kepercayaan anda <br> Sampai jumpa kembali</p>
        </footer>
    </div>
    <script>
        window.print();
        setTimeout(() => {
            window.close();
        }, 1000);
    </script>
</body>

</html>
