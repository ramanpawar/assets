@extends('layouts.app')

@section('content')

<form action="/issues" method="POST">
    @csrf
    <input type="hidden" name="request_id" value="
    @if(!empty($req)){{$req->id}}
    @endif">
    <div class="container">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="category">Category</label>
                    <select id="category" class="form-control" required>
                        <option selected disabled>Select</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if ($req->item_id == $category->id)
                            selected>{{$category->name}}</option>
                            @continue
                        @endif disabled>{{$category->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group col-md-4">
                    <label for="assets">Assets</label>
                    <select name="asset" id="assets" class="form-control" required>
                        <option value="" selected disabled>Select</option>
                    </select>
                </div>
            
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="section">Section</label>
                    <select  id="section" class="form-control" required>
                        <option selected disabled>Select</option>
                        @foreach ($sections as $section)
                    <option value="{{$section->id}}" @if ($section->id == $req->user->section->id)
                        selected>{{$section->name}}</option>
                        @continue
                    @endif disabled>{{$section->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="user">User</label>
                    <select name="user" id="user" class="form-control" required>
                        <option value='' selected disabled>Select</option>
                        @foreach ($users as $user)
                    <option value="{{$user->id}}" @if ($user->id == $req->user_id)
                        selected>{{$user->name}}</option>
                        @continue
                    @endif disabled>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    <input type="submit" value="Save" class="btn btn-secondary">
    </div>
    
</form>
    
@endsection

@section('script')
$('#category').change(function(){
    $('#assets').empty();
    $.ajax({
        url:'/aasset',
        method:'POST',
        data:{_token: '{{csrf_token()}}', category:$('#category').val()},
        success:function(data){
            $('#assets').append(data);
        },
    });
});
$('#section').change(function(){
    $('#user').empty();
    $.ajax({
        url:'/asection',
        method:'POST',
        data:{_token: '{{csrf_token()}}', section:$('#section').val()},
        success:function(data){
            $('#user').append(data);
        },
    });
});
@endsection