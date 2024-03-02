@extends('layout.index')

@section('container')
    <section class="py-20 mx-4 lg:mx-10">
       
        <div class="header flex justify-between mt-3">
            <h1 class="font-semibold text-2xl">Kelola Wisata</h1>
            <button onclick="location.href='/mybookings'" class="px-10 py-2 font-semibold text-white bg-sky-700 hover:bg-sky-800 rounded-md">Kelola Pesanan</button>
        </div>

        <div class="places-area flex gap-3 flex-wrap mt-2">

            <div class="create-place-card w-[10.45rem] md:w-[10.6rem] lg:w-[14.15rem] bg-white hover:bg-slate-200 rounded-md shadow-md mt-5 cursor-pointer border-2 border-dashed border-black h-[19rem] md:h-[19rem] lg:h-[22rem]" onclick="location.href='/myplaces/create'">
                <div class="content-area flex flex-col justify-center h-full">
                    <img src="/icons/plus.svg" class="w-16 self-center" alt="">
                    <h1 class="font-semibold text-lg self-center mt-10">Tambah Wisata</h1>
                </div>
            </div>

            @foreach ($places as $place)
                <div class="place-card w-[10.45rem] md:w-[10.6rem] lg:w-[14.15rem] bg-white rounded-md shadow-md mt-5 cursor-pointer">
                    <img src="{{ asset('/placeimages/' . $place->image) }}" alt="" class="w-[10.45rem] md:w-[10.6rem] lg:w-[14.15rem] h-36 lg:h-48 object-cover rounded-t-md">
                    <div class="text-area mx-2 mt-2">
                        <h1 class="font-semibold text-base lg:text-lg h-16 text-black hover:text-blue-500">{{ $place->name }}</h1>
                        <h3 class="font-semibold text-[10px] lg:text-base text-green-600">Rp. {{ number_format($place->price) }} <span class="text-black opacity-60 text-[10px] lg:text-sm">Tiket per orang</span></h3>
                    </div>
                    <div class="auth-area flex gap-2 mx-2 mt-2 pb-3">
                        <button class="p-2 bg-emerald-600 hover:bg-emerald-600 rounded-md" onclick="location.href='/places/{{ $place->id }}/show'"><img src="/icons/eye.svg" class="w-3 lg:w-5" alt=""></button>
                        <button class="p-2 bg-yellow-400 hover:bg-yellow-600 rounded-md" onclick="location.href='/myplaces/{{ $place->id }}/edit'"><img src="/icons/pencil.svg" class="w-3 lg:w-5" alt=""></button>
                        <form action="/myplaces/{{ $place->id }}/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="confirm('Yakin Hapus?')" class="p-2 bg-red-600 hover:bg-red-600 rounded-md"><img src="/icons/trash.svg" class="w-3 lg:w-5" alt=""></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection