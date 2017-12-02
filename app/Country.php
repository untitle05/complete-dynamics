<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model 
{

    protected $table = 'countries';
    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    protected $dates = ['deleted_at'];

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function authors()
    {
        return $this->hasManyThrough('App\Author', 'App\City',
            'country_id', 'city_id', 'id', 'id');
    }

}