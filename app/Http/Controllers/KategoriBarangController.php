<?php

namespace App\Http\Controllers;

use App\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    // function show data user in array to use in datatable with ajax
    public function dataKat()
    {
        $kategoribarang = KategoriBarang::get();
        foreach ($kategoribarang as $value) {
            $tbody = array();
            $tbody[] = $value['id'];
            $tbody[] = $value['kategori_barang'];
            $img = "<img style='width: 90%;' src='/image/kategoribarang/" . $value['gambar_kategori'] . "' /></a>";
            $tbody[] = $img;
            $button =
                "<div class='table-data-feature'>
                 <button class='item editbtnkat' id=" . $value['id'] . " title=Edit'>
                 <i class='zmdi zmdi-edit' style='color: blue;'></i>
                 </button>
                 <button type='button' class='item deletebtnkat' id=" . $value['id'] . " data-toggle='tooltip' data-placement='top' title='Delete'>
                     <i class='zmdi zmdi-delete' style='color: red;'></i>
                 </button>
                 </div>";
            $tbody[] = $button;
            $data[] = $tbody;
        }
        if ($kategoribarang->count() > 0) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    // function add kategori barang
    public function addKat(Request $request)
    {
        if ($_POST["action"] == "Add") {
            $imageName = $request->gambar_kategori->getClientOriginalName();
            $request->gambar_kategori->move(public_path('image/kategoribarang'), $imageName);
            $kategoribarang = new KategoriBarang();
            $kategoribarang->kategori_barang = $request->kategori_barang;
            $kategoribarang->gambar_kategori = $imageName;
            $kategoribarang->save();
            echo 'Data Inserted';
        }
    }

    // function get id kategori
    public function getIdKat()
    {
        $output = array();
        $data = KategoriBarang::find($_POST["id"]);
        $output['kategori_barang'] = $data->kategori_barang;
        if ($data->gambar_kategori != '') {
            $output['gambar_kategori'] = '<img style="width: 100%;" src="/image/kategoribarang/' . $data->gambar_kategori . '" /><input type="hidden" name="hidden_barang_image" value="' . $data->gambar_kategori . '"/>';
        } else {
            $output['gambar_kategori'] = '<input type="hidden" name="hidden_barang_image" value=""/>';
        }
        echo json_encode($output);
    }

    // function edit kategori
    public function editKat(Request $request)
    {
        if ($_POST["action"] == "Edit") {
            if ($request->gambar_kategori == null) {
                $idkategori = $request->id;
                $kategoribarang = KategoriBarang::find($idkategori);
                $kategoribarang->kategori_barang = $request->kategori_barang;
                $kategoribarang->save();
                echo 'Data Updated';
            } else {
                $imageName = $request->gambar_kategori->getClientOriginalName();
                $request->gambar_kategori->move(public_path('image/kategoribarang'), $imageName);
                $idkategori = $request->id;
                $kategoribarang = KategoriBarang::find($idkategori);
                $kategoribarang->kategori_barang = $request->kategori_barang;
                $kategoribarang->gambar_kategori = $imageName;
                $kategoribarang->save();
                echo 'Data Updated';
            }
        }
    }

    //  function delete kategori
    public function deleteKat()
    {
        $kategoribarang = KategoriBarang::find($_POST["id"]);
        unlink(public_path() . '/image/kategoribarang/' . $kategoribarang->gambar_kategori);
        $kategoribarang->delete();
    }
}
