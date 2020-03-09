<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\Customer;
use App\Transaction;
use App\Rules\AmountBalanceValidator;

class AccountController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        $account = $customer->account;
        $transactions = $account->transactions;
        return view('accounts.index', compact('customer', 'account', 'transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createTransaction($id)
    {
        $customer = Customer::find($id);
        $account = $customer->account;
        return view('accounts.create', compact('customer', 'account'));
        
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTransaction(Request $request)
    {
        $transaction_type = $request->transaction_type;
        $current_balance = $request->current_balance;
        $request->validate([
            'transaction_type' => 'required',
            'amount' => [
                'required',
                new AmountBalanceValidator($transaction_type, $current_balance)
            ]
        ]);
        
        $balance = ($request->transaction_type == 'Deposit')
            ? $request->current_balance + $request->amount
            : $request->current_balance - $request->amount;
        $transaction = new Transaction([
            'account_id' => $request->get('account_id'),
            'transaction_type' => $request->get('transaction_type'),
            'amount' => $request->get('amount'),
            'balance' => $balance
        ]);

        DB::beginTransaction();

        try {
            $transaction->save();
            $account = Account::find($transaction->account_id);
            $account->current_balance = $transaction->balance;
            $account->save();

            $customerId = $request->customer_id;
            
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        
        DB::commit();
        return redirect("/customers/{$customerId}/account")->with('success', 'Transaction saved!');
    }

}
