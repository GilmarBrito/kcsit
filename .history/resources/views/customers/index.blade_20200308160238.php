@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">

    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}  
    </div>
    @endif
    </div>
    <div class="col-sm-12">
        <h1 class="display-3">Customers</h1>    
        <div>
            <a style="margin: 19px;" href="{{route('customers.create')}}" class="btn btn-primary">New customer</a>
        </div>  
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Gender</td>
                    <td>Country</td>
                    <td>Email</td>
                    <td colspan="4" >Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->first_name}}</td>
                    <td>{{$customer->last_name}}</td>
                    <td>{{$customer->gender}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->email}}</td>
                    <td>
                        <a href="{{ route('customers.edit',$customer->id)}}" class="btn btn-primary w-100">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('customers.destroy', $customer->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100" type="submit">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary w-100">Deposit Money</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary w-100">Withdraw Money</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
