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
        $account = new Account;
        parent::__construct($account);
    }

    public function fillAccount(array $accountArray)
    {
        $accountArray += ['bonus' => rand(5,20)];

        $account = $this->create($accountArray );

        return $account;
    }
}
