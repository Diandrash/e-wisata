@extends('layout.index')

@section('container')
    <section class="py-20 mx-4 lg:mx-10 mt-3">
        <div class="content-area flex flex-wrap">
            <div class="image-area">
                <img src="{{ asset('/placeimages/' . $place->image) }}" alt="" class="w-[30rem] md:w-[50rem] lg:w-[30rem]">
            </div>
            <div class="text-area ml-0 lg:ml-10">
                <h1 class="font-semibold text-2xl md:text-3xl h-32 w-[22rem] md:w-[45rem] bg-red-200 lg:w-[41rem]">{{ $place->name }}</h1>

                <h2 class="font-semibold text-base opacity-80">Harga Tiket</h2>
                <h1 class="font-bold text-2xl lg:text-4xl text-green-600 mt-2">Rp. {{ number_format($place->price) }} <span class="text-lg opacity-50 text-black">Per Orang,-</span></h1>
                <form action="/places/{{ $place->id }}/checkout" method="post" class="mt-7">
                    @csrf
                    <input type="hidden" name="place_id" value="{{ $place->id }}">
                    <label for="" class="font-semibold">Pesan untuk</label>
                    <input type="number" name="quantity" class="w-8 font-semibold text-center" value="1" id="">
                    <label for="" class="font-semibold">Orang</label>
                    @auth
                        @if ($place->instructor_id == auth()->user()->id)
                            <button disabled class="disabled opacity-50 w-full py-4 font-semibold text-white text-lg mt-2 rounded-md shadow-md bg-blue-800">Pesan Sekarang</button>
                        @endif
                        @if ($place->instructor_id != auth()->user()->id)
                            <button class="w-full py-4 font-semibold text-white text-lg mt-2 rounded-md shadow-md bg-blue-800">Pesan Sekarang</button>

                        @endif
                    @endauth
                    @guest
                        <button disabled class="opacity-50 w-full py-4 font-semibold text-white text-lg mt-2 rounded-md shadow-md bg-blue-800">Pesan Sekarang</button>
                    @endguest
                </form>
            </div>
        </div>

        <div class="description-area mt-5">
            <h1 class="font-semibold text-base">Nama Instructor : {{ $place->instructor->name }}</h1>
            <h1 class="font-semibold text-2xl mt-5">Deskripsi :</h1>
            <p class="mt-1 text-justify">{{ $place->description }}</p>
        </div>
    </section>
@endsection