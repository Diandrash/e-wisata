<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Category;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();
        $categories = Category::all();  
        return view("places.index", [
            'title' => 'Daftar Wisata',
            'places'=> $places,
            'categories'=> $categories,
        ]);
    }
    public function search(Request $request)
    {
        $search = $request['search'];
        $places = Place::where('name', 'LIKE', "%$search%")->get();
        $categories = Category::all();  
        return view("places.index", [
            'title' => 'Daftar Wisata',
            'places'=> $places,
            'categories'=> $categories,
        ])->with('search', 'search');
    }
    public function category(Request $request)
    {
        $category = $request['category'];
        $places = Place::where('category_id', $category)->get();
        $categories = Category::all();  
        return view("places.index", [
            'title' => 'Daftar Wisata',
            'places'=> $places,
            'categories'=> $categories,
        ])->with('category', 'category');
    }

    public function myindex()
    {
        $places = Place::where('instructor_id', auth()->user()->id)->get();
        return view("myplaces.index", [
            'title' => 'Daftar Wisata',
            'places'=> $places,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('myplaces.create', [
            'title' => 'Tambahkan Wisata',
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaceRequest $request)
    {
        $validatedData = $request->validate([
            'instructor_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|min:3|max:300',
            'price' => 'required',
            'description' => 'required|min:3|max:3048',
            'image' => 'required|mimes:jpg,jpeg,png,webp,heic',
        ]);

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->move('placeimages', $filename);  

        Place::create([
            'instructor_id' => $validatedData['instructor_id'],
            'category_id'=> $validatedData['category_id'],
            'name'=> $validatedData['name'],
            'price'=> $validatedData['price'],
            'description'=> $validatedData['description'],
            'image'=> $filename,
        ]);

        Alert::success('Success', 'Wisata Ditambahkan');
        return redirect()->intended('/myplaces');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        return view('places.show', [
            'title'=> $place->name,
            'place' => $place,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        $categories = Category::all();
        return view('myplaces.edit', [
            'title' => 'Tambahkan Wisata',
            'categories' => $categories,
            'place' => $place,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaceRequest $request, Place $place)
    {
        $validatedData = $request->validate([
            'instructor_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|min:3|max:300',
            'price' => 'required',
            'description' => 'required|min:3|max:3048',
            'image' => 'mimes:jpg,jpeg,png,webp,heic',
        ]);

        $filename = $place-> image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('placeimages', $filename);  
        }

        $place->update([
            'instructor_id' => $validatedData['instructor_id'],
            'category_id'=> $validatedData['category_id'],
            'name'=> $validatedData['name'],
            'price'=> $validatedData['price'],
            'description'=> $validatedData['description'],
            'image'=> $filename,
        ]);

        Alert::success('Success', 'Wisata Diperbaharui');
        return redirect()->intended('/myplaces');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $place->delete();

        Alert::success('Success', 'Wisata Dihapus');
        return redirect()->intended('/myplaces');
    }
}
