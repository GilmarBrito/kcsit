<?php

namespace App\Http\Controllers;

use App\Account;
use App\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\AccountRepository;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = DB::table('customers')
        ->join('accounts', 'customers.id', '=', 'accounts.customer_id')
        ->select('customers.*', 'accounts.current_balance', 'orders.bonus')
        ->get();

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
        CustomerRepository::validateRequest($request);
        
        $customerArray = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'country' => $request->get('country'),
            'email' => $request->get('email')
        ];
        
        $customer = $this->model->create($customerArray);
        
        $accountArray = [
            'customer_id' => $customer->id,
            'current_balance' => 0,
        ];

        $account = new AccountRepository();
        $account->fillAccount($accountArray);

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
        $customer = $this->model->show($id);
        dd($customer, $id);
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
        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'gender' => 'required',
        //     'country' => 'required',
        //     'email' => 'required'
        // ]);
        CustomerRepository::validateRequest($request);

        $customerArray = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'country' => $request->get('country'),
            'email' => $request->get('email')
        ];
        
        $customer = $this->model->update($customerArray, $id);
        

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
