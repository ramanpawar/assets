@extends('layouts.app')

@section('content')
<form action="/relation" method="POST">
    @csrf
    <div class="row ml-5">
        <div class="card  col-md-5 mx-1 px-4 py-3">
            <label for="item">Select Item</label>
            <select name="item" id="" class="form-control">
                <option selected disabled>Select</option>
                @foreach ($items as $item)
                <option value="{{$item->id}}">{{$item->make." ".$item->description}}</option>
                @endforeach
            </select>
        </div>

        <div class="card col-md-5 mx-1 px-4 py-3">
            <label for="consumable">Select Consumable</label>
            <select multiple name="consumable[]" id="" class="form-control">
                @foreach ($consumable as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        
    </div>
    <button type="submit" value="Save" class="btn btn-secondary ml-5 my-3">Save</button>
</form>
@endsection