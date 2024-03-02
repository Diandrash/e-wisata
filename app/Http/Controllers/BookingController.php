<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Place;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)->get();
        return view('bookings.index', [
            'title' => 'Daftar Pesanan Wisata',
            'bookings' => $bookings,
        ]);     
    }
    public function myindex()
    {
        $bookings = Booking::where('instructor_id', auth()->user()->id)->get();
        return view('bookings.myindex', [
            'title' => 'Pesanan Wisata',
            'bookings' => $bookings,
        ]);     
    }

    public function checkout(Request $request)
    {
        $quantity = $request['quantity'];
        $placeId = $request['place_id'];
        $place = Place::find($placeId);
        $price = $place->price;
        $total_price = $quantity * $price;   
        return view('bookings.checkout', [
            'title' => 'Konfirmasi Pesanan',
            'place' => $place,
            'total_price' => $total_price,
            'people' => $quantity,
        ]);     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'place_id' => 'required',
            'instructor_id' => 'required',
            'people' => 'required',
            'total_price' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);

        Booking::create($validatedData);

        Alert::success('Success', 'Berhasil Pesan');
        return redirect()->intended('/bookings');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $newStatus = 1;
        $booking->status = $newStatus;
        $booking->save();

        Alert::success('Success', 'Berhasil Pesan');
        return redirect()->intended('/mybookings');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
