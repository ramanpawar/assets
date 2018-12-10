@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



@if (!empty($supplier))
<div class="container card col-md-8 offset-0 mx-5 px-3 py-3">
        <h4>Edit supplier</h4>
        <form method="POST" action="{{url('/supplier'.'/'.$supplier->id)}}">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="form-group col-md-6">
                <label for="gstno">GST No</label>
                <input type="text" name="gstno" placeholder="Enter GST no" class="form-control" value="{{$supplier->gstno}}">
            </div>
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter Supplier Name" class="form-control" value="{{$supplier->name}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="text" name="email" placeholder="Enter e-mail address" class="form-control" value="{{$supplier->email}}">
            </div>
            <div class="form-group col-md-6">
                <label for="mobile">Mobile </label>
                <input type="text" name="mobile" placeholder="Enter mobile no" class="form-control" value="{{$supplier->mobile}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="address">Address</label>
                <textarea name="address" cols="30" rows="3" class="form-control">{{$supplier->address}}</textarea>
            </div>
        </div>
        <input type="submit" value="Update" class="btn btn-primary">
        
        </form>



    </div>
@else
    <div class="card container px-4 py-4">
        <h5>Supplier not found.</h5>
    </div>
@endif
    
@endsection