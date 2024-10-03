<x-guest>
    <div class="flex h-full justify-center items-center">
        <div class="card glass backdrop-blur-sm w-96">
            <div class="card-body">
                <h2 class="text-center text-3xl font-bold text-white">Login</h2>
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-6 gap-3">
                        <div class="col-span-6">
                            <label for="email" class="label text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="input input-bordered w-full @error('email') input-error @enderror"
                                placeholder="Email..." value="{{ old('email') }}" required />
                        </div>

                        <div class="col-span-6">
                            <label for="password" class="label text-white">Password</label>
                            <input type="password" name="password" id="password"
                                class="input input-bordered w-full @error('password') input-error @enderror"
                                placeholder="Password..." required />
                        </div>

                        <div class="col-span-6 flex justify-end gap-2">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-guest>
