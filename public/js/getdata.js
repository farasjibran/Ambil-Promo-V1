let $ = jQuery;

jQuery(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // CRUD AJAX DATA USER
    // show modal add
    jQuery('.addbtn').on('click', function () {
        $('#addModal').modal('show');
    });

    // datatable
    var datauser = $('#dataUser').DataTable({
        "processing": true,
        "ajax": "getuser",
        "order": [],
    });

    // function add
    $(document).on('submit', '#formtambah', function (event) {
        event.preventDefault();
        var id_role = $('#rl').val();
        var name = $('#nm').val();
        var email = $('#eml').val();
        var password = $('#pw').val();


        if (id_role != '' && name != '' && email != '' && password) {
            $.ajax({
                type: "post",
                url: "adduser",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Tambah User',
                        text: 'Anda Berhasil Menambah User'
                    });
                    $('#formtambah')[0].reset();
                    $('#addModal').modal('hide');
                    datauser.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // function get id to set modal edit
    $(document).on('click', '.editbtn', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "getiduser",
            type: "post",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function (data) {
                $('#editModal').modal('show');
                $('#role').val(data.id_role);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#password').val(data.password);
                $('#id').val(id);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
            }
        });
    });

    // function edit data
    $(document).on('submit', '#formedit', function (event) {
        event.preventDefault();
        var id_role = $('#role').val();
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();

        if (id_role != '' && name != '' && email != '' && password) {
            $.ajax({
                type: "post",
                url: "edituser",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Edit User',
                        text: 'Anda Berhasil Mengedit User'
                    });
                    $('#formedit')[0].reset();
                    $('#editModal').modal('hide');
                    datauser.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // function delete
    $(document).on('click', '.deletebtn', function () {
        var id = $(this).attr("id");
        swal({
            title: 'Konfirmasi',
            text: "Apakah anda yakin ingin menghapus ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "deleteuser",
                    type: "post",
                    beforeSend: function () {
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading();
                            }
                        });
                    },
                    data: {
                        id: id
                    },
                    success: function (data) {
                        swal(
                            'Hapus',
                            'Berhasil Terhapus',
                            'success'
                        );
                        datauser.ajax.reload(null, false);
                    }
                });
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                );
            }
        });
    });
    // END CRUD AJAX DATA USER

    // CRUD AJAX DATA DISCOUNT
    // show modal add
    jQuery('.adddiskon').on('click', function () {
        $('#addDisc').modal('show');
    });

    // datatable discount
    var datadiskon = $('#dataDisc').DataTable({
        "processing": true,
        "ajax": "getdiskon",
        "order": [],
    });

    // function add discount
    $(document).on('submit', '#formtambahdisc', function (event) {
        event.preventDefault();
        var kategori = $('#ktgr').val();
        var kategoribarang = $('#ktbarang').val();
        var title = $('#tlt').val();
        var deskripsi = $('#dskrp').val();
        var tanggaldiskon = $('#tgldisc').val();
        var tanggalakhir = $('#tglakhir').val();
        var status = $('#sts').val();
        var price = $('#prc').val();
        var extension = $('#img').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Invalid Image");
            $('#user_image').val('');
            return false;
        }

        if (kategori != '' && title != '' && deskripsi != '' && tanggaldiskon != '' && tanggalakhir != '' && status != '' && price != '' && kategoribarang != '') {
            $.ajax({
                type: "post",
                url: "adddiskon",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Tambah Discount',
                        text: 'Anda Berhasil Menambah Discount'
                    });
                    $('#formtambahdisc')[0].reset();
                    $('#addDisc').modal('hide');
                    datadiskon.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // function get id discount
    $(document).on('click', '.editbtndisc', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "getiddiskon",
            type: "post",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function (data) {
                $('#editDisc').modal('show');
                $('#kategori').val(data.kategori_diskon);
                $('#kategoribarang').val(data.kategori_barang);
                $('#title').val(data.title);
                $('#deskripsi').val(data.deskripsi);
                $('#tanggal_diskon').val(data.tanggal_diskon);
                $('#tanggal_berakhir').val(data.tanggal_berakhir);
                $('#status').val(data.status);
                $('#price').val(data.price);
                $('#id').val(id);
                $('#image').html(data.image);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
            }
        });
    });

    // function edit discount
    $(document).on('submit', '#formeditdisc', function (event) {
        event.preventDefault();
        var kategori = $('#kategori').val();
        var kategoribarang = $('#kategoribarang').val();
        var title = $('#title').val();
        var deskripsi = $('#deskripsi').val();
        var tanggaldiskon = $('#tanggal_diskon').val();
        var tanggalakhir = $('#tanggal_berakhir').val();
        var status = $('#status').val();
        var price = $('#price').val();

        if (kategori != '' && title != '' && deskripsi != '' && tanggaldiskon != '' && tanggalakhir != '' && status != '' && price != '' && kategoribarang != '') {
            $.ajax({
                type: "post",
                url: "editdiskon",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Edit Diskon',
                        text: 'Anda Berhasil Mengedit Diskon'
                    });
                    $('#formeditdisc')[0].reset();
                    $('#editDisc').modal('hide');
                    datadiskon.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // function delete discount
    $(document).on('click', '.deletebtndisc', function () {
        var id = $(this).attr("id");
        swal({
            title: 'Konfirmasi',
            text: "Apakah anda yakin ingin menghapus ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "deletediskon",
                    type: "post",
                    beforeSend: function () {
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading();
                            }
                        });
                    },
                    data: {
                        id: id
                    },
                    success: function (data) {
                        swal(
                            'Hapus',
                            'Berhasil Terhapus',
                            'success'
                        );
                        datadiskon.ajax.reload(null, false);
                    }
                });
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                );
            }
        });
    });

    // END CRUD AJAX DATA DISCOUNT

    // CRUD AJAX KATEGORI
    // show modal add
    jQuery('.addkategori').on('click', function () {
        $('#addCat').modal('show');
    });

    // datatable kategori
    var datakategori = $('#dataCat').DataTable({
        "processing": true,
        "ajax": "getkategori",
        "order": []
    });

    // function add kategori
    $(document).on('submit', '#formtambahcat', function (event) {
        event.preventDefault();
        var nama_kategori = $('#ktgr').val();
        var extension = $('#icon').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Invalid Image");
            $('#user_image').val('');
            return false;
        }

        if (nama_kategori != '') {
            $.ajax({
                type: "post",
                url: "addkategori",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Tambah Category',
                        text: 'Anda Berhasil Menambah Category'
                    });
                    $('#formtambahcat')[0].reset();
                    $('#addCat').modal('hide');
                    datakategori.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // function get id kategori
    $(document).on('click', '.editbtncat', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "getidkategori",
            type: "post",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function (data) {
                $('#editCat').modal('show');
                $('#name').val(data.nama_kategori);
                $('#id').val(id);
                $('#image').html(data.icon_kategori);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
            }
        });
    });

    // function edit kategori
    $(document).on('submit', '#formeditcat', function (event) {
        event.preventDefault();
        var nama_kategori = $('#name').val();

        if (nama_kategori != '') {
            $.ajax({
                type: "post",
                url: "editkategori",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Edit Category',
                        text: 'Anda Berhasil Mengedit Category'
                    });
                    $('#formeditcat')[0].reset();
                    $('#editCat').modal('hide');
                    datakategori.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // function delete kategori
    $(document).on('click', '.deletebtncat', function () {
        var id = $(this).attr("id");
        swal({
            title: 'Konfirmasi',
            text: "Apakah anda yakin ingin menghapus ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "deletekategori",
                    type: "post",
                    beforeSend: function () {
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading();
                            }
                        });
                    },
                    data: {
                        id: id
                    },
                    success: function (data) {
                        swal(
                            'Hapus',
                            'Berhasil Terhapus',
                            'success'
                        );
                        datakategori.ajax.reload(null, false);
                    }
                });
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                );
            }
        });
    });

    // END CRUD AJAX KATEGORI

    // CRUD AJAX ROLE

    // show modal add
    jQuery('.addrole').on('click', function () {
        $('#addRole').modal('show');
    });

    // datatable role
    var datarole = $('#dataRole').DataTable({
        "processing": true,
        "ajax": "getrole",
        "order": []
    });

    // function add role
    $(document).on('submit', '#formtambahrole', function (event) {
        event.preventDefault();
        var role = $('#nama_role').val();
        var deskripsi = $('#dskrp').val();

        if (role != '', deskripsi != '') {
            $.ajax({
                type: "post",
                url: "addrole",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Tambah Role',
                        text: 'Anda Berhasil Menambah Role'
                    });
                    $('#formtambahrole')[0].reset();
                    $('#addRole').modal('hide');
                    datarole.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // function get id role
    $(document).on('click', '.editbtnrole', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "getidrole",
            type: "post",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function (data) {
                $('#editRole').modal('show');
                $('#role').val(data.role);
                $('#deskripsi').val(data.deskripsi);
                $('#id').val(id);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
            }
        });
    });

    // function edit role
    $(document).on('submit', '#formeditrole', function (event) {
        event.preventDefault();
        var role = $('#role').val();
        var deskripsi = $('#deskripsi').val();

        if (role != '', deskripsi != '') {
            $.ajax({
                type: "post",
                url: "editrole",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Edit Role',
                        text: 'Anda Berhasil Mengedit Role'
                    });
                    $('#formeditrole')[0].reset();
                    $('#editRole').modal('hide');
                    datarole.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // END CRUD AJAX ROLE

    // CRUD AJAX KATEGORI BARANG

    // show modal add
    jQuery('.addktbarang').on('click', function () {
        $('#addKat').modal('show');
    });

    // datatable kategori barang
    var datakat = $('#dataKat').DataTable({
        "processing": true,
        "ajax": "getktbarang",
        "order": []
    });

    // function add kategori barang
    $(document).on('submit', '#formtambahkat', function (event) {
        event.preventDefault();
        var kategoribarang = $('#kte').val();
        var extension = $('#gambar').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Invalid Image");
            $('#user_image').val('');
            return false;
        }

        if (kategoribarang != '') {
            $.ajax({
                type: "post",
                url: "addktbarang",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Tambah Kategori Barang',
                        text: 'Anda Berhasil Menambah Kategori Barang'
                    });
                    $('#formtambahkat')[0].reset();
                    $('#addKat').modal('hide');
                    datakat.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // function get id kategori
    $(document).on('click', '.editbtnkat', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "getidktbarang",
            type: "post",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function (data) {
                $('#editKat').modal('show');
                $('#kategori').val(data.kategori_barang);
                $('#id').val(id);
                $('#image').html(data.gambar_kategori);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
            }
        });
    });

    // function edit kategori
    $(document).on('submit', '#formeditkat', function (event) {
        event.preventDefault();
        var kategori_barang = $('#kategori').val();

        if (kategori_barang != '') {
            $.ajax({
                type: "post",
                url: "editktbarang",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Edit Category Goods',
                        text: 'Anda Berhasil Mengedit Category Goods'
                    });
                    $('#formeditkat')[0].reset();
                    $('#editKat').modal('hide');
                    datakat.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // function delete kategori barang
    $(document).on('click', '.deletebtnkat', function () {
        var id = $(this).attr("id");
        swal({
            title: 'Konfirmasi',
            text: "Apakah anda yakin ingin menghapus ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "deletektbarang",
                    type: "post",
                    beforeSend: function () {
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading();
                            }
                        });
                    },
                    data: {
                        id: id
                    },
                    success: function (data) {
                        swal(
                            'Hapus',
                            'Berhasil Terhapus',
                            'success'
                        );
                        datakat.ajax.reload(null, false);
                    }
                });
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                );
            }
        });
    });

    // END CRUD AJAX KATEGORI BARANG

    // CRUD AJAX TOP PROMO

    // show modal add
    jQuery('.addpop').on('click', function () {
        $('#addPop').modal('show');
    });

    // datatable top promo
    var datapop = $('#dataPop').DataTable({
        "processing": true,
        "ajax": "gettoppromo",
        "order": []
    });

    // function add top popular
    $(document).on('submit', '#formtambahpop', function (event) {
        event.preventDefault();
        var title = $('#tlt').val();
        var kategoribarang = $('#kte').val();
        var extension = $('#gambar').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Invalid Image");
            $('#user_image').val('');
            return false;
        }

        if (kategoribarang != '' && title != '') {
            $.ajax({
                type: "post",
                url: "addtoppromo",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Tambah Popular Slider',
                        text: 'Anda Berhasil Menambah Popular Slider'
                    });
                    $('#formtambahpop')[0].reset();
                    $('#addPop').modal('hide');
                    datapop.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // function get id popular slider
    $(document).on('click', '.editbtnpop', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "getidtoppromo",
            type: "post",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function (data) {
                $('#editPop').modal('show');
                $('#title').val(data.title);
                $('#kategori_barang').val(data.kategori_barang);
                $('#id').val(id);
                $('#image').html(data.image);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
            }
        });
    });

    // function edit popular slider
    $(document).on('submit', '#formeditpop', function (event) {
        event.preventDefault();
        var title = $('#tlt').val();
        var kategoribarang = $('#kte').val();

        if (kategoribarang != '' && title != '') {
            $.ajax({
                type: "post",
                url: "edittoppromo",
                beforeSend: function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                },
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Edit Top Promo',
                        text: 'Anda Berhasil Mengedit Top Promo'
                    });
                    $('#formeditpop')[0].reset();
                    $('#editPop').modal('hide');
                    datapop.ajax.reload(null, false);
                },
            });
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Bother fields are required!',
            });
        }
    });

    // function delete popular slider
    $(document).on('click', '.deletebtnpop', function () {
        var id = $(this).attr("id");
        swal({
            title: 'Konfirmasi',
            text: "Apakah anda yakin ingin menghapus ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "deletetoppromo",
                    type: "post",
                    beforeSend: function () {
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading();
                            }
                        });
                    },
                    data: {
                        id: id
                    },
                    success: function (data) {
                        swal(
                            'Hapus',
                            'Berhasil Terhapus',
                            'success'
                        );
                        datapop.ajax.reload(null, false);
                    }
                });
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                );
            }
        });
    });

    // END CRUD AJAX TOP PROMO

});
