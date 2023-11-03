@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
<section class="slider_section" id="home" data-anchor="home">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
				@for ($i = 0; $i < count($slides); $i++)
                    <li data-bs-target="#carouselExampleIndicators" aria-current="true" aria-label="Slide {{ $i }}" data-bs-slide-to="{{ $i }}" class="slider_li"></li>
                    {{-- <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" class="slider_li"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" class="slider_li"></li> --}}
				@endfor
        </ol>
        <div class="carousel-inner home_slider_inner">
            @foreach ($slides as $slide)
                <div class="carousel-item home_carousel_item">
                    <img src="{{ asset('storage/uploads/slide/' . $slide->img) }}" class="d-block w-100" alt="...">
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="our_services_section" id="services" data-anchor="services">
    <div class="container">
        <h2 class="services_title">Our Services</h2>
        <div class="our_services d-flex justify-content-around">
            @foreach ($service as $item)
                <div class="our_services_card d-flex flex-column col-3">
                    <div class="service_image_container">
                        <img src="{{ asset('storage/uploads/service/'.$item->img) }}" alt="{{ $item->img }}">
                    </div>
                    <p>{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="shop" data-anchor="shop">
    <div class="our_shop">
        <h2 class="shop_title">Our Shop</h2>
        <div class="row">
            <div class="owl-carousel product-carousel owl-theme">
                @foreach ($product as $item)
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('storage/uploads/product/'.$item->img) }}" alt="{{ $item->img }}" class="product_image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}</h5>
                                <p class="price">{{ $item->price }} AMD</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <a href="{{ route('more_product') }}" class="more_product">More</a>
    </div>
</section>

<section id="about" data-anchor="about">
    <div class="container-fluid about">
        <h2 class="about_title">About</h2>
        <div class="row d-flex about_flex_container">
            <div class="about_img">
                <img src="{{ asset('img/about.png') }}" alt="about">
            </div>
            <div class="about_text">
                @foreach ($about as $item)
                <div class="about_text_title">
                    <p>{{ $item->{'title_' . app()->getLocale() } ? $item->{'title_' . app()->getLocale() } : $item->title_am }}</p>
                </div>
                <div class="about_text_subtitle">
                    <p>{{ $item->{'subtitle_' . app()->getLocale() } ? $item->{'subtitle_' . app()->getLocale() } : $item->subtitle_am }}</p>
                </div>
                <div class="about_text_description">
                    <p>{!! $item->{'content_' . app()->getLocale() } ? $item->{'content_' . app()->getLocale() } : $item->content_am !!}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="contact" id="contact_us" data-anchor="contact_us">
    <div class="container">
        <h2 class="contact_title">Contact Us</h2>
        <div class="our_services d-flex justify-content-around">
            <div class="our_contact_card d-flex flex-column col-3">
                <img src="{{ asset('img/location.png') }}" alt="location">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
            </div>
            <div class="our_contact_card d-flex flex-column col-3">
                <img src="{{ asset('img/phone.png') }}" alt="phone">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
            </div>
            <div class="our_contact_card d-flex flex-column col-3">
                <img src="{{ asset('img/mail.png') }}" alt="mail">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $('.product-carousel').owlCarousel({
        loop:false,
        margin:10,
        nav:true,
        dots:false,
        rewind: false,
        autoplay:false,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsiveClass:true,
        navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
        responsive:{
            0:{
                items:1
            },
            450:{
                items:2,
            },
            680:{
                items:3,
            },
            1000:{
                items:4
            },
            1640:{
                items:5
            }

        }
    })

</script>
@endsection
