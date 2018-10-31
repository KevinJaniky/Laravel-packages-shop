<?php

namespace Kjaniky\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $guarded = [];

    public function panier(){
        return $this->belongsTo('Kjaniky\Shop\Models\Panier');
    }
}
