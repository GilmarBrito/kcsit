@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Customers</h1>    
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
                    <td class="text-center">User Actions</td>
                    <td class="text-center">Account Actions</td>
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
                    <td>{{$customer->current_balance}}</td>
                    <td>{{$customer->bonus}}</td>
                    <td>
                        <div class="btn-toolbar" role="toolbar">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary rounded"><i class="far fa-eye"></i></button>
                                <button type="button" class="btn btn-success rounded" onclick="window.location.href='{{ route('customers.edit',$customer->id)}}'"><i class="fas fa-user-edit"></i></button>
                                <form action="{{ route('customers.destroy', $customer->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded"><i class="fas fa-user-slash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="btn-toolbar" role="toolbar">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="#" class="btn btn-outline-success rounded"><i class="fas fa-arrow-circle-up"></i> Deposit Money</a>
                                <a href="#" class="btn btn-outline-danger rounded"><i class="fas fa-arrow-circle-down"></i> Withdraw Money</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
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
