<x-main title="Produk">
    <div class="card bg-primary shadow-xl">
        <div class="card-body">
            <h2 class="text-2xl font-bold font-[montserrat]">Daftar Produk</h2>
            <div class="flex justify-between items-end">
                <span class="flex gap-3">
                    <a href="{{ route('produk.create') }}" class="btn btn-success btn-sm font-[montserrat]">Tambah
                        Produk</a>
                    <a href="{{ route('addstok') }}" class="btn btn-info btn-sm font-[montserrat]">Tambah Stok</a>
                </span>
                <form class="flex items-center gap-2" action="{{ route('produk.index') }}">
                    <input class="input input-bordered w-32 sm:w-64" name="search" type="text"
                        placeholder="Search..." value="{{ $keyword }}">
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
            <table class="table table-zebra w-full text-center my-3 border">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Kode Produk</th>
                        <th class="px-4 py-2">Nama Produk</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Stok</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($produks as $produk)
                            <td class="px-4 py-2">{{ $loop->index + $produks->firstItem() }}</td>
                            <td class="px-4 py-2">{{ $produk->kode_produk }}</td>
                            <td class="px-4 py-2">{{ $produk->nama_produk }}</td>
                            <td class="px-4 py-2">
                                {{ 'Rp. ' . number_format($produk->harga, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $produk->stok === 0 ? 'habis' : $produk->stok }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm ">
                                    <img src="{{ asset('icon/edit.svg') }}">
                                </a>
                                <a href="{{ route('produk.destroy', $produk->id) }}" class="btn btn-error btn-sm"
                                    data-confirm-delete="true">
                                    <img src="{{ asset('icon/trash.svg') }}" alt="">
                                </a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $produks->links() }}
        </div>
    </div>
</x-main>
