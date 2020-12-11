@extends('layouts.main')

@include('include.styleadmin')

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <h2 class="title-1" style="margin-bottom: 30px;">Data User</h2>
        <div class="bg-white" style="padding-top: 2%; border-radius: 5px;">
            <div class="container-fluid">
                <a type="button" href="#" class="au-btn au-btn-icon au-btn--green au-btn--small addbtn">
                    <i class="zmdi zmdi-plus"></i>add user
                </a>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3" id="dataUser">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>role</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>status user</th>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button style="margin-top: -20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formtambah" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Role</label>
                        <select class="custom-select" name="role" id="rl">
                            <option selected>Select Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Creator</option>
                        </select>
                    </div>
                    <div class=" form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="nme" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="eml" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="pw" class="form-control" placeholder="Enter Password">
                    </div>
                    <input type="hidden" name="status" value="Tidak Aktif">
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button style="margin-top: -20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formedit" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Role</label>
                        <select class="custom-select" name="role" id="role">
                            <option selected>Select Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Creator</option>
                        </select>
                    </div>
                    <div class=" form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <input type="hidden" name="status" value="Tidak Aktif">
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
