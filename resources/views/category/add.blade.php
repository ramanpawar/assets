@extends('layouts.app')

@section('content')
    @if (count($category) > 0)
    <div class="container card px-3 py-3 col-md-6 mb-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Section Id</th>
                    <th>Section Name</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($category as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                </tr>
        @endforeach
            </tbody>
            
        </table>
        {{ $category->links() }}
    </div>
    @endif
    <div class="card container px-3 py-3 col-md-6">
        <form action="{{route('category.store')}}" method="POST">
            @csrf
        <div class="form-group">
            <label for="category">Name</label>
            <input type="text" class="form-control" name="category" placeholder="Enter category name">
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>
@endsection