<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Repositories\Repository;
use App\Customer;

class CustomerRepository extends Repository
{

    public function __construct()
    {
        $customer = new Customer;
        parent::__construct($customer);
    }

    public function simpleJoin($leftTable, $rightTable, $leftTableId, $rightTableFKId)
    {
        $result = DB::table($leftTable)
        ->join($rightTable, $leftTable . '.'. $leftTableId, '=', $rightTable . '.' . $rightTableFKId)
        ->select($leftTable . '.*', $rightTable . '.*')
        ->get();
        return $result;
    }

}
