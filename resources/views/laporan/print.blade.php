<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        @page {
            size: landscape;
            margin: 0;
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body>
    @php
        $subtotal = 0;
    @endphp
    <div class="max-w-fit mx-auto p-5">
        <header class="text-center mb-3">
            <h1 class="font-bold text-2xl">BerkahCELL</h1>
            <p class="text-xs">Jl. Raya Timur, Majalengka, Jawa Barat</p>
            <p class="text-xs">Telp. 0821-1111-2222</p>
        </header>
        <table class="min-w-ful mx-auto">
            <thead class="border-y border-black ">
                <tr>
                    <th class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        No
                    </th>
                    <th class="px-6  py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Kode
                    </th>
                    <th class="px-6  py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nama Produk
                    </th>
                    <th class="px-6  py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Harga
                    </th>
                    <th class="px-6  py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Jumlah
                    </th>
                    <th class="px-6  py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Total
                    </th>
                    <th class="px-6  py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nama Petugas
                    </th>
                </tr>
            </thead>
            <tbody class="border-b border-black">
                @foreach ($detail as $item)
                    <tr>
                        <td class="px-6 py-0.5 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-0.5 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $item->kode_produk }}
                        </td>
                        <td class="px-6 py-0.5 whitespace-nowrap text-sm text-gray-500">{{ $item->nama_produk }}</td>
                        <td class="px-6 py-0.5 whitespace-nowrap text-sm text-end text-gray-500">
                            {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-0.5 whitespace-nowrap text-sm text-center text-gray-500">{{ $item->jumlah }}
                        </td>
                        <td class="px-6 py-0.5 whitespace-nowrap text-sm text-gray-500 text-end">
                            {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-0.5 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->penjualan->user->nama_lengkap }}
                        </td>
                    </tr>
                    @php
                        $subtotal += $item->harga * $item->jumlah;
                    @endphp
                @endforeach
            </tbody>
            <tfoot class="border-b border-black">
                <tr>
                    <td colspan="5">Jumlah</td>
                    <td class="px-6 text-end whitespace-nowrap text-sm">{{ number_format($subtotal, 0, ',', '.') }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <table class="w-full mt-10">
            <tr>
                <td></td>
                <td class="w-52 border-b border-black">
                    <p class="text-sm text-center">Majalengka, {{ strftime('%d %B %Y') }}<br>
                        Direktur,
                        <br><br><br><br><br>
                    </p>
                </td>
            </tr>
        </table>
    </div>
    <script>
        window.print();
        setTimeout(() => {
            window.close();
        }, 1000);
    </script>
</body>

</html>
