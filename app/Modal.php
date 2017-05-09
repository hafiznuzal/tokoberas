<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    protected $table = 'modal';

    public function inventory()
    {
        return $this->hasMany('App\Inventory');
    }

    public function produsen()
    {
        return $this->belongsTo('App\Produsen');
    }

    public function terkait()
    {
        $inventory = $this->inventory;
        $string = 'Ada ' . $inventory->count() . ' inventory.';
        if ($inventory->count() > 0) {
            
        }
    }
}
