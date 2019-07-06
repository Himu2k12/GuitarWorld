@extends('font.master')


@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active"><a href="{{url('/about')}}">About Us</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- About Main Area Start -->
    <div class="about-main-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-6">
                    <div class="about-img">
                        <a href="#"><img class="img" src="{{asset('fontAsset/')}}/img/banner/14.jpg" alt="about-us"></a>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="about-content">
                        <h3>Why We are?</h3>
                        <p>Mellentesque faucibus dapibus dapibus. Morbi aliquam aliquet neque. Donec placerat dapibus sollicitudin. Morbi arcu nisi, mattis ut ullamcorper in, dapibus ac nunc. Cras bibendum mauris et sapien feugiat. scelerisque accumsan nibh gravida. Quisque aliquet justo elementum lectus ultrices bibendum.</p>
                        <ul class="mt-20 about-content-list">
                            <li><a href="#">Amazing guitar collection</a></li>
                            <li><a href="#">various brands guitar are available</a></li>
                            <li><a href="#">Online service opportunity</a></li>
                            <li><a href="#">Buy and Sell your old guitar</a></li>
                            <li><a href="#">Post on forum</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Main Area End -->
    <!-- Our Mission Start -->
    <div class="about-bottom mtb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="ht-single-about">
                        <h3>OUR services</h3>
                        <div class="skill-bar">
                            <div class="skill-bar-item">
                                <span>guitar selling</span>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-progress="80%" style="width: 80%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        <span class="text-top">80%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="skill-bar-item">
                                <span>Fast web application</span>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-progress="90%" style="width: 90%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        <span class="text-top">90%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="skill-bar-item">
                                <span>user expectation</span>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-progress="70%" style="width: 70%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        <span class="text-top">70%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="skill-bar-item">
                                <span>payment success</span>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-progress="95%" style="width: 95%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                        <span class="text-top">95%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="ht-single-about">
                        <h3>OUR EXPERIENCES</h3>
                        <h5>FUSCE FRINGILLA PORTTITOR IACULI SED QUAM LIBERO, ADIPISCING SED ERAT ID</h5>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi malesuada vestibulum. Phasellus tempor nunc eleifend cursus molestie. Mauris lectus arcu, pellentesque at sodales sit amet,</p>
                        <p>Donec ornare mattis suscipit. Praesent fermentum accumsan vulputate. Sed velit nulla, sagittis non erat id, dictum vestibulum ligula. Maecenas sed enim sem.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="ht-single-about">
                        <h3>OUR WORKS</h3>
                        <div class="ht-about-work">
                            <span>1</span>
                            <div class="ht-work-text">
                                <h5><a href="#">LOREM IPSUM DOLOR SIT AMET</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                            </div>
                        </div>
                        <div class="ht-about-work">
                            <span>2</span>
                            <div class="ht-work-text">
                                <h5><a href="#">DONEC FERMENTUM EROS</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                            </div>
                        </div>
                        <div class="ht-about-work">
                            <span>3</span>
                            <div class="ht-work-text">
                                <h5><a href="#">LOREM IPSUM DOLOR SIT AMET</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Mission End -->
    <!-- Categorie Page Brand Banner Start -->
    <div class="container">
        <!-- Brand Banner Start -->
            <!-- Brand Banner Start -->
            <div class="brand-banner owl-carousel pt-30">
                <div class="single-brand">
                    <a href="#"><img class="img" src="{{asset('fontAsset/')}}/img/brand/1.jpg" height="70px" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="{{asset('fontAsset/')}}/img/brand/2.jpg"  height="70px" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="{{asset('fontAsset/')}}/img/brand/3.jpg"  height="70px" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="{{asset('fontAsset/')}}/img/brand/4.jpg"  height="70px" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="{{asset('fontAsset/')}}/img/brand/1.jpg"  height="70px" alt="brand-image"></a>
                </div>
            </div>
            <!-- Brand Banner End -->
        <!-- Brand Banner End -->
    </div>
    <!-- Categorie Page Brand Banner End -->

@endsection
