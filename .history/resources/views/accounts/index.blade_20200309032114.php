@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">{{$customer->first_name}} {{$customer->last_name}}'s Account</h1>    
    </div>

    <div class="col-sm-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td colspan="6">Customer data</td>
                    <td colspan="2">Account data</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Gender</td>
                    <td>Country</td>
                    <td>Email</td>
                    <td>Balance</td>
                    <td>Bonus %</td>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->first_name}}</td>
                    <td>{{$customer->last_name}}</td>
                    <td>{{$customer->gender}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$account->current_balance}}</td>
                    <td>{{$account->bonus}}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
    <div class="col-sm-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td colspan="4">Transactions data</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>Transaction Type</td>
                    <td>Amount</td>
                    <td>Balance</td>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->transaction_type}}</td>
                    <td>{{$transaction->amount}}</td>
                    <td>{{$transaction->balance}}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    <div class="col-sm-2">
        <a href="{{route('accounts.transaction')}}" class="btn btn-primary btn-block">
        <i class="fas fa-exchange-alt"></i> New transaction
        </a>
    </div>
</div>
@endsection
