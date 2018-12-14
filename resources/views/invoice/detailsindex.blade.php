@extends('layouts.app')

@section('content')

@if (count($invoices) > 0)
<div class="container card px-3 py-3">
    <table class="table table-striped">
        <thead>
            <th>Invoice No</th>
            <th>Date</th>
            <th>Category</th>
            <th>Details</th>
            <th>Rate</th>
            <th>Receive</th>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{$invoice->entry->invoice_no}}</td>
                    <td>{{$invoice->entry->date_of_invoice}}</td>
                    <td>{{$invoice->cat->name}}</td>
                    @if ($invoice->cat->consumable == 1)
                        <td>{{$invoice->consumable->name}}</td>
                    @else
                        <td>{{$invoice->item->make}}  {{$invoice->item->description}}</td>
                    @endif
                    <td>{{$invoice->rate}}</td>
                    <td>@if ($invoice->processed == 0)
                        <a href="/assets/receive/{{$invoice->id}}" class="btn btn-secondary">Receive</a>
                    @endif</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/invoice/create" class="btn btn-secondary col-md-2">Add invoice</a>
</div>
@else
    <div class="container">
        <p class="lead">No Entries</p>
    </div>
@endif
    
@endsection
