@extends('layouts.app')

@section('content')
    @if (count($suppliers) > 0)
        <div class="card container px-5 py-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>GST No</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>E-mail</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                    <tr>
                    <td>{{$supplier->name}}</td>
                    <td>{{$supplier->gstno}}</td>
                    <td>{{$supplier->address}}</td>
                    <td>{{$supplier->mobile}}</td>
                    <td>{{$supplier->email}}</td>
                    <td><button type="button" class="btn btn-secondary" value="Edit"><a href="/supplier/{{$supplier->id}}/edit" style="color:white;text-decoration:none;">Edit</a></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-secondary col-md-2 offset-0"><a href="/supplier/create" style="color:white;text-decoration:none;">Add supplier</a></button>
        </div>
    @else
        <div class="card container px-5 py-5">
            <h5>No Suppliers</h5>
        </div>
    @endif
@endsection