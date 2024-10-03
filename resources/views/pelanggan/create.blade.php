<x-main title="Tambah pelanggan">
    <div class="flex justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="text-2xl font-bold font-[montserrat] text-center">Tambah pelanggan</h2>
                <form action="{{ route('pelanggan.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-6 gap-3">
                        <div class="col-span-6">
                            <label for="nama" class="label">Nama</label>
                            <input type="text" name="nama" id="nama"
                                class="input input-bordered w-full @error('nama') input-error @enderror"
                                placeholder="Nama..." value="{{ old('nama') }}" required />
                            <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('nama') }}</p>
                        </div>

                        <div class="col-span-6">
                            <label for="alamat" class="label">Alamat</label>
                            <textarea name="alamat" id="alamat"
                                class="textarea textarea-bordered w-full @error('alamat') textarea-error @enderror" placeholder="Alamat..."
                                required>{{ old('alamat') }}</textarea>
                            <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('alamat') }}</p>
                        </div>

                        <div class="col-span-6">
                            <label for="no_telp" class="label">No Telepon</label>
                            <input type="tel" name="no_telp" id="no_telp"
                                class="input input-bordered w-full @error('no_telp') input-error @enderror"
                                placeholder="No telepon..." value="{{ old('no_telp') }}" required />
                            <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('no_telp') }}</p>
                        </div>

                        <div class="col-span-6 flex justify-end gap-2">
                            <a href="{{ route('pelanggan.index') }}" class="btn btn-error">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>
