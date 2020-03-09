@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add a transaction</h1>
        <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <div class="form-group">    
                <label for="account_owner">Account Owner:</label>
                <input type="text" class="form-control" name="account_owner" readonly value="{{ $customer->first_name }}"/>
            </div>

            <form method="post" action="{{route('accounts.transaction.store') }}">
                @csrf
                <div class="form-group">    
                    <label for="current_balance">Current Balance:</label>
                    <input type="text" class="form-control" name="current_balance" readonly value="{{ $account->current_balance }}"/>
                </div>
                <div class="form-group">
                    <label for="transaction_type">Transaction Type:</label>
                    <select class="form-control" name="transaction_type">
                        <option value="Deposit">Deposit</option>
                        <option value="Withdraw">Withdraw</option>
                    </select>
                </div>
                <div class="form-group">    
                    <label for="amount">Amount:</label>
                    <input type="number" min="0.01" step="0.01" class="form-control" name="amount"/>
                </div>

                <button type="submit" class="btn btn-primary">Add transaction</button>
            </form>
        </div>
    </div>
</div>
@endsection
