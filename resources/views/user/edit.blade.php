<x-main title="Tambah Petugas">
    <div class="flex justify-center">
        <div class="bg-primary py-6 px-6 rounded-md shadow-md max-w-96 flex-1">
            <h2 class="text-2xl text-center font-semibold px-2 mb-3 font-[montserrat]">Edit Petugas</h2>
            <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-6 gap-2">
                    <div class="col-span-6">
                        <label for="nama_lengkap" class="block text-sm font-medium leading-6 text-gray-900">Nama
                            Lengkap</label>
                        <div class="mt-2">
                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                class="input input-sm input-bordered w-full @error('nama_lengkap') input-error @enderror"
                                placeholder="nama lengkap..." value="{{ old('nama_lengkap', $petugas->nama_lengkap) }}"
                                required>
                        </div>
                        <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('nama_lengkap') }}</p>
                    </div>

                    <div class="col-span-6">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email"
                                class="input input-bordered input-sm w-full @error('email') input-error @enderror"
                                placeholder="email..." value="{{ old('email', $petugas->email) }}" required>
                        </div>
                        <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('email') }}</p>
                    </div>

                    <div class="col-span-6">
                        <p class="block text-sm font-medium leading-6 text-gray-900">Level</p>
                        <div class="mt-2">
                            <label class="label justify-start gap-3 cursor-pointer">
                                <input type="radio" name="level" value="petugas" class="radio"
                                    {{ old('level', $petugas->level) == 'petugas' ? 'checked' : '' }} />
                                <span class="label-text">petugas</span>
                            </label>
                            <label class="label justify-start gap-3 cursor-pointer">
                                <input type="radio" name="level" value="admin" class="radio"
                                    {{ old('level', $petugas->level) == 'admin' ? 'checked' : '' }} />
                                <span class="label-text">admin</span>
                            </label>
                        </div>
                        <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('level') }}</p>
                    </div>


                    <div class="col-span-6">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input type="password" name="password" id="password"
                                class="input input-sm input-bordered w-full @error('password') input-error @enderror"
                                placeholder="Pasword...">
                        </div>
                        <p class="mt-2 text-sm leading-6 text-red-600">{{ $errors->first('password') }}</p>
                    </div>
                    <div class="col-span-6">
                        <label for="password_confirmation"
                            class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi
                            Password</label>
                        <div class="mt-2">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="input input-sm input-bordered w-full" placeholder="Pasword...">
                        </div>
                    </div>

                    <div class="col-span-6 flex items-center justify-end gap-2">
                        <a href="{{ route('petugas.index') }}" class="btn btn-error">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-main>
