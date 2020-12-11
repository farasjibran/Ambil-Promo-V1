<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PopularSlider extends Model
{
    public function KategoriBarang()
    {
        return $this->hasMany('App\KategoriBarang', 'id', 'kategori_barang');
    }
}
