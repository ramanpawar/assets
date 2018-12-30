@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Consumables requested by you</h3>
    <table class="table table-striped">
        <thead>
            <th>S.no.</th>
            <th>Item requested</th>
            <th>Asset</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach ($requests as $key=>$request)
            @if ($request->consumable == 1)
            
                <tr>
                <td>{{++$key}}</td>
                <td>{{$request->con->name}}</td>
                <td>{{$request->asset->asset_no}}</td>
                <td>@if ($request->approved == 1)
                    @if ($request->received == 1)
                        Issued
                    @else
                        Approved
                    @endif
                @else
                    Pending
                @endif
                    </td>
                </tr>  
                    
            @endif              
            @endforeach
        </tbody>
    </table>
    <a href="/request/create" class="btn btn-secondary">Request</a>
</div>
    
@endsection