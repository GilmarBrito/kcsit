<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Repositories\Repository;
use App\Account;
use App\Customer;

class AccountRepository extends Repository
{

    public function __construct()
    {
        $customer = new Account;
        parent::__construct($customer);
    }

    public static function fillAccount(array $account)
    {
        $account += ['bonus' => rand(5,20)];

        $customer = Customer::find($account->customer_id)->account()->save($account);
    }
}
