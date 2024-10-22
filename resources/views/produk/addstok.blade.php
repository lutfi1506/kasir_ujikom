<x-main title="Tambah Stok">
    <div class="flex justify-center">
        <div class="card w-96 bg-primary shadow-xl">
            <div class="card-body">
                <h2 class="text-2xl font-bold font-[montserrat] text-center">Tambah Stok</h2>
                <form action="{{ route('updatestok') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-6 gap-3">
                        <div class="col-span-6">
                            <label for="kode_produk" class="label">Kode
                                Barang</label>
                            <input list="barang" name="kode_produk" id="kode_produk"
                                class="input input-bordered w-full @error('kode_produk') input-error @enderror"
                                placeholder="kode barang" value="{{ old('kode_produk') }}" required
                                autocomplete="off" />
                            <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('kode_produk') }}</p>
                            <datalist id="barang">
                                @foreach ($produk as $d)
                                    <option value="{{ $d->kode_produk }}">{{ $d->nama_produk }}</option>
                                @endforeach
                            </datalist>
                        </div>

                        <div class="col-span-6">
                            <label for="tambah_stok" class="label">Tambah
                                Stok</label>
                            <input type="number" name="tambah_stok" id="tambah_stok"
                                class="input input-bordered w-full @error('tambah_stok') input-error @enderror"
                                placeholder="tambah stok" value="{{ old('tambah_stok') }}" required />
                            <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('tambah_stok') }}</p>
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
