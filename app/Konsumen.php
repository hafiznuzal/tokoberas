<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konsumen extends Model
{
    use SoftDeletes;

    protected $table = 'konsumen';

    protected $guarded = [];
}
