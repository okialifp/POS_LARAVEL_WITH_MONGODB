<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Informasi extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'informasis';
}