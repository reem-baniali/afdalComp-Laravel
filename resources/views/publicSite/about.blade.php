@extends('publicSite.layout.master')

@section('title','User-Profile')
@section('content')



<section class="ftco-section ">
    <div class="row justify-content-center mb-5 pb-2 ">
        <div class="col-md-8 text-center heading-section ftco-animate">
            <h1 class="mb-4">About Us</h1>
            <p>This team spent endless nights and so much time to perfect all website implimentation and 
                design with a powerfull mindset and energetic drive,
                 this project represebts our passion for web development and programming</p>
        </div>
    </div>
    <div class="row justify-content-center mb-5 pb-2 ">
    <div class="col-md-8 text-center heading-section ftco-animate">
        <h3 class="mb-4">Our Awsome Team</h3>
    </div>
    <div class="container d-flex justify-content-center mt-5 ">
        
        <div class="row justify-content-center no-gutters ">
            <div class="col-lg-3 d-flex m-2" style="border: solid .5px #243665; ">
                <div class="services-2 noborder-left text-center ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span><img src="/storage/public_site/reem.png" class="mb-3" alt="Reems picture" style="width: 120px; border-radius: 10%;"></span></div>
                    <div class="text media-body">
                        <h3>Reem Bani Ali</h3>
                        <p>She claims the following:<br>Best in the world.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex m-2" style="border: solid .5px  #243665;">
                <div class="services-2 text-center ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span> <img src="/storage/public_site/ghosoun.png" class="mb-3" alt="Ghosouns picture" style="width: 120px; border-radius: 10%;"></span></div>
                    <div class="text media-body">
                        <h3>Ghosoun Alrahahleh</h3>
                        <p>She is one of our best Full-Stack Developers in the group.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex m-2" style="border: solid .5px  #243665;">
                <div class="services-2 text-center ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span><img src="/storage/public_site/omar.png" class="mb-3" alt="Reems picture" style="width: 120px; border-radius: 10%;"></span></div>
                    <div class="text media-body">
                        <h3>Omar Alrantisi</h3>
                        <p>A fun person to work with and a dynamic coder with a lot of patience .</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex m-2" style="border: solid .5px  #243665;">
                <div class="services-2 noborder-left noborder-bottom text-center ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span><img src="/storage/public_site/nermeen.png" class="mb-3" alt="Reems picture" style="width: 120px; border-radius: 10%;"></span></div>
                    <div class="text media-body">
                        <h3>Nermeen Alahmad</h3>
                        <p>Hard working web developer, caring and happy person. Love to code</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex m-2" style="border: solid .5px  #243665;">
                <div class="services-2 text-center noborder-bottom ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span><img src="/storage/public_site/ahmad.png" class="mb-3" alt="Reems picture" style="width: 120px; border-radius: 10%;"></span></div>
                    <div class="text media-body">
                        <h3>Ahmad Kilani</h3>
                        <p>A motivated person who likes everyone and a good web developer.</p>
                    </div>
                </div>
            </div>
    </div>
</section>



@endsection