@extends('layouts.app')

@section('content')
<div class="container card px-3 py-3">
    <h5>Consumables list</h5>
    <table class="table table-striped">
        <thead>
            <th>Category</th>
            <th>Name</th>
            <th>Balance</th>
            <th>Edit</th>
        </thead>
        <tbody>
            @foreach ($consumables as $consumable)
                <tr>
                    <td>{{$consumable->cat->name}}</td>
                    <td>{{$consumable->name}}</td>
                    <td>{{$consumable->balance}}</td>
                    <td><a href="/consumables/{{$consumable->id}}/edit" class="btn btn-secondary">Edit</a></td>
                </tr>
            @endforeach
            
            
        </tbody>
    </table>
    <a href="/consumables/create" class="btn btn-secondary col-md-2 col-sm-3">Add consumable</a>
</div>

    
@endsection