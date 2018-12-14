<?php

namespace App\Http\Controllers;

use App\invoice_details;
use App\category;
use Illuminate\Http\Request;
use App\invoice_entry;

class InvoiceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = invoice_details::where('processed','0')->get();
        return view('invoice.detailsindex')->with('invoices',$details);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['invoice_no'] != ''){
            $invoice = $_POST['invoice_no'];
        }else{
            return "Can't proceed without invoice no";
        }

        if($request->has('consumablecat')){
            $concount = count($_POST['consumablecat']);
            for($i=0;$i<$concount;$i++){
                $entry = new invoice_details();
                $entry->invoice_id = $invoice;
                $entry->category = $_POST['consumablecat'][$i];
                $entry->item_id = $_POST['consumableitem'][$i];
                $entry->qty = $_POST['qtyconsumable'][$i];
                $entry->rate = $_POST['rateconsumable'][$i];
                $entry->save();
            }

        }

        if($request->has('hardwarecat')){
        $hardcount = count($_POST['hardwarecat']);
            for($i=0;$i<$hardcount;$i++){
                $entry = new invoice_details();
                $entry->invoice_id = $invoice;
                $entry->category = $_POST['hardwarecat'][$i];
                $entry->item_id = $_POST['hardwareitem'][$i];
                $entry->qty = $_POST['qtyitem'][$i];
                $entry->rate = $_POST['rateitem'][$i];
                $entry->save();
            }
        }
        $invoice = invoice_entry::find($invoice);
        $invoice->entered = '1';
        $invoice->save();

        return "Invoice details successfully posted";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\invoice_details  $invoice_details
     * @return \Illuminate\Http\Response
     */
    public function show(invoice_details $invoice_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\invoice_details  $invoice_details
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice_details $invoice_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invoice_details  $invoice_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice_details $invoice_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invoice_details  $invoice_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice_details $invoice_details)
    {
        //
    }
}
