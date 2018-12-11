@extends('layouts.app')

@section('content')
<form action="/consumables/{{$consumable->id}}" method="POST">
    @csrf
    @method('PUT')
<div class="container card px-3 py-3">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name of Consumable" value="{{$consumable->name}}">
        </div>
        <div class="form-group col-md-6">
            <label for="category">Category</label>
            <select name="category" class="form-control" id="">
                <option selected disabled>Select</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if ($consumable->category == $category->id)
                    selected
                @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="balance">Balance</label>
        <input type="number" name="balance" id="" class="form-control" placeholder="Balance of this item" value="{{$consumable->balance}}">
        </div>
    </div>
    <input type="submit" class="btn btn-secondary col-md-2" value="Update">
</div>
</form>
@endsection