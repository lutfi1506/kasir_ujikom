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
            <p class="text-sm">Jl. Raya Timur, Majalengka, Jawa Barat</p>
            <p class="text-sm">Telp. 0821-1111-2222</p>
            {{ str_repeat('=', 75) }}
        </header>
        <main>
            <table class="w-full table-auto">
                <tr>
                    </figure>
                    <td class="font-semibold">Tgl</td>
                    <td>:</td>
                    <td>{{ date('Y-m-d H:i') }}</td>
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
            {{ str_repeat('-', 75) }}
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
            {{ str_repeat('-', 75) }}
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
            {{ str_repeat('-', 75) }}
        </main>
        <footer>
            <p class="text-center text-xs">Terima Kasih atas kepercayaan anda Sampai jumpa kembali</p>
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
