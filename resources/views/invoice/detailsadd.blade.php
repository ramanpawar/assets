@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="invoice_no" disabled>Invoice No</label>
            <input type="text" name="invoice_no" class="form-control mb-2" disabled>
            <button type="button" class="btn btn-secondary" onclick="addconsumable()">Add consumable</button>
            <button type="button" class="btn btn-secondary" onclick="additem()">Add Items</button>
        </div>  
    </div>
</div>

<div class="container card px-3 py-3" id="items">
        <div class="row">
            <input type="text" name="consumable[]" id="" class="form-control col-md-3" placeholder="">
            <input type="number" name="qty[]" id="" class="form-control col-md-3 offset-1">
            <input type="number" name="rate[]" id="" class="form-control col-md-3 offset-1">
        </div>
</div>
        




<div id="consumable">
<select class="form-control" name="catcon[]">
    <option selected disabled></option>
    @foreach ($categories as $cat)
    @if ($cat->consumable == 1)
    <option value="{{$cat->id}}">{{$cat->name}}</option>
    @endif
    @endforeach
</select>
</div>

<div id="hardware">
<select id="hardware" class="form-control" name="cathard[]">
        <option selected disabled></option>
        @foreach ($categories as $cat)
        @if ($cat->consumable == 0)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endif
        @endforeach
    </select>
</div>

@endsection

@section('script')
function addconsumable(){
    console.log('add consumable called');
}

function additem(){
    console.log('add item called');
}

$(document).ready(function(){
    $('#consumable').hide();
    $('#hardware').hide();
    
});
    
@endsection