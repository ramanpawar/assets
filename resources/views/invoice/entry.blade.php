@extends('layouts.app')

@section('content')


<div class="container card px-3 py-3">
    <form action="{{route('invoice.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="invoice_no">Invoice No</label>
                <input type="text" name="invoice_no" id="" class="form-control" placeholder="Invoice No">
            </div>
            <div class="form-group col-md-6">
                <label for="date">Invoice No</label>
                <input type="date" name="date" id="" class="form-control" placeholder="date">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="supplier">Supplier</label>
                <select name="supplier" id="" class="form-control">
                    <option selected disabled>Select</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="submit" value="Save" class="btn btn-secondary col-md-1">
    </form>
</div>
    
@endsection