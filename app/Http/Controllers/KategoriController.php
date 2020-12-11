<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    // function show data user in array to use in datatable with ajax
    public function dataCat()
    {
        $kategori = Kategori::get();
        foreach ($kategori as $value) {
            $tbody = array();
            $tbody[] = $value['id'];
            $tbody[] = $value['nama_kategori'];
            $img = "<img style='width: 90%;' src='/image/icon/" . $value['icon_kategori'] . "' /></a>";
            $tbody[] = $img;
            $button =
                "<div class='table-data-feature'>
                <button class='item editbtncat' id=" . $value['id'] . " title=Edit'>
                <i class='zmdi zmdi-edit' style='color: blue;'></i>
                </button>
                <button type='button' class='item deletebtncat' id=" . $value['id'] . " data-toggle='tooltip' data-placement='top' title='Delete'>
                    <i class='zmdi zmdi-delete' style='color: red;'></i>
                </button>
                </div>";
            $tbody[] = $button;
            $data[] = $tbody;
        }
        if ($kategori->count() > 0) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    // function add kategori
    public function addCat(Request $request)
    {
        if ($_POST["action"] == "Add") {
            $imageName = $request->icon_kategori->getClientOriginalName();
            $request->icon_kategori->move(public_path('image/icon'), $imageName);
            $kategori = new Kategori();
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->icon_kategori = $imageName;
            $kategori->save();
            echo 'Data Inserted';
        }
    }

    // function get id kategori
    public function getIdCat()
    {
        $output = array();
        $data = Kategori::find($_POST["id"]);
        $output['nama_kategori'] = $data->nama_kategori;
        if ($data->icon_kategori != '') {
            $output['icon_kategori'] = '<img style="width: 100%;" src="/image/icon/' . $data->icon_kategori . '" /><input type="hidden" name="hidden_barang_image" value="' . $data->icon_kategori . '"/>';
        } else {
            $output['icon_kategori'] = '<input type="hidden" name="hidden_barang_image" value=""/>';
        }
        echo json_encode($output);
    }

    // function edit kategori
    public function editCat(Request $request)
    {
        if ($_POST["action"] == "Edit") {
            if ($request->icon_kategori == null) {
                $idkategori = $request->id;
                $kategori = Kategori::find($idkategori);
                $kategori->nama_kategori = $request->nama_kategori;
                $kategori->save();
                echo 'Data Updated';
            } else {
                $imageName = $request->icon_kategori->getClientOriginalName();
                $request->icon_kategori->move(public_path('image/icon'), $imageName);
                $idkategori = $request->id;
                $kategori = Kategori::find($idkategori);
                $kategori->nama_kategori = $request->nama_kategori;
                $kategori->icon_kategori = $imageName;
                $kategori->save();
                echo 'Data Updated';
            }
        }
    }

    //  function delete kategori
    public function deleteCat()
    {
        $kategori = Kategori::find($_POST["id"]);
        unlink(public_path() . '/image/icon/' . $kategori->icon_kategori);
        $kategori->delete();
    }
}
