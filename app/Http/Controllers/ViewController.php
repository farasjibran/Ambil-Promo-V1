<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Diskon;
use App\KategoriBarang;
use App\PopularSlider;

class ViewController extends Controller
{
    public function detailProduct($id)
    {
        $diskon = Diskon::get();
        $detailbarang = Diskon::where('id', $id)->get();
        return view('user.detailpromo', ['detail' => $detailbarang, 'diskon' => $diskon]);
    }

    public function allPromo()
    {
        $kategori = KategoriBarang::get();
        $popular = PopularSlider::get();
        return view('user.allpromo', ['category' => $kategori, 'popular' => $popular, 'diskon' => Diskon::paginate(10)]);
    }

    public function cataloguePer($idkategori)
    {
        $kategori = KategoriBarang::get();
        $popular = PopularSlider::get();
        $kategoridiskon = Diskon::where('kategori_barang', $idkategori)->paginate(10);
        return view('user.catalogueper', ['category' => $kategori, 'popular' => $popular, 'kategoridiskon' => $kategoridiskon]);
    }

    public function contactUser()
    {
        return view('user.contact');
    }

    public function addFeed(Request $request)
    {
        if ($_POST["action"] == "Add") {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->website = $request->website;
            $contact->message = $request->message;
            $contact->save();
            echo 'Data Inserted';
        }
    }
}
