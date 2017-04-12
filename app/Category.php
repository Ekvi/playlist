<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['site_id', 'name', 'url'];

    public function site()
    {
        return $this->belongsTo('App\Site');
    }

    public function sections()
    {
        return $this->hasMany('App\Section');
    }
}
