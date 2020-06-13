<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesService extends Model
{
    protected $table = 'types_service';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
