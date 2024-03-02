@extends('layout.index')

@section('container')
    <section class="py-20 mx-4 lg:mx-10">
        <div class="header flex justify-between mt-3">
            <h1 class="font-semibold text-base lg:text-2xl self-center">Kelola Pesanan Wisata</h1>
            <button onclick="location.href='/mybookings'" class="px-5 lg:px-10 py-2 font-semibold text-white bg-sky-700 hover:bg-sky-800 rounded-md">Kelola Pesanan</button>
        </div>


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
                <div class="place-details flex flex-wrap">
                    <img src="{{ asset('/placeimages/' . $booking->place->image) }}" class="w-full md:w-48" alt="">

                    <div class="text-area ml-0 md:ml-3">
                        <h1 class="font-semibold text-lg">{{ $booking->place->name }}</h1>
                        <h1 class="font-semibold text-xs md:text-sm opacity-80">Jumlah Tiket <span class="font-bold">{{ $booking->people }} Orang</span></h1>
                        <h1 class="font-semibold text-xs md:text-sm opacity-80">Tanggal Pesanan {{ $booking->created_at }}</h1>
                        <h1 class="font-semibold text-xs md:text-sm opacity-80">Atas Nama : {{ $booking->user->name }}</h1>
                        
                    </div>
                </div>
                
                <div class="price-details mt-0 text-left lg:text-right">
                    <h1 class="font-semibold text-base opacity-50">Total Harga</h1>
                    <h1 class="font-bold text-xl text-green-600">Rp. {{ number_format($booking->total_price) }}</h1>
                    <form action="/mybookings/{{ $booking->id }}/edit" method="post">
                        @csrf
                        @method('PUT')
                        @if ($booking->status == 0)
                            <button class="px-14 py-2 font-semibold mt-5 text-base bg-blue-800 hover:bg-blue-900 rounded-md shadow-md text-white">Konfirmasi</button>                            
                        @endif
                        @if ($booking->status == 1)
                            <button disabled class="disabled opacity-100 px-10 py-2 font-semibold mt-5 text-base bg-gray-500 rounded-md shadow-md text-white">Terkonfirmasi</button>                            
                        @endif
                    </form>

                </div>
            </div>
        </div>
        @endforeach


    </section>
@endsection