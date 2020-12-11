@extends('layouts.main')

@include('include.styleadmin')

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <h2 class="title-1" style="margin-bottom: 30px;">Data Category Promo</h2>
        <div class="bg-white" style="padding-top: 2%; border-radius: 5px;">
            <div class="container-fluid">
                <a type="button" href="#" class="au-btn au-btn-icon au-btn--green au-btn--small addkategori">
                    <i class="zmdi zmdi-plus"></i>add category
                </a>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3" id="dataCat">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>nama kategori</th>
                                        <th>icon kategori</th>
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
<div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button style="margin-top: -20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formtambahcat" method="post">
                @csrf
                <div class="modal-body">
                    <div class=" form-group">
                        <label>Category Name</label>
                        <input type="text" name="nama_kategori" id="nme" class="form-control" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                        <label>Icon Category</label>
                        <input type="file" name="icon_kategori" id="icon" class="form-control">
                    </div>
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
<div class="modal fade" id="editCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button style="margin-top: -20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formeditcat" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <span id="image"></span>
                    </div>
                    <div class=" form-group">
                        <label>Category Name</label>
                        <input type="text" name="nama_kategori" id="name" class="form-control" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                        <label>Icon Category</label>
                        <input type="file" name="icon_kategori" id="icone" class="form-control">
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
