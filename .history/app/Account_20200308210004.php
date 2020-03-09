<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'customer_id',
        'current_balance',
        'bonuses'
    ];
}
