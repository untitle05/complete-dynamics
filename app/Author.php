<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model 
{

    protected $table = 'authors';
    public $timestamps = true;

    protected $fillable = [
        'name', 'city_id'
    ];
    protected $dates = ['deleted_at'];

    public function cities()
    {
        return $this->belongsTo('App\City');
    }

}