<!DOCTYPE html>
<html lang="en">

<head>
    <title>Single Product</title>
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

        <div class="container single_product_container">
            <div class="row">
                <div class="col">

                    <!-- Breadcrumbs -->

                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="{{ url('/')}}">Home</a></li>
                            <li><a href="{{ url('/catalogue')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Catalogue</a></li>
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <div class="single_product_pics">
                        <div class="row">
                            <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                                <div class="single_product_thumbnails">
                                    <ul>
                                        @foreach($detail as $d)
                                        <li><img src="{{asset('image/' . $d->image)}}" alt="" data-image="{{asset('image/' . $d->image)}}"></li>
                                        <li class="active"><img src="{{asset('image/' . $d->image)}}" alt="" data-image="{{asset('image/' . $d->image)}}"></li>
                                        <li><img src="{{asset('image/' . $d->image)}}" alt="" data-image="{{asset('image/' . $d->image)}}"></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 image_col order-lg-2 order-1">
                                <div class="single_product_image">
                                    <div class="single_product_image_background" style="background-image:url('{{asset('image/' . $d->image)}}')"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product_details">
                        <div class="product_details_title">
                            @foreach($detail as $d)
                            <h2>{{ $d->title}}</h2>
                            <p>{{$d->deskripsi}}</p>
                            <h6>
                                <b>Category Promo :</b>
                                @foreach($d->Kategori as $item)
                                {{$item->nama_kategori}}
                                @endforeach
                            </h6>
                            <h6>
                                <b>Category Goods :</b>
                                @foreach($d->KategoriBarang as $item)
                                {{$item->kategori_barang}}
                                @endforeach
                            </h6>
                            <h6>
                                <b>Date Promo Until Expired :</b>
                                {{$d->tanggal_diskon}} - {{$d->tanggal_berakhir}}
                            </h6>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Best Sellers -->

        <div class="best_sellers" style="padding-bottom: 10%;">
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
                                @foreach($diskon as $j)
                                <div class="owl-item product_slider_item">
                                    <a href="{{ url('/detailproduct/'. $j->id)}}">
                                        <div class="product-item">
                                            <div class="product discount">
                                                <div class="product_image">
                                                    <img src="{{asset('image/' . $j->image)}}" alt="">
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_name" style="margin-top: 15%;">{{ $j->title}}</h6>
                                                    <h6 class="product_name" style="margin-top: 10%; color: #FFE600;">Sampai {{ $j->tanggal_berakhir}}</h6>
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

        <!-- Footer -->

        @extends('parcial.footer')

    </div>

    @include('include.jsuser')

</body>

</html>
