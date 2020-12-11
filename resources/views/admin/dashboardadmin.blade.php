@extends('layouts.main')

@section('content')

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">overview</h2>
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                @if(Auth::user()->id_role == 1)
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('datauser')}}">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fas fa-user" style="font-size: 50px;"></i>
                                    </div>
                                    <div class="text" style="margin-top: 10%;">
                                        <h2><b>{{$countuser}}</b></h2>
                                        <span>users registered</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('datadiskon')}}">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fas fa-percent" style="font-size: 50px;"></i>
                                    </div>
                                    <div class=" text" style="margin-top: 10%;">
                                        <h2><b>{{$countdiskon}}</b></h2>
                                        <span>discounts available</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('datapopular')}}">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="far fa-check-square" style="font-size: 50px;"></i>
                                    </div>
                                    <div class="text" style="margin-top: 10%;">
                                        <h2><b>{{$countslider}}</b></h2>
                                        <span>active items slider</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('datakategori')}}">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fas fa-clipboard-list" style="font-size: 50px;"></i>
                                    </div>
                                    <div class="text" style="margin-top: 10%;">
                                        <h2><b>{{$countkategori}}</b></h2>
                                        <span>Category promo</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @else
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('datadiskon')}}">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fas fa-percent" style="font-size: 50px;"></i>
                                    </div>
                                    <div class="text" style="margin-top: 10%;">
                                        <h2><b>{{$countdiskon}}</b></h2>
                                        <span>discounts available</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('datapopular')}}">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="far fa-check-square" style="font-size: 50px;"></i>
                                    </div>
                                    <div class="text" style="margin-top: 10%;">
                                        <h2><b>{{$countslider}}</b></h2>
                                        <span>active items slider</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <h2 class="title-1 m-b-25">Discount For Today : </h2>
                        </div>
                        <div class="col" style="margin-top: 10px; margin-left: -45%;">
                            <h4>
                                <?php echo date("Y-m-d") ?>
                            </h4>
                        </div>
                    </div>
                    <div class="table-responsive table--no-card m-b-40">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>discount date</th>
                                    <th>discount over</th>
                                    <th>category</th>
                                    <th>title</th>
                                    <th>description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($discon as $d)
                                <tr>
                                    <td>{{$d->tanggal_diskon}}</td>
                                    <td>{{$d->tanggal_berakhir}}</td>
                                    <td>
                                        @foreach($d->Kategori as $item)
                                        {{$item->nama_kategori}}
                                        @endforeach
                                    </td>
                                    <td>{{$d->title}}</td>
                                    <td>{{$d->deskripsi}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2020 Ambil Promo. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->

    @endsection
