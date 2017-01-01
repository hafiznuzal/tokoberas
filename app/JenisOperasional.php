<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisOperasional extends Model
{
    use SoftDeletes;

    protected $table = 'jenis_operasional';

    protected $guarded = [];
}
