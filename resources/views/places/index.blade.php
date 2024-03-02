@extends('layout.index')

@section('container')
    <section class="py-20 mx-4 lg:mx-10">
        <div class="header-area flex mt-3">
            <div class="category-area self-center hidden lg:block">
                <form action="/places/category" method="post">
                    @csrf
                    <select name="category" id="category" class="font-semibold text-lg py-3 bg-transparent" onchange="this.form.submit()">
                        <option value="" class="font-semibold text-lg" selected hidden>Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="search-box self-center relative ml-0 lg:ml-3">
                <img src="/icons/search.svg" class="w-7 mt-3 ml-3 absolute" alt="">
                <form action="/places/search" method="post">
                    <form action="/places/search" method="post">
                        @csrf
                        <input type="text" name="search" class="w-[22rem] md:w-[45rem] lg:w-[65.4rem] font-semibold text-lg py-3 rounded-md pl-14" placeholder="Cari Tempat Wisata Favoritmu ...">
                    </form>
                </form>
            </div>
        </div>

        <div class="category-area self-center block lg:hidden mt-3">
            <select name="category" id="category" class="font-semibold text-lg py-3 bg-transparent">
                <option value="" class="font-semibold text-lg" selected hidden>Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="places-area flex gap-3 flex-wrap mt-2">
            @foreach ($places as $place)
                <div class="place-card w-[10.45rem] md:w-[10.6rem] lg:w-[14.15rem] bg-white rounded-md shadow-md mt-5 cursor-pointer" onclick="location.href='/places/{{ $place->id }}/show'">
                    <img src="{{ asset('/placeimages/' . $place->image) }}" alt="" class="w-[10.45rem] md:w-[10.6rem] lg:w-[14.1rem] h-36 lg:h-48 object-cover rounded-t-md">
                    <div class="text-area mx-2 mt-2">
                        <h1 class="font-semibold text-base lg:text-lg h-16 text-black hover:text-blue-500">{{ $place->name }}</h1>
                        <h3 class="font-semibold text-sm lg:text-base text-green-600 pb-5">Rp. {{ number_format($place->price) }} <span class="text-black opacity-60 text-[10px] lg:text-sm">Tiket per orang</span></h3>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection