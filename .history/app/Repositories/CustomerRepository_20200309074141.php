<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Repositories\Repository;
use App\Customer;
use Illuminate\Http\Request;

class CustomerRepository extends Repository
{

    public function __construct()
    {
        $customer = new Customer;
        parent::__construct($customer);
    }

    public static function validateRequest(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'email' => 'required|email|unique:customers,email'
        ]);
    }

}
