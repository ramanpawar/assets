@extends('layouts.app')

@section('content')

<div class="row">
    <div class="container col-md-10">
        <p class="lead">Consumables request</p>
        <table class="table table-striped">
            <thead>
                <th>S.No.</th>
                <th>User Name</th>
                <th>Section</th>
                <th>Consumable Name</th> 
                <th></th>
                <th></th> 
            </thead>
            <tbody>
                @foreach ($consumables as $key =>$consumable)
                    <tr>
                    <td>{{++$key}}</td>
                    <td>{{$consumable->user->name}}</td>
                    <td>{{$consumable->user->section->name}}</td>
                    <td>{{$consumable->con->name.' '.$consumable->con->cat->name}}</td>
                    <td>@if ($consumable->approved == Null)
                            <a href="/request/approve/{{$consumable->id}}" class="btn btn-secondary">Approve</a>
                    @endif</td>
                    <td>@if ($consumable->received == 0)
                            <a href="/request/reject/{{$consumable->id}}" class="btn btn-danger">Reject</a>
                    @endif</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container col-md-10">
        <p class="lead">Hardware requests</p>
        <table class="table table-striped">
            <thead>
                <th>S.No</th>
                <th>Section</th>
                <th>Item</th>
                <th>Remarks</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($hardware as $key => $item)
                    <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->user->section->name}}</td>
                    <td>{{$item->cat->name}}</td>
                    <td>{{$item->remarks}}</td>
                    <td>@if ($item->approved == Null)
                            <a href="/request/approve/{{$item->id}}" class="btn btn-secondary">Approve</a>
                    @endif</td>
                    <td>
                        @if ($item->received == 0)
                        <a href="/request/reject/{{$item->id}}" class="btn btn-danger">Reject</a>
                        @endif</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
    
@endsection