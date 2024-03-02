@extends('layout.index')

@section('container')
    <section class="py-20 mx-4 lg:mx-10">
        <h1 class="font-semibold text-2xl">Konfirmasi Detail Pesanan</h1>

        <form action="/places/{{ $place->id }}/checkout/order" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="place_id" value="{{ $place->id }}">
            <input type="hidden" name="instructor_id" value="{{ $place->instructor->id }}">
            <input type="hidden" name="people" value="{{ $people }}">
            <input type="hidden" name="total_price" value="{{ $total_price }}">
            <input type="hidden" name="status" value="0">
            <input type="hidden" name="" value="">
            <div class="form-area mt-5">
                <label for="date" class="font-semibold text-lg">Tanggal Wisata</label>
                <input required type="date" name="date" class="h-14 w-full font-semibold text-lg px-3 rounded-md mt-2" placeholder="" value="{{ old('date') }}">
                @error('date')
                    <h1 class="mt-2 text-red-600">{{ $message }}</h1>
                @enderror
            </div>

            <div class="order-details mt-10 p-4 bg-white rounded-md flex flex-wrap justify-between">
                <div class="place-details flex">
                    <img src="{{ asset('/placeimages/' . $place->image) }}" class="w-32" alt="">

                    <div class="text-area ml-3">
                        <h1 class="font-semibold text-lg">{{ $place->name }}</h1>
                        <h1 class="font-semibold text-sm opacity-80">Jumlah Tiket <span class="font-bold">{{ $people }} Orang</span></h1>
                        
                    </div>
                </div>
                <div class="price-details mt-5 text-right w-full md:w-auto">
                    <h1 class="font-semibold text-base opacity-50">Total Price</h1>
                    <h1 class="font-bold text-xl text-green-600">Rp. {{ number_format($total_price) }}</h1>
                </div>
            </div>

            
            <div class="flex justify-end mt-14">
                <button type="submit" class="px-10 py-3 font-semibold text-lg bg-blue-700 hover:bg-blue-800 rounded-md text-white">Pesan Sekarang</button>
            </div>
        </form>
    </section>
@endsection