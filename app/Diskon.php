<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    public function Kategori()
    {
        return $this->hasMany('App\Kategori', 'id', 'kategori_diskon');
    }

    public function KategoriBarang()
    {
        return $this->hasMany('App\KategoriBarang', 'id', 'kategori_barang');
    }
}
