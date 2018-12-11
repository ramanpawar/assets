@extends('layouts.app')

@section('content')

<div class="container card px-3 py-3">
    <table class="table table-striped">
        <thead>
            <th>Invoice No</th>
            <th>Date</th>
            <th>Supplier</th>
            <th>Entered</th>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{$invoice->invoice_no}}</td>
                    <td>{{$invoice->date_of_invoice}}</td>
                    <td>{{$invoice->supp->name}}</td>
                    <td>@if ($invoice->entered == 0)
                        <a href="#" class="btn btn-secondary">Enter</a>
                    @endif</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/invoice/create" class="btn btn-secondary col-md-2">Add invoice</a>
</div>
    
@endsection