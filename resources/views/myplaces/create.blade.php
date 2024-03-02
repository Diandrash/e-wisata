@extends('layout.index')

@section('container')
    <section class="py-20 mx-4 lg:mx-10">
        <h1 class="font-semibold text-2xl">Tambahkan Wisata</h1>

        <form action="/myplaces/create" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="instructor_id" value="{{ auth()->user()->id }}">

            <div class="form-area mt-5">
                <label for="name" class="font-semibold text-lg">Nama Wisata</label>
                <input required type="text" name="name" class="h-14 w-full font-semibold text-lg pl-3 rounded-md mt-2" placeholder="Gunung Rinjani" value="{{ old('name') }}">
                @error('name')
                    <h1 class="mt-2 text-red-600">{{ $message }}</h1>
                @enderror
            </div>


            <div class="form-area mt-3">
                <label for="category_id" class="font-semibold text-base">Kategori Wisata</label>
                <select name="category_id" class="font-semibold w-full h-14 text-base pl-3 mt-2" id="">
                    <option value="0" selected hidden class="font-semibold">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-area mt-5">
                <label for="description" class="font-semibold text-lg">Deskripsi Wisata</label>
                <textarea name="description" class="w-full font-semibold text-lg rounded-md mt-2 p-3" id="" cols="30" rows="10" placeholder="Deskripsi Wisata disini">{{ old('description') }}</textarea>
                @error('description')
                    <h1 class="mt-2 text-red-600">{{ $message }}</h1>
                @enderror
            </div>

            <div class="form-area mt-5">
                <label for="price" class="font-semibold text-lg">Harga Tiket Wisata</label>
                <input required type="number" name="price" class="h-14 w-full font-semibold text-lg pl-3 rounded-md mt-2" placeholder="198000" value="{{ old('price') }}">
                @error('price')
                    <h1 class="mt-2 text-red-600">{{ $message }}</h1>
                @enderror
            </div>

            <div class="form-area mt-5">
                <label for="description" class="font-semibold text-lg">Gambar Wisata</label>
                <input type="file" name="image" class="w-full font-semibold text-xl mt-2 bg-white" id="">
            </div>


            <button class="w-full py-3 font-semibold text-lg text-white bg-blue-600 hover:bg-blue-700 rounded-md mt-10">Buat Sekarang</button>
        </form>
    
    </section>
@endsection