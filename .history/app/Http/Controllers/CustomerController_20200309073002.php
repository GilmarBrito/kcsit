<?php

namespace App\Http\Controllers;

use App\Account;
use App\Customer;
use App\Repositories\Repository;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    protected $model;

    public function __construct(Customer $customer)
    {
        $this->model = new CustomerRepository();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = $this->model->simpleJoin('customers', 'accounts', 'id', 'customer_id');

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'email' => 'required|email|unique:customers,email'
        ]);

        $customer = new Customer([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'country' => $request->get('country'),
            'email' => $request->get('email')
        ]);
        
        $customer->save();
        
        $bonus = rand(5,20);
        
        $account = new Account([
            'customer_id' => $customer->id,
            'current_balance' => 0,
            'bonus' => $bonus
        ]);

        $customer->account()->save($account);

        return redirect('/customers')->with('success', 'Customer saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'email' => 'required'
        ]);

        $customer = Customer::find($id);
        $customer->first_name =  $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->gender = $request->get('gender');
        $customer->country = $request->get('country');
        $customer->email = $request->get('email');
        $customer->save();

        return redirect('/customers')->with('success', 'Customer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/customers')->with('success', 'Customer deleted!');
    }
}
