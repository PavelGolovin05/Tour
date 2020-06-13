<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesRoom extends Model
{
    protected $table = 'types_room';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
