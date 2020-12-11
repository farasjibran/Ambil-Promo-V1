<?php

namespace App\Http\Controllers;

use App\Diskon;
use Illuminate\Http\Request;

class DiskonController extends Controller
{
    // function show data user in array to use in datatable with ajax
    public function dataDisc()
    {
        $diskon = Diskon::get();
        foreach ($diskon as $value) {
            $tbody = array();
            $tbody[] = $value['id'];
            foreach ($value->Kategori as $item) {
                $tbody[] = $item->nama_kategori;
            }
            foreach ($value->KategoriBarang as $item) {
                $tbody[] = $item->kategori_barang;
            }
            $tbody[] = $value['title'];
            $tbody[] = $value['deskripsi'];
            $tbody[] = $value['tanggal_diskon'];
            $tbody[] = $value['tanggal_berakhir'];
            $img = "<img style='width: 100%;' src='/image/" . $value['image'] . "' /></a>";
            $tbody[] = $img;
            if ($value['status'] == "open") {
                $tbody[] = "<a style='color: green'>open</a>";
            } else {
                $tbody[] = "<a style='color: red'>close</a>";
            }
            $tbody[] = "Rp. " . $value['price'];
            $button =
                "<div class='table-data-feature'>
                <button class='item editbtndisc' id=" . $value['id'] . " title=Edit'>
                <i class='zmdi zmdi-edit' style='color: blue;'></i>
                </button>
                <button type='button' class='item deletebtndisc' id=" . $value['id'] . " data-toggle='tooltip' data-placement='top' title='Delete'>
                    <i class='zmdi zmdi-delete' style='color: red;'></i>
                </button>
                </div>";
            $tbody[] = $button;
            $data[] = $tbody;
        }
        if ($diskon->count() >  0) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    // function add diskon
    public function addDisc(Request $request)
    {
        if ($_POST["action"] == "Add") {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('image'), $imageName);
            $diskon = new Diskon();
            $diskon->kategori_diskon = $request->kategori;
            $diskon->kategori_barang = $request->kategori_barang;
            $diskon->title = $request->title;
            $diskon->deskripsi = $request->deskripsi;
            $diskon->tanggal_diskon = $request->tanggal_diskon;
            $diskon->tanggal_berakhir = $request->tanggal_berakhir;
            $diskon->status = $request->status;
            $diskon->price = $request->price;
            $diskon->image = $imageName;
            $diskon->save();
            echo 'Data Inserted';
        }
    }

    // function get id diskon
    public function getIdDisc()
    {
        $output = array();
        $data = Diskon::find($_POST["id"]);
        $output['kategori_diskon'] = $data->kategori_diskon;
        $output['kategori_barang'] = $data->kategori_barang;
        $output['title'] = $data->title;
        $output['deskripsi'] = $data->deskripsi;
        $output['tanggal_diskon'] = $data->tanggal_diskon;
        $output['tanggal_berakhir'] = $data->tanggal_berakhir;
        $output['status'] = $data->status;
        $output['price'] = $data->price;
        if ($data->image != '') {
            $output['image'] = '<img style="width: 100%;" src="/image/' . $data->image . '" /><input type="hidden" name="hidden_barang_image" value="' . $data->image . '"/>';
        } else {
            $output['image'] = '<input type="hidden" name="hidden_barang_image" value=""/>';
        }
        echo json_encode($output);
    }

    // function edit
    public function editDisc(Request $request)
    {
        if ($_POST["action"] == "Edit") {
            if ($request->image == null) {
                $iddiskon = $request->id;
                $diskon = Diskon::find($iddiskon);
                $diskon->kategori_diskon = $request->kategori;
                $diskon->kategori_barang = $request->kategori_barang;
                $diskon->title = $request->title;
                $diskon->deskripsi = $request->deskripsi;
                $diskon->tanggal_diskon = $request->tanggal_diskon;
                $diskon->tanggal_berakhir = $request->tanggal_berakhir;
                $diskon->status = $request->status;
                $diskon->price = $request->price;
                $diskon->save();
                echo 'Data Updated';
            } else {
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('image'), $imageName);
                $iddiskon = $request->id;
                $diskon = Diskon::find($iddiskon);
                $diskon->kategori_diskon = $request->kategori;
                $diskon->kategori_barang = $request->kategori_barang;
                $diskon->title = $request->title;
                $diskon->deskripsi = $request->deskripsi;
                $diskon->tanggal_diskon = $request->tanggal_diskon;
                $diskon->tanggal_berakhir = $request->tanggal_berakhir;
                $diskon->status = $request->status;
                $diskon->price = $request->price;
                $diskon->image = $imageName;
                $diskon->save();
                echo 'Data Updated';
            }
        }
    }

    // function delete
    public function deleteDisc()
    {
        $diskon = Diskon::find($_POST["id"]);
        unlink(public_path() . '/image/' . $diskon->image);
        $diskon->delete();
    }
}
