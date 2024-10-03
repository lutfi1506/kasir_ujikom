<x-main title="Petugas">
    <div class="card bg-primary shadow-xl">
        <div class="card-body">
            <h2 class="text-2xl font-bold font-[montserrat] px-2 mb-1">Daftar Petugas</h2>
            <div class="flex justify-between items-center">
                <a href="{{ route('petugas.create') }}" class="btn btn-success btn-sm">
                    Tambah Petugas
                </a>
                <form class="flex items-center gap-2" action="{{ route('petugas.index') }}">
                    <input class="input input-bordered w-32 sm:w-64" name="search" type="text"
                        placeholder="Search..." value="{{ $search }}" autocomplete="off">
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
            <table class="table table-zebra w-full text-center my-4 border">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Nama Lengkap</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">Level</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4">{{ $user->nama_lengkap }}</td>
                            <td class="py-2 px-4">{{ $user->email }}
                            </td>
                            <td class="py-2 px-4">
                                {{ $user->level }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('petugas.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('petugas.destroy', $user->id) }}" class="btn btn-error btn-sm"
                                    data-confirm-delete="true">Hapus</a>
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