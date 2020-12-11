@extends('user.catalogue')

@section('content')

@include('include.jsuser')

<!-- Main Content -->

<div class="main_content">

    <!-- Products -->

    <div class="products_iso">
        <div class="row">
            <div class="col">

                <!-- Product Sorting -->

                <div class="product_sorting_container product_sorting_container_top">
                    {{$diskon->links()}}
                </div>

                <!-- Product Grid -->

                <div class="product-grid">

                    <!-- Product 1 -->

                    @foreach($diskon as $d)
                    <div class="product-item men" style="margin-bottom: 10px;">
                        <div class="product discount product_filter">
                            <div class="product_image">
                                <img src="{{ asset('image/' . $d->image)}}" alt="">
                            </div>
                            <div class="product_info">
                                <h6 class="product_name"><a href="single.html">{{$d->title}}</a></h6>
                                <div class="product_price" style="margin-top: 30%; color: #FFE600;">Sampai {{$d->tanggal_diskon}}</div>
                            </div>
                        </div>
                        <div class="red_button add_to_cart_button" style="background-color: #FFE600; width: 97%; margin-left: 1%;"><a href="{{ url('/detailproduct/'. $d->id)}}">Check Detail</a></div>
                    </div>
                    @endforeach
                </div>

                <div class="pages d-flex flex-row align-items-center">
                    {{$diskon->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection