<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'gender',
        'first_name',
        'last_name',
        'country',
        'email'      
    ];
}
