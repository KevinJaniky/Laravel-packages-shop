<?php
namespace Kjaniky\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $tgis->attributes['slug'] = str_slug($value);
    }

    function products(){
        return $this->belongsToMany('Kjaniky\Shop\Models\Product','id','product_id');
    }
}
