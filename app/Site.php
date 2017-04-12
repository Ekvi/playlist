<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['name', 'url'];

    public function categories()
    {
        return $this->hasMany('App\Category');
    }
}
