<div class="fixed inset-0 z-30 bg-base-300/50 lg:hidden" x-show="sidebarOpen" @click="sidebarOpen = false"></div>

<div class="fixed inset-y-0 left-0 z-30 w-52 overflow-y-auto bg-secondary
     transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-0"
    :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'">
    <div class="flex items-center justify-center mt-6">
        <span
            class="mx-2 text-2xl font-extrabold text-secondary-content font-[montserrat]">{{ config('app.name') }}</span>
    </div>

    <nav class="mt-10 space-y-2 font-[roboto]">
        <a class="flex items-center px-6 py-2 transition-all text-primary {{ Request::is('/') ? 'bg-neutral' : 'hover:bg-neutral' }}"
            href="/">
            <img src="/icon/dashboard.svg" class="w-6">
            <span class="mx-3">Dashboard</span>
        </a>
        <a class="flex items-center px-6 py-2 transition-all text-primary {{ Request::is('transaksi*') ? 'bg-neutral' : 'hover:bg-neutral' }}"
            href="/transaksi">
            <img src="/icon/cashier.svg" class="w-5">
            <span class="mx-3">Transaksi</span>
        </a>
        <a class="flex items-center px-6 py-2 transition-all text-primary {{ Request::is('laporan*') ? 'bg-neutral' : 'hover:bg-neutral' }}"
            href="/laporan">
            <img src="/icon/laporan.svg" class="w-6">
            <span class="mx-3">Laporan</span>
        </a>
        @can('isAdmin')
            <a class="flex items-center px-6 py-2 transition-all text-primary {{ Request::is('produk*') ? 'bg-neutral' : 'hover:bg-neutral' }}"
                href="/produk">
                <img src="/icon/box2.svg" class="w-6">
                <span class="mx-3">Produk</span>
            </a>
            <a class="flex items-center px-6 py-2 transition-all text-primary {{ Request::is('pelanggan*') ? 'bg-neutral' : 'hover:bg-neutral' }}"
                href="/pelanggan">
                <img src="/icon/user.svg" class="w-6">
                <span class="mx-3">Pelanggan</span>
            </a>
            <a class="flex items-center px-6 py-2 transition-all text-primary {{ Request::is('petugas*') ? 'bg-neutral' : 'hover:bg-neutral' }}"
                href="/petugas">
                <img src="/icon/petugas.svg" class="w-6">
                <span class="mx-3">Petugas</span>
            </a>
        @endcan
        <a class="flex items-center px-6 py-2 transition-all text-primary {{ Request::is('about*') ? 'bg-neutral' : 'hover:bg-neutral' }}"
            href="/about">
            <img src="/icon/about.svg" class="w-6">
            <span class="mx-3">About</span>
        </a>
    </nav>
</div>
