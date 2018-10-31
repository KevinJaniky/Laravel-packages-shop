<?php

namespace Kjaniky\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Visuel extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo('Kjaniky\Shop\Models\Product', 'id', 'product_id');
    }
}
