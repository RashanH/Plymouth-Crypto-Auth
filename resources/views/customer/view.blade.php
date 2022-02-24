@extends('customer.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Laravel 9 CRUD Example</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('customers') }}"> Back</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>First Name:</th>
            <td>{{ $customer->first_name }}</td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td>{{ $customer->last_name }}</td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>{{ $customer->email }}</td>
        </tr>
 
    </table>
@endsection