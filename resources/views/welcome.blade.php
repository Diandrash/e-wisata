@extends('layout.index')

@section('container')


    <section id="hero" class="pt-20 mx-4 lg:mx-10">
        @if (session()->has('login'))
            <audio id="audio" src="/audio/success.mp3" class="hidden" autoplay controls></audio>
        @endif
        <div class="content-area flex flex-wrap mx-6 justify-between">
            <div class="text-area w-[20rem] md:w-[20rem] lg:w-[39rem] mt-10 lg:mt-32">
                <h1 class="font-semibold text-2xl lg:text-5xl">Jelajahi Keindahan Wisata Indonesia Sekarang</h1>
            </div>
            <div class="image-area mt-16 md:mt-0">
                <img src="/img/landing-page.png" class="w-[20rem] md:w-[18rem] lg:w-[30rem]" alt="">
            </div>
        </div>
    </section>

    <section id="about" class="py-20 mx-4 lg:mx-10">
        <h1 class="font-semibold text-2xl text-center">Tentang Kami</h1>

        <div class="content-area mx-2 lg:mx-10 flex flex-wrap mt-10">
            <div class="logo-area w-full lg:w-6/12">
                <div class="logo py-32 px-10 bg-white shadow-lg flex justify-center">
                    <h1 class="font-bold text-6xl self-centern text-blue-800">E-Wisata</h1>
                </div>
            </div>
            <div class="text-area w-full lg:w-6/12">
                <p class="ml-0 lg:ml-5 text-justify mt-3 lg:mt-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio earum odit at voluptatem labore dolorum, temporibus non debitis, iusto quidem dicta illum animi repudiandae nesciunt accusantium, saepe ad? Pariatur odit consectetur molestias, quis reiciendis, voluptates adipisci dolor dolore quos animi a accusantium dolores quaerat, corporis vel iste perferendis. Harum ullam laborum placeat perspiciatis nihil. Inventore dicta ipsa nulla. Error, veritatis ab tempora cum beatae magni corrupti animi earum in ullam necessitatibus, voluptatum repellendus eum nobis esse alias exercitationem, eveniet nihil hic quidem impedit dolores! Non quisquam, rerum in reprehenderit, sapiente neque obcaecati magni harum corporis, odio alias aperiam. Placeat, a. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci quisquam quasi aliquid, harum minima perspiciatis suscipit laborum quas a molestiae?</p>
            </div>
        </div>
    </section>

    <section id="testimonials" class="py-20 mx-4 lg:mx-10">
        <h1 class="font-semibold text-2xl text-center mb-3">Testimoni kami</h1>

        <div class="content-area flex flex-wrap justify-center gap-10">
            
            <div class="testi-card w-72 bg-white rounded-lg justify-center mt-5 shadow-lg">
                <div class="image-area flex justify-center">
                    <img src="/img/people-1.jpg" alt="" class="w-16 mt-5 mb-3 rounded-full">
                </div>
                <div class="text-area mx-5 text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, et. Sapiente in nihil, magni obcaecati ipsa explicabo veritatis eum officia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi dignissimos neque praesentium maiores explicabo eveniet quasi illo harum quisquam eligendi?
                </div>
                <h1 class="font-bold text-lg text-blue-900 pb-6 mt-5 text-center">Vivi Novika</h1>
            </div>

            <div class="testi-card w-72 bg-white rounded-lg justify-center mt-5 shadow-lg">
                <div class="image-area flex justify-center">
                    <img src="/img/people-2.jpg" alt="" class="w-16 mt-5 mb-3 rounded-full">
                </div>
                <div class="text-area mx-5 text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, et. Sapiente in nihil, magni obcaecati ipsa explicabo veritatis eum officia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi dignissimos neque praesentium maiores explicabo eveniet quasi illo harum quisquam eligendi?
                </div>
                <h1 class="font-bold text-lg text-blue-900 pb-6 mt-5 text-center">Novi Iadin</h1>
            </div>

            <div class="testi-card w-72 bg-white rounded-lg justify-center mt-5 shadow-lg block md:hidden lg:block">
                <div class="image-area flex justify-center">
                    <img src="/img/people-3.jpg" alt="" class="w-16 mt-5 mb-3 rounded-full">
                </div>
                <div class="text-area mx-5 text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, et. Sapiente in nihil, magni obcaecati ipsa explicabo veritatis eum officia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi dignissimos neque praesentium maiores explicabo eveniet quasi illo harum quisquam eligendi?
                </div>
                <h1 class="font-bold text-lg text-blue-900 pb-6 mt-5 text-center">Rasyaa Arby</h1>
            </div>
        </div>
    </section>

    <section id="footer" class="pt-20">
        <div class="content-area px-16 py-10 bg-blue-800">
            <div class="flex flex-wrap justify-between">
                <div class="row">
                    <div class="logo-area">
                        <h1 class="font-bold text-3xl md:text-5xl mt-0 md:mt-16 text-white">E-Wisata</h1>
                    </div>
                </div>
                <div class="row ml-3 md:ml-0">
                    <h1 class="font-semibold text-lg text-white ">Sosial Media</h1>

                    <div class="list flex flex-col gap-5 mt-5">
                        <a href="" class="font-semibold text-white text-base">Instagram</a>
                        <a href="" class="font-semibold text-white text-base">Twitter</a>
                        <a href="" class="font-semibold text-white text-base">Tiktok</a>
                        <a href="" class="font-semibold text-white text-base">Youtube</a>
                    </div>
                </div>
                <div class="row mt-10 md:mt-0">
                    <h1 class="font-semibold text-lg text-white">Tentang Kami</h1>

                    <div class="list flex flex-col gap-5 mt-5">
                        <a href="/home#hero" class="font-semibold text-white text-base">Home</a>
                        <a href="/home#about" class="font-semibold text-white text-base">About</a>
                        <a href="/places" class="font-semibold text-white text-base">Places</a>
                        <a href="/home#testimonials" class="font-semibold text-white text-base">Testimonials</a>
                    </div>
                </div>
                <div class="row mt-10 md:mt-0">
                    <h1 class="font-semibold text-lg text-white">Alamat</h1>

                    <div class="list flex flex-col gap-5 mt-5">
                        <a href="" class="font-semibold text-white text-base">Jl. Angsana</a>
                        <a href="" class="font-semibold text-white text-base">Kec. Ngawen</a>
                        <a href="" class="font-semibold text-white text-base">Kab. Klaten</a>
                        <a href="" class="font-semibold text-white text-base">Jawa Tengah</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>

        const audio = document.querySelector('#audio')
        audio.play();

    </script>
@endsection