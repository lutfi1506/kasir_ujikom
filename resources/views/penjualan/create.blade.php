<x-main title="Tambah Transaksi">
    <div class="flex gap-5 items-start">
        <div class="card bg-primary shadow-xl w-full">
            <div class="card-body">
                <table class="table table-sm table-zebra text-center">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th class="max-w-7">No</th>
                            <th>Kode Produk</th>
                            <th class="w-28">Nama Produk</th>
                            <th class="min-w-24">Harga</th>
                            <th>Jumlah</th>
                            <th class="min-w-24">Total</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach ($penjualan->detailPenjualan as $detail)
                            @php
                                $total = $detail->harga * $detail->jumlah;
                                $subtotal += $total;
                            @endphp
                            <tr class="*:p-1">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->kode_produk }}</td>
                                <td>{{ $detail->nama_produk }}</td>
                                <td class="text-end">Rp. {{ number_format($detail->harga, 0, ',', '.') }}</td>
                                <td>{{ $detail->jumlah }}</td>
                                <td class="text-end">Rp. {{ number_format($total, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('penjualan.destroy', $detail->id) }}"
                                        class="btn btn-error btn-sm btn-square"
                                        {{ $penjualan->status == 'selesai' ? 'disabled' : '' }}
                                        data-confirm-delete="true">
                                        <img src="/icon/trash.svg">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end">Subtotal</td>
                            <td colspan="2" class="text-start">Rp. {{ number_format($subtotal, 0, ',', '.') }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="flex flex-col gap-3">
            <div class="card bg-primary shadow-xl">
                <div class="card-body ">
                    <div class="flex justify-between items-center">
                        <section class="text-sm">
                            <p>Penjualan id : {{ $penjualan->id }}</p>
                            <p>Kasir : {{ $penjualan->user->nama_lengkap }}</p>
                            <p>Pelanggan: <br> {{ $penjualan->pelanggan->nama }}</p>
                        </section>
                        <section>
                            <form action="{{ route('penjualan.updatePelanggan', $penjualan->id) }}" class="flex gap-2"
                                method="post">
                                @csrf
                                @method('put')
                                <select name="pelanggan" class="select select-bordered max-w-32"
                                    {{ $penjualan->status == 'selesai' ? 'disabled' : '' }}>
                                    <option disabled selected>Pelanggan</option>
                                    @foreach ($pelanggan as $list)
                                        <option value="{{ $list->id }}" @selected($list->id == $penjualan->pelanggan_id)>
                                            {{ $list->nama . ' - ' . $list->alamat }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-success"
                                    {{ $penjualan->status == 'selesai' ? 'disabled' : '' }}>ubah</button>
                            </form>
                        </section>
                    </div>
                    <form action="{{ route('penjualan.store', $penjualan->id) }}" method="POST" class="flex gap-2   ">
                        @csrf
                        <input list="list-produk" name="kode_produk" placeholder="Kode Produk..."
                            class="input input-bordered w-40" autocomplete="off"
                            {{ $penjualan->status == 'selesai' ? 'disabled' : '' }} required>
                        <input type="number" name="jumlah" min="1" value="{{ $jumlah ?? 1 }}"
                            class="input input-bordered w-14" {{ $penjualan->status == 'selesai' ? 'disabled' : '' }}>
                        <button type="submit" class="btn btn-success"
                            {{ $penjualan->status == 'selesai' ? 'disabled' : '' }}>simpan</button>
                    </form>
                </div>
            </div>
            <div class="card bg-primary shadow-xl">
                <div class="card-body flex flex-col gap-3 ">
                    <section class="bg-warning  px-3 py-2 rounded">
                        <h2 class="text-xl">Subtotal : </h2>
                        <p class="text-4xl font-bold text-end">Rp. {{ number_format($subtotal, 0, ',', '.') }}</p>
                    </section>
                    @if ($penjualan->status == 'selesai')
                        <section class="bg-success px-3 py-2 rounded">
                            <h2 class="text-xl">Bayar : </h2>
                            <p class="text-4xl font-bold text-end">Rp.
                                {{ number_format($penjualan->bayar, 0, ',', '.') }}</p>
                        </section>
                        <section class="bg-info px-3 py-2 rounded">
                            <h2 class="text-xl">Kembali : </h2>
                            <p class="text-4xl font-bold text-end">
                                Rp. {{ number_format($penjualan->bayar - $subtotal, 0, ',', '.') }}
                            </p>
                        </section>
                        <div class="flex gap-2 justify-end">
                            <a class="btn btn-secondary" href="{{ route('penjualan.index') }}">Selesai</a>
                            <a href="{{ route('penjualan.nota', $penjualan->id) }}" class="btn btn-accent"
                                target="_blank"><img src="{{ asset('icon/printer.svg') }}"> Cetak
                                Nota</a>
                        </div>
                    @else
                        <form action="{{ route('penjualan.bayar', $penjualan->id) }}" method="post"
                            class="flex gap-2 justify-end">
                            @csrf
                            <input type="hidden" name="total_harga" value="{{ $subtotal }}">
                            <input type="number" name="bayar" class="input input-bordered w-full"
                                placeholder="Bayar..." value="{{ old('bayar') }}">
                            <button type="submit" class="btn btn-success">Bayar</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <datalist id="list-produk">
        @foreach ($produk as $list)
            <option value="{{ $list->kode_produk }}">{{ $list->nama_produk }} |
                Rp.{{ number_format($list->harga, 0, ',', '.') }} | {{ $list->stok }}
            </option>
        @endforeach
    </datalist>

</x-main>
