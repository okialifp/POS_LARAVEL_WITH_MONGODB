<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class TransaksiSementara extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'transaksisementaras';

    protected $fillable = [
        'kodebarang', 'namabarang','stock','hargaawal','hargaakhir','expired'
    ];
}
