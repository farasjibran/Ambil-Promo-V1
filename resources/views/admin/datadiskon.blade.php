@extends('layouts.main')

@include('include.styleadmin')

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <h2 class="title-1" style="margin-bottom: 30px;">Data Discount</h2>
        <div class="bg-white" style="padding-top: 2%; border-radius: 5px;">
            <div class="container-fluid">
                <a type="button" href="#" class="au-btn au-btn-icon au-btn--green au-btn--small adddiskon">
                    <i class="zmdi zmdi-plus"></i>add discount
                </a>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3" id="dataDisc" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>category promo</th>
                                        <th>category goods</th>
                                        <th>title</th>
                                        <th>description</th>
                                        <th>discount date</th>
                                        <th>discount is over</th>
                                        <th>image</th>
                                        <th>status</th>
                                        <th>price</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 12%;">
        <div class="col-md-12">
            <div class="copyright">
                <p>Copyright © 2020 Ambil Promo. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addDisc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Discount</h5>
                <button style="margin-top: -20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formtambahdisc" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Category Discount</label>
                        <select class="custom-select" name="kategori" id="ktgr">
                            <option selected>Select Category</option>
                            @foreach($kategori as $u)
                            <option value="{{ $u->id}}">{{ $u->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Goods</label>
                        <select class="custom-select" name="kategori_barang" id="ktbarang">
                            <option selected>Select Category</option>
                            @foreach($kategoribarang as $b)
                            <option value="{{ $b->id}}">{{ $b->kategori_barang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" form-group">
                        <label>Title</label>
                        <input type="text" name="title" id="tlt" class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="deskripsi" id="dskrp" class="form-control" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label>Discount date</label>
                        <input type="date" name="tanggal_diskon" id="tgldisc" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Discount over</label>
                        <input type="date" name="tanggal_berakhir" id="tglakhir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" id="prc" class="form-control" placeholder="Input The Price">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" id="img" class="form-control">
                    </div>
                    <input type="hidden" value="open" name="status" id="sts">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="action" class="btn btn-success" value="Add" />
                    <input type="submit" value="Add" name="action" class="btn btn-success" />
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editDisc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button style="margin-top: -20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formeditdisc" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <span id="image"></span>
                    </div>
                    <div class="form-group">
                        <label>Category Discount</label>
                        <select class="custom-select" name="kategori" id="kategori">
                            <option selected>Select Category</option>
                            @foreach($kategori as $u)
                            <option value="{{ $u->id}}">{{ $u->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Goods</label>
                        <select class="custom-select" name="kategori_barang" id="kategoribarang">
                            <option selected>Select Category</option>
                            @foreach($kategoribarang as $b)
                            <option value="{{ $b->id}}">{{ $b->kategori_barang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" form-group">
                        <label>Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label>Discount date</label>
                        <input type="date" name="tanggal_diskon" id="tanggal_diskon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Discount over</label>
                        <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Input The Price">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" id="imge" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" id="status">
                            <option selected>Status</option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="id" id="id" class="btn btn-success" value="" />
                    <input type="hidden" name="action" class="btn btn-success" value="Edit" />
                    <input type="submit" value="Edit" name="action" class="btn btn-success" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@include('include.jsadmin')
