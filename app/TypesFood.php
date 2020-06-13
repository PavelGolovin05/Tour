<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesFood extends Model
{
    protected $table = 'types_food';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
