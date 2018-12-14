@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="lead">Asset addition</p>
    </div>

    <div class="container">
        <div class="row">
            <strong class="col-md-2 mx-2 px-0">Invoice No</strong>
            <strong class="col-md-2 mx-2 px-0">Category</strong>
            <strong class="col-md-3 mx-2 px-0">Description</strong>
            <strong class="col-md-1 mx-2 px-0">Quantity</strong>
        </div>

        <div class="row">
            <input type="text" disabled value="{{$invoice->entry->invoice_no}}" class="form-control col-md-2 mx-2">
            <input type="text" disabled value="{{$invoice->cat->name}}" class="form-control col-md-2 mx-2">
            <input type="text" disabled value=
            @if ($invoice->cat->consumable == 1)
                {{$invoice->consumable->name}}
            @else
                "{{$invoice->item->make.' '.$invoice->item->description}}"
            @endif class="form-control col-md-3 mx-2">
            <input type="text" disabled value="{{$invoice->qty}}" class="form-control col-md-1 mx-2">
        </div>
    </div>
    <div class="container card my-3 py-3">
        <form action="/assets/add" method="POST">
            @csrf
            <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
    @for ($i = 0; $i < $invoice->qty; $i++)
            <div class="row">
            <strong class="mt-3 mx-2">{{$i+1}}</strong>
            <input type="text" placeholder="Enter product code" name="product[]" required class="form-control col-md-4 my-2">
            </div>
    @endfor
            <input type="submit" value="Save" class="btn btn-secondary">
        </form>
    </div>

@endsection