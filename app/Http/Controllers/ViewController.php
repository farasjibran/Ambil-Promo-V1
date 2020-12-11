<?php

namespace App\Http\Controllers;

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
}
