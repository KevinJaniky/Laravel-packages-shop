<?php

namespace Kjaniky\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function lines(){
        return $this->hasMany('Kjaniky\Shop\Models\Line');
    }

    public function paiement(){
        return $this->hasOne('Kjaniky\Shop\Models\Paiement');
    }

}
