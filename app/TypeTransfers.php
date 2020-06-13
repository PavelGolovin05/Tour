<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTransfers extends Model
{
    protected $table = 'type_transfers';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
