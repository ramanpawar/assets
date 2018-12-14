<?php

namespace App\Http\Controllers;

use App\asset_master;
use App\invoice_details;
use Carbon\Carbon;
use App\consumable;

use Illuminate\Http\Request;

class AssetMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\asset_master  $asset_master
     * @return \Illuminate\Http\Response
     */
    public function show(asset_master $asset_master)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\asset_master  $asset_master
     * @return \Illuminate\Http\Response
     */
    public function edit(asset_master $asset_master)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\asset_master  $asset_master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asset_master $asset_master)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asset_master  $asset_master
     * @return \Illuminate\Http\Response
     */
    public function destroy(asset_master $asset_master)
    {
        //
    }

    public function addview($id)
    {
        $invoice_detail = invoice_details::find($id);
        if($invoice_detail->cat->consumable == 0){

        if(!empty($invoice_detail)){
        return view('asset.index')->with('invoice',$invoice_detail);
        }
        return "Go by process";
    }
    else{
        $consumable = consumable::find($invoice_detail->item_id);
        $consumable->balance += $invoice_detail->qty;
        $consumable->save();
        $invoice_detail->processed = '1';
        $invoice_detail->save();
        return redirect('/consumables');
    }
    }

    public function add(Request $request)
    {
       $invoice_id = $request['invoice_id'];
       $invoice = invoice_details::find($invoice_id);
       $category = $invoice->cat->name;
       if($invoice->cat->consumable == 0){
       $date = new Carbon($invoice->entry->date_of_invoice);
       $year = $date->year; 
       $number = asset_master::where('asset_no','like','%DGADS/'.$category.'/%'.'/'.$year.'%')->count();
       for ($i=1; $i <= $invoice->qty ; $i++) { 
           $num = $number + $i;
           $asset = new asset_master();
           $asset->category = $invoice->category;
           $asset->item_id = $invoice->item_id;
           $asset->product_id = $request['product'][$i-1];
           $asset->asset_no = "DGADS/".$category."/".$num."/".$year;
           $asset->save();
       }
       $invoice->processed = '1';
       $invoice->save();
       return redirect('/assets');
    }
    else{
        return "Not a hardware item.";
    }
    }
}
