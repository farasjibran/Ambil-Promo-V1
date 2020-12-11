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

        <div class="container product_section_container" style="padding-bottom: 10%;">
            <div class="row">
                <div class="col product_section clearfix">

                    <!-- Breadcrumbs -->

                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="{{ url('/')}}">Home</a></li>
                            <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Catalogue</a></li>
                        </ul>
                    </div>

                    <!-- Sidebar -->

                    <div class="sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">
                                <h5>Promo Category</h5>
                            </div>
                            <ul class="sidebar_categories">
                                <li class="{{ Request::is('catalogue') ? 'active' : '' }}"><a href="#">All</a></li>
                                @foreach($category as $c)
                                <li class="{{ Request::is('/product/'. $c->id) ? 'active' : '' }}"><a href="{{ url('/product/'. $c->id)}}">{{$c->kategori_barang}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar_section">
                            <div class="sidebar_title">
                                <h5>Popular Promo</h5>
                            </div>
                            <ul class="sidebar_categories">
                                @foreach($popular as $p)
                                <li class="{{ Request::is('/product/'. $c->id) ? 'active' : '' }}"><a href="{{ url('/product/'. $p->kategori_barang)}}">{{$p->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    @yield('content')

                </div>
            </div>
        </div>

        <!-- Footer -->

        @extends('parcial.footer')

    </div>

    @include('include.jsuser')

</body>

</html>
