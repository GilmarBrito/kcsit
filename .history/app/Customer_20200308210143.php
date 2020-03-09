<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'country',
        'email'      
    ];

    public function account()
    {
        $this->hasOne('App\Account');
    }
}
