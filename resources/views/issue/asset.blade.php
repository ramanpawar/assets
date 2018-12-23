@extends('layouts.app')

@section('content')
    <div class="card container">
        <form action="/issues" method="POST">
            @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="category">Category</label>
                <select id="category" class="form-control">
                    <option selected disabled>Select</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
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
                <select  id="section" class="form-control">
                    <option selected disabled>Select</option>
                    @foreach ($sections as $section)
                <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="user">User</label>
                <select name="user" id="user" class="form-control" required>
                    <option value='' selected disabled>Select</option>
                </select>
            </div>
        </div>

        <input type="submit" value="Save" class="btn btn-secondary">
        </form>
    </div>
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