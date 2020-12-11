<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\User;
use App\Role;
use App\Diskon;
use App\KategoriBarang;
use App\PopularSlider;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboardView()
    {
        // count user
        $users = User::get();
        $userscount = $users->count();

        // count discount
        $diskon = Diskon::get();
        $todaydiskon = Diskon::where('tanggal_diskon', Carbon::today())->get();
        $diskoncount = $diskon->count();

        // count kategori
        $kategori = Kategori::get();
        $kategoricount = $kategori->count();

        // count role
        $role = Role::get();
        $roleAcount = $role->count();

        // count slider
        $slider = PopularSlider::get();
        $slidercount = $slider->count();

        return view('admin.dashboardadmin', ['countuser' => $userscount, 'countkategori' => $kategoricount, 'countdiskon' => $diskoncount, 'discon' => $todaydiskon, 'countrole' => $roleAcount, 'countslider' => $slidercount]);
    }

    public function viewUser()
    {
        return view('admin.datauser');
    }

    public function viewDisc()
    {
        // get kategori promo
        $kategory = Kategori::get();

        // get kategori barang
        $ktbarang = KategoriBarang::get();
        return view('admin.datadiskon', ['kategori' => $kategory, 'kategoribarang' => $ktbarang]);
    }

    public function viewCat()
    {
        return view('admin.datakategori');
    }

    public function viewRole()
    {
        return view('admin.datarole');
    }

    public function viewKtBarang()
    {
        return view('admin.datakategoribarang');
    }

    public function ViewPopular()
    {
        // get kategori barang
        $ktbarang = KategoriBarang::get();

        return view('admin.datapopular', ['kategoribarang' => $ktbarang]);
    }

    public function ViewSuggestion()
    {
        return view('admin.datacomment');
    }
}
