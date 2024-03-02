@extends('layout.index')

@section('container')
    <div class="content-area flex">
        <div class="image-area hidden lg:block w-6/12 bg-blue-600 h-dvh">
            <div class="image flex justify-center mt-14">
                <img src="/img/login.png" class="w-[33rem]" alt="">
            </div>
        </div>
        <div class="form-area w-full lg:w-6/12">
            <form action="/login" method="post" class="p-4 mt-20">
                @csrf
                <h1 class="font-semibold text-2xl">Masuk ke Akun</h1>

                <div class="form-area mt-5">
                    <label for="email" class="font-semibold text-lg">Email</label>
                    <input required type="email" name="email" class="h-14 w-full font-semibold text-lg pl-3 rounded-md mt-2" placeholder="johndoe@gmail.com" value="{{ old('email') }}">
                    @error('email')
                        <h1 class="mt-2 text-red-600">{{ $message }}</h1>
                    @enderror
                </div>

                <div class="form-area mt-5">
                    <label for="password" class="font-semibold text-lg">Password</label>
                    <input required type="password" name="password" class="h-14 w-full font-semibold text-lg pl-3 rounded-md mt-2" placeholder="*********" value="{{ old('password') }}">
                    @error('password')
                        <h1 class="mt-2 text-red-600">{{ $message }}</h1>
                    @enderror
                </div>

                <button class="w-full py-3 font-semibold text-white text-lg bg-blue-600 hover:bg-blue-800 rounded-md mt-24 shadow-md">Masuk ke Akun</button>
                <h1 class="mt-2">Belum Memiliki Akun? <a href="/register" class="underline text-blue-600">Daftar Sekarang</a></h1>

            </form>
        </div>
    </div>
@endsection