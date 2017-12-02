<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;

    protected $fillable = [
        'name', 'country_id'
    ];

    protected $dates = ['deleted_at'];

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function authors()
    {
        return $this->hasMany('App\Author');
    }

}