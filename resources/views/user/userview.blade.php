<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('include.styleuser')

</head>

<body>

    <div class="super_container">

        <!-- header -->
        @extends('parcial.navbar')
        <!-- akhir header -->

        <!-- Slider -->

        <div class="main_slider" style="background-image:url(https://images.unsplash.com/photo-1604742761578-c09b32ab0863?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjR8fHNob3BwaW5nfGVufDB8MHwwfHdoaXRl&ixlib=rb-1.2.1); margin-top: 6%;">
            <div class="container fill_height">
                <div class="row align-items-center fill_height">
                    <div class="col">
                        <div class="main_slider_content">
                            <h1>Get up to 30% Off New Arrivals</h1>
                            <div class="red_button shop_now_button" style="background-color: #FFE600;"><a href="{{ url('/catalogue')}}">Show More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner -->

        <div class="banner">
            <div class="container">
                <div class="row" style="padding-bottom: 10%;">
                    <div class="col text-center">
                        <div class="section_title new_arrivals_title">
                            <h2>Categorys</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($category as $c)
                    <div class="col-md-4" style="margin-bottom: 3%;">
                        <div class="banner_item align-items-center" style="background-image: url('{{asset('image/icon/' . $c->icon_kategori)}}')">
                            <div class="banner_category">
                                <a href="categories.html">{{$c->nama_kategori}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Best Sellers -->

        <div class="best_sellers">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="section_title new_arrivals_title">
                            <h2>Other Promo</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="product_slider_container">
                            <div class="owl-carousel owl-theme product_slider">

                                <!-- Slide 1 -->
                                @foreach($toppromo as $t)
                                <div class="owl-item product_slider_item">
                                    <a href="{{ url('/product/'. $t->kategori_barang)}}">
                                        <div class="product-item">
                                            <div class="product discount">
                                                <div class="product_image">
                                                    <img src="image/popular/{{ $t->image}}" alt="">
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_name" style="margin-top: 25%;">{{ $t->title}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach

                            </div>

                            <!-- Slider Navigation -->

                            <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </div>
                            <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- other promo -->

        <div class="new_arrivals" style="padding-bottom: 10%;">
            <div class="container">
                <div class="row" style="padding-bottom: 5%;">
                    <div class="col text-center">
                        <div class="section_title new_arrivals_title">
                            <h2>Other Promo</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                            <!-- Product 1 -->
                            @foreach($otherpromo as $o)
                            <div class="product-item men" style="margin-bottom: 10px;">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        <img src="{{asset('image/' . $o->image)}}" alt="">
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_name">{{$o->title}}</h6>
                                        <div class="product_price">Sampai {{$o->tanggal_berakhir}}</div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button" style="width: 98%; margin-left: 1%; background-color: #FFE600;"><a href="{{ url('/detailproduct/'. $o->id)}}">Check Detail</a></div>
                            </div>
                            @endforeach

                        </div>
                        {{$otherpromo->links()}}
                    </div>
                </div>
            </div>
        </div>


        @extends('parcial.footer')

    </div>

    @include('include.jsuser')

</body>

</html>
