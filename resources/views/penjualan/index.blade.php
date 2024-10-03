<x-main title="Transaksi">
    <div class="card bg-primary shadow-xl">
        <div class="card-body">
            <h2 class="text-2xl font-bold px-2 mb-1 font-[montserrat]">Transaksi</h2>
            <div class="flex justify-between items-center">
                <form action="{{ route('penjualan.init') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm font-[montserrat]">
                        Tambah Transaksi
                    </button>
                </form>
                <form class="flex items-center gap-2" action="{{ route('penjualan.index') }}">
                    <input type="date" name="date" class="input input-bordered w-32 sm:w-64"
                        value="{{ $keyword }}">
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
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Tanggal</th>
                        <th class="py-2 px-4">Pelanggan</th>
                        <th class="py-2 px-4">Nama Petugas</th>
                        <th class="py-2 px-4">Status</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualans as $penjualan)
                        <tr>
                            <td class="py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4">{{ $penjualan->updated_at->format('d M Y H:i') }}</td>
                            <td class="py-2 px-4">{{ $penjualan->pelanggan->nama }}</td>
                            <td class="py-2 px-4">{{ $penjualan->user->nama_lengkap }}</td>
                            <td class="py-2 px-4">{{ $penjualan->status }}</td>
                            <td class="py-2 px-4">
                                @if ($penjualan->status == 'selesai')
                                    <a href="{{ route('penjualan.nota', $penjualan->id) }}"
                                        class="btn btn-accent btn-sm" target="_blank">Cetak Nota</a>
                                @else
                                    <a href="{{ route('penjualan.create', $penjualan->id) }}"
                                        class="btn btn-warning btn-sm">Lanjutkan</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>

            </div>
        </div>
    </div>
</x-main>
