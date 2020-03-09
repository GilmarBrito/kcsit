<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trasaction extends Model
{
    protected $fillable = [
        'account_id',
        'transaction_type',
        'amount',
        'balance'
    ];
}
