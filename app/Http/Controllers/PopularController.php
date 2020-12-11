<?php

namespace App\Http\Controllers;

use App\PopularSlider;
use Illuminate\Http\Request;

class PopularController extends Controller
{
    // function show data user in array to use in datatable with ajax
    public function dataPop()
    {
        $popularslider = PopularSlider::get();
        foreach ($popularslider as $value) {
            $tbody = array();
            $tbody[] = $value['id'];
            $tbody[] = $value['title'];
            foreach ($value->KategoriBarang as $item) {
                $tbody[] = $item->kategori_barang;
            }
            $img = "<img style='width: 100%;' src='/image/popular/" . $value['image'] . "' /></a>";
            $tbody[] = $img;
            $button =
                "<div class='table-data-feature'>
                 <button class='item editbtnpop' id=" . $value['id'] . " title=Edit'>
                 <i class='zmdi zmdi-edit' style='color: blue;'></i>
                 </button>
                 <button type='button' class='item deletebtnpop' id=" . $value['id'] . " data-toggle='tooltip' data-placement='top' title='Delete'>
                     <i class='zmdi zmdi-delete' style='color: red;'></i>
                 </button>
                 </div>";
            $tbody[] = $button;
            $data[] = $tbody;
        }
        if ($popularslider->count() >  0) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    // function add popular slider
    public function addPop(Request $request)
    {
        if ($_POST["action"] == "Add") {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('image/popular'), $imageName);
            $popularslider = new PopularSlider();
            $popularslider->title = $request->title;
            $popularslider->kategori_barang = $request->kategori_barang;
            $popularslider->image = $imageName;
            $popularslider->save();
            echo 'Data Inserted';
        }
    }

    // function get id popular slider
    public function getIdPop()
    {
        $output = array();
        $data = PopularSlider::find($_POST["id"]);
        $output['title'] = $data->title;
        $output['kategori_barang'] = $data->kategori_barang;
        if ($data->image != '') {
            $output['image'] = '<img style="width: 100%;" src="/image/popular/' . $data->image . '" /><input type="hidden" name="hidden_barang_image" value="' . $data->image . '"/>';
        } else {
            $output['image'] = '<input type="hidden" name="hidden_barang_image" value=""/>';
        }
        echo json_encode($output);
    }

    // function edit popular slider
    public function editPop(Request $request)
    {
        if ($_POST["action"] == "Edit") {
            if ($request->image == null) {
                $idpopular = $request->id;
                $popular = PopularSlider::find($idpopular);
                $popular->kategori_barang = $request->kategori_barang;
                $popular->title = $request->title;
                $popular->save();
                echo 'Data Updated';
            } else {
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('image/popular'), $imageName);
                $idpopular = $request->id;
                $popular = PopularSlider::find($idpopular);
                $popular->kategori_barang = $request->kategori_barang;
                $popular->title = $request->title;
                $popular->image = $imageName;
                $popular->save();
                echo 'Data Updated';
            }
        }
    }

    // function delete popular slider
    public function deletePop()
    {
        $popular = PopularSlider::find($_POST["id"]);
        unlink(public_path() . '/image/popular/' . $popular->image);
        $popular->delete();
    }
}
