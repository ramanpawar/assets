@extends('layouts.app')

@section('content')
<div class="row">
<div class="container col-md-4 card">
    <p class="lead">Consumable request</p>
    <form method="POST" action="/request">
        @csrf
    <div class="row">
        <div class="form-group col-md-6">
            <label for="asset">Assets</label>
            <select name="asset" id="asset" class="form-control" required>
                <option value="" selected disabled>Select</option>
                @foreach ($assets as $asset)
                    <option value="{{$asset->asset_id}}">{{$asset->asset_no.'  '.$asset->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="consumable">Consumable</label>
            <select name="consumable" id="category" class="form-control" required>
                <option value="" selected disabled>Select</option>
            </select>
        </div>
        <input type="submit" value="Request" class="btn btn-secondary ml-3">
    </div>
    </form>
</div>

<div class="container col-md-4 card">
    <p class="lead">Hardware request</p>
    <form action="/request" method="POST">
        @csrf
    <div class="row">
        <div class="form-group col-md-5">
            <label for="category">Category</label>
            <select name="category" id="" class="form-control">
                <option value="" selected disabled>Select</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-5">
            <label for="user">User</label>
            <select name="user" id="" class="form-control">
                <option value="" disabled selected>Select</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group px-0">
        <label for="remarks">Remark</label>
        <textarea name="remarks" class="form-control" id="" cols="20" rows="3"></textarea>
    </div>
    <input type="submit" value="Request" class="btn btn-secondary">
</div>
</form>
</div>

@endsection

@section('script')

$('#asset').change(function(){
    $("#category").empty();
    $.ajax({
        url:'/acategory/'+$('#asset').val(),
        method:"GET",
        success: function(data){
          $('#category').append(data);  
        },
    });
});
    
@endsection