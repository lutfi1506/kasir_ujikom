<x-main title="Laporan Penjualan">
    <div class="card bg-primary">
        <div class="card-body">
            <div class="flex justify-between">
                <div>
                    <h2 class="text-2xl font-bold px-2 mb-1 font-[montserrat]">Laporan Penjualan</h2>
                    <p class="text-xl ps-2">Bulan {{ $month_detail[number_format(substr($month, 5, 7) - 1)] }}
                        {{ substr($month, 0, 4) }}</p>
                </div>
                <form class="flex items-center gap-2" action="{{ route('laporan') }}">
                    <input type="month" name="month" class="input input-bordered w-32 sm:w-64"
                        value="{{ $month }}">
                    <button type="submit" class="btn btn-square">
                        <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                    </button>
                </form>
            </div>
            <table class="table table-zebra border w-full text-center my-4">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th class="w-6">No</th>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>jumlah</th>
                        <th>Total</th>
                        <th>Nama Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->penjualan->created_at->translatedFormat('d F Y') }}</td>
                            <td>{{ $row->kode_produk }}</td>
                            <td>{{ $row->nama_produk }}</td>
                            <td>Rp. {{ number_format($row->harga, 0, ',', '.') }}</td>
                            <td>{{ $row->jumlah }}</td>
                            <td>Rp. {{ number_format($row->jumlah * $row->harga, 0, ',', '.') }}</td>
                            <td>{{ $row->penjualan->user->nama_lengkap }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <a href="{{ route('laporan.print', ['month' => $month]) }}" target="_blank"
                    class="btn btn-accent btn-sm">
                    <img src="{{ asset('icon/printer.svg') }}">
                    Print
                </a>
            </div>
        </div>
    </div>
</x-main>
