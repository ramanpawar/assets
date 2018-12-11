<?php

namespace App\Http\Controllers;

use App\invoice_entry;
use App\supplier;
use Illuminate\Http\Request;

class InvoiceEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoice_entry::all();
        return view('invoice.index')->with('invoices',$invoices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = supplier::all();
        return view('invoice.entry')->with('suppliers',$suppliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'invoice_no' => 'required',
            'date' => ['required','date'],
            'supplier' => 'required',
        ]);

        $invoice = new invoice_entry();
        $invoice->invoice_no = $request['invoice_no'];
        $invoice->date_of_invoice = $request['date'];
        $invoice->supplier_id = $request['supplier'];
        $invoice->save();

        return redirect('/invoice');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\invoice_entry  $invoice_entry
     * @return \Illuminate\Http\Response
     */
    public function show(invoice_entry $invoice_entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\invoice_entry  $invoice_entry
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice_entry $invoice_entry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invoice_entry  $invoice_entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice_entry $invoice_entry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invoice_entry  $invoice_entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice_entry $invoice_entry)
    {
        //
    }
}
