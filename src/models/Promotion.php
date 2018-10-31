<?php

namespace Kjaniky\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded = [];

    protected $dates = [
        'started_at',
        'finished_at'
    ];

    public function product(){
        return $this->belongsTo('Kjaniky\Shop\Models\Product');
    }
}
