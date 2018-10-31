<?php

namespace Kjaniky\Shop\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $tgis->attributes['slug'] = str_slug($value);
    }

    public function category(){
        return $this->belongsTo('Kjaniky\Shop\Models\Categorie');
    }

    public function brand(){
        return $this->belongsTo('Kjaniky\Shop\Models\Brand');
    }

    public function visuel(){
        return $this->hasMany('Kjaniky\Shop\Models\Visuel');
    }

    public function tags(){
        return $this->belongsToMany('Kjaniky\Shop\Models\Tag');
    }

    public function promotions(){
        return $this->hasMany('Kjaniky\Shop\Models\Promotion');
    }

    public function onDiscount(){

        return $this->promotions()
        ->where('started_at','<=',\Carbon\Carbon::now())->where('finished_at','>=',\Carbon\Carbon::now())
        ->first();
    }

    public function Price(){
        if($this->onDiscount()){
            return $this->onDiscount()->prix;
        }
        return $this->prix;
    }
}
