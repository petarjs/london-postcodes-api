<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
    protected $table = 'codes';

    protected $perPage = 50;
}
