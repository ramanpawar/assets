@extends('layouts.app')

@section('content')

    <div class="row m-3">
    @foreach ($item as $it)
    @if (count($it->consumables) > 0)
   
    <div class="container card p-3 col-md-4">
        <h4>{{$it->make."  ".$it->description}}</h4>
        <ul class="list-group">
            @foreach ($it->consumables as $i)
            <li class="list-group-item">{{$i->name}}</li>
            @endforeach
        </ul>
    </div>
            
    @endif 
    @endforeach

    </div>
@endsection