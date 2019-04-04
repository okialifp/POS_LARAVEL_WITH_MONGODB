<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class TransaksiBeneran extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'transaksibenerans';

    protected $fillable = [
        'kodebarang', 'namabarang','stock','hargaawal','hargaakhir','expired'
    ];
}
