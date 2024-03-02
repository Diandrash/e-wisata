@extends('layout.index')

@section('container')
    <div class="content-area flex">
        <div class="form-area   w-full lg:w-6/12">
            <form action="/register" method="post" class="p-4 mt-20">
                @csrf
                <h1 class="font-semibold text-2xl">Masuk ke Akun</h1>

                <div class="form-area mt-3">
                    <label for="name" class="font-semibold text-base">Nama Lengkap</label>
                    <input required type="text" name="name" class="h-14 w-full font-semibold text-base pl-3 rounded-md mt-2" placeholder="John Doe" value="{{ old('name') }}">
                    @error('name')
                        <h1 class="mt-2 text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="form-area mt-3">
                    <label for="email" class="font-semibold text-base">Email</label>
                    <input required type="email" name="email" class="h-14 w-full font-semibold text-base pl-3 rounded-md mt-2" placeholder="johndoe@gmail.com" value="{{ old('email') }}">
                    @error('email')
                        <h1 class="mt-2 text-red-600">{{ $message }}</h1>
                    @enderror
                </div>

                <div class="form-area mt-3">
                    <label for="password" class="font-semibold text-base">Password</label>
                    <input required type="password" name="password" class="h-14 w-full font-semibold text-base pl-3 rounded-md mt-2" placeholder="*********" value="{{ old('password') }}">
                    @error('password')
                        <h1 class="mt-2 text-red-600">{{ $message }}</h1>
                    @enderror
                </div>

                <div class="form-area mt-3">
                    <label for="is_instructor" class="font-semibold text-base">Daftar Sebagai Instructor</label>
                    <select name="is_instructor" class="font-semibold w-full h-14 text-base pl-3 mt-2" id="">
                        <option value="0" selected>Tidak</option>
                        <option value="1">Iya</option>
                    </select>
                </div>

                <button class="w-full py-3 font-semibold text-white text-base bg-blue-600 hover:bg-blue-800 rounded-md mt-10 shadow-md">Daftar Sekarang</button>
                <h1 class="mt-2">Sudah memiliki Akun? <a href="/login" class="underline text-blue-600">Masuk Sekarang</a></h1>

            </form>
        </div>
        <div class="image-area hidden lg:block w-6/12 bg-sky-600 h-[42rem]">
            <div class="image flex justify-center mt-14">
                <img src="/img/login.png" class="w-[33rem]" alt="">
            </div>
        </div>

    </div>
@endsection