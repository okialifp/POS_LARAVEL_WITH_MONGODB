<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Barang extends Eloquent
{

    protected $connection = 'mongodb';
    protected $collection = 'barangs';

    protected $fillable = [
        'kodebarang', 'namabarang','stock','hargaawal','hargaakhir','expired'
    ];
}
