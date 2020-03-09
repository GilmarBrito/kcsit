<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'customer_id',
        'current_balance',
        'bonus'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
