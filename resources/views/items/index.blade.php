@extends('layouts.app')

@section('content')
<div class="container card px-3 py-3">
    <table class="table table-striped">
        <thead class="thead-dark">
                <th>Category</th>
                <th>Make</th>
                <th>Description</th>
                <th>Edit</th>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr class="table-info">
                <td>{{$item->cat->name}}</td>
                <td>{{$item->make}}</td>
                <td>{{$item->description}}</td>
                <td><a class="btn btn-secondary" href="{{'/items'.'/'.$item->id.'/edit'}}">Edit</a></td>
            </tr>    
            @endforeach
            
        </tbody>
    </table>
    <a class="btn btn-secondary col-md-1" href="/items/create">Add item</a>
</div>
    
@endsection