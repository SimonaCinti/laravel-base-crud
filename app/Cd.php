<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'description'
    ];

}
