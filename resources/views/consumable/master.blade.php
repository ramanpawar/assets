@extends('layouts.app')

@section('content')
<form action="{{route('consumables.store')}}" method="POST">
    @csrf
<div class="container card px-3 py-3">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name of Consumable">
        </div>
        <div class="form-group col-md-6">
            <label for="category">Category</label>
            <select name="category" class="form-control" id="">
                <option selected disabled>Select</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="balance">Balance</label>
            <input type="number" name="balance" id="" class="form-control" placeholder="Balance of this item" value="0">
        </div>
    </div>
    <input type="submit" class="btn btn-secondary col-md-1" value="Save">
</div>
</form>
@endsection