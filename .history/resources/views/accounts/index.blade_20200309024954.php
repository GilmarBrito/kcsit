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
        <caption>Favorite Colors</caption>
            <thead>
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
    <div class="col-sm-2">
        <a href="{{route('customers.create')}}" class="btn btn-primary btn-block">
            <i class="fas fa-user-plus"></i> New customer
        </a>
    </div>
</div>
@endsection
