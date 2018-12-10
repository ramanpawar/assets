@extends('layouts.app')

@section('content')
    @if (count($section) > 0)
    <div class="container card px-3 py-3 col-md-6 mb-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Section Id</th>
                    <th>Section Name</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($section as $sec)
                <tr>
                    <td>{{$sec->id}}</td>
                    <td>{{$sec->name}}</td>
                </tr>
        @endforeach
            </tbody>
            
        </table>
        {{ $section->links() }}
    </div>
    @endif
    <div class="card container px-3 py-3 col-md-6">
        <form action="{{route('section.store')}}" method="POST">
            @csrf
        <div class="form-group">
            <label for="section">Name</label>
            <input type="text" class="form-control" name="section" placeholder="Enter section name">
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>
@endsection