<?php

namespace Kjaniky\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $guarded = [];

    public function panier(){
        return $this->belongsTo('Kjaniky\Shop\Models\Panier');
    }

    public function product(){
        return $this->belongsTo('Kjaniky\Shop\Models\Product');
    }
}
