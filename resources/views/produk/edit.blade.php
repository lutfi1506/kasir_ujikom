<x-main title="Edit Produk">
    <div class="flex justify-center">
        <div class="bg-primary card shadow-md">
            <div class="card-body">
                <h2 class="text-2xl font-bold font-[montserrat] text-center px-2 mb-3">Edit Produk</h2>
                <form action="{{ route('produk.update', $produk->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="grid grid-cols-6 gap-2">
                        <div class="col-span-6">
                            <label for="kode_produk" class="block text-sm font-medium leading-6 text-gray-900">Kode
                                Produk</label>
                            <div class="mt-2">
                                <input type="text" name="kode_produk" id="kode_produk"
                                    class="input input-bordered w-full" placeholder="kode produk..."
                                    value="{{ old('kode_produk', $produk->kode_produk) }}">
                            </div>
                            <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('kode_produk') }}</p>
                        </div>
                        <div class="col-span-6">
                            <label for="nama_produk" class="block text-sm font-medium leading-6 text-gray-900">Nama
                                Produk</label>
                            <div class="mt-2">
                                <input type="text" name="nama_produk" id="nama_produk"
                                    class="input input-bordered w-full" placeholder="nama produk..."
                                    value="{{ old('nama_produk', $produk->nama_produk) }}">
                            </div>
                            <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('nama_produk') }}</p>
                        </div>

                        <div class="col-span-6 md:col-span-3">
                            <label for="harga"
                                class="block text-sm font-medium leading-6 text-gray-900">Harga</label>
                            <div class="mt-2">
                                <input type="number" name="harga" id="harga" class="input input-bordered w-full"
                                    placeholder="harga" value="{{ old('harga', $produk->harga) }}">
                            </div>
                            <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('harga') }}</p>
                        </div>

                        <div class="col-span-6 md:col-span-3">
                            <label for="stok" class="block text-sm font-medium leading-6 text-gray-900">Stok</label>
                            <div class="mt-2">
                                <input type="number" name="stok" id="stok" class="input input-bordered w-full"
                                    placeholder="stok" value="{{ old('stok', $produk->stok) }}">
                            </div>
                            <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('stok') }}</p>
                        </div>

                        <div class="col-span-6 flex justify-end gap-2">
                            <a href="{{ route('produk.index') }}" class="btn btn-error">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>
