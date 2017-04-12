<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'url', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
