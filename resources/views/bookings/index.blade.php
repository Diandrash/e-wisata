@extends('layout.index')

@section('container')
    <section class="py-20 mx-4 lg:mx-10">
        <h1 class="font-semibold text-2xl mt-3 mb-3">Semua Pesanan Destinasi Wisata</h1>

        @foreach ($bookings as $booking)
        <div class="booking-card mt-5 p-4 bg-white rounded-md">
            <div class="header flex justify-between">
                <h1 class="font-semibold text-sm md:text-base self-center">Tanggal Reservasi : {{ $booking->date }}</h1>
                @if ($booking->status == 0)
                    <h1 class="font-semibold text-lg text-yellow-500">Menunggu Konfirmasi</h1>
                @endif
                @if ($booking->status == 1)
                    <h1 class="font-semibold text-lg text-emerald-600">Terkonfirmasi</h1>
                @endif
            </div>
            <div class="order-details  flex flex-wrap justify-between mt-3">
                <div class="place-details flex">
                    <img src="{{ asset('/placeimages/' . $booking->place->image) }}" class="w-32" alt="">

                    <div class="text-area ml-3">
                        <h1 class="font-semibold text-lg">{{ $booking->place->name }}</h1>
                        <h1 class="font-semibold text-xs md:text-sm opacity-80">Jumlah Tiket <span class="font-bold">{{ $booking->people }} Orang</span></h1>
                        <h1 class="font-semibold text-xs md:text-sm opacity-80">Tanggal Pesanan {{ $booking->created_at }}</h1>
                        
                    </div>
                </div>
                <div class="price-details mt-5 text-right w-full lg:w-auto">
                    <h1 class="font-semibold text-base opacity-50">Total Harga</h1>
                    <h1 class="font-bold text-xl text-green-600">Rp. {{ number_format($booking->total_price) }}</h1>
                </div>
            </div>
        </div>
        @endforeach


    </section>
@endsection