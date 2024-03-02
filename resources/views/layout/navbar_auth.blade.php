<nav class="flex justify-between px-7 lg:px-10 bg-blue-800 py-4 shadow-md fixed top-0 left-0 right-0 z-30">
    <div class="logo-area self-center">
        <h1 class="font-bold text-2xl text-white">E-Wisata</h1>
    </div>
    <div class="navlist flex flex-col lg:flex-row list-none self-auto lg:self-center gap-0 lg:gap-16 ml-10 mt-12 lg:mt-0 w-full lg:w-auto h-dvh lg:h-auto bg-blue-800 text-center lg:text-left absolute lg:static justify-evenly lg:justify-normal translate-x-full lg:translate-x-0">
        <li class="text-white font-semibold text-xl hover:text-blue-500"><a href="/">Beranda</a></li>
        <li class="text-white font-semibold text-xl hover:text-blue-500"><a href="/bookings">Pesanan</a></li>
        <li class="text-white font-semibold text-xl hover:text-blue-500"><a href="/places">Wisata</a></li>
        @if (auth()->user()->is_instructor == 1)
            <li class="text-white font-semibold text-xl hover:text-blue-500"><a href="/myplaces">Kelola</a></li>
        @endif
        @if (auth()->user()->is_instructor != 1)
            <li class="text-white font-semibold text-xl hover:text-blue-500"><a href="/">Testimoni</a></li>
        @endif
        <li class="text-white font-semibold text-xl hover:text-blue-500 block lg:hidden"><a href="/logout">Logout</a></li>
    </div>

    <div class="auth-area hidden lg:flex gap-2">
        <button class="px-8 py-2 font-semibold text-black text-base bg-white hover:bg-slate-200 rounded-md" onclick="location.href='/logout'">Logout</button>
    </div>
    <div class="menu-area menu block lg:hidden">
        <img src="/icons/menu-bg-dark.svg" class="w-7" alt="">
    </div>
</nav>