@extends('layouts.app')

@section('content')





    <div class="container card col-md-8 offset-0 mx-5 px-3 py-3">
        <form method="POST" action="{{route('supplier.store')}}">
            @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="gstno">GST No</label>
                <input type="text" name="gstno" placeholder="Enter GST no" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter Supplier Name" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="text" name="email" placeholder="Enter e-mail address" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="mobile">Mobile </label>
                <input type="text" name="mobile" placeholder="Enter mobile no" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="address">Address</label>
                <textarea name="address" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
        
        </form>



    </div>
@endsection