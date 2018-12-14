<?php

namespace App\Http\Controllers;

use App\item_con_relation;
use Illuminate\Http\Request;
use App\consumable;
use App\item_master;

class ItemConRelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('relation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = item_master::find('2');
        $consumable = consumable::find('1');

        $item->consumables()->attach($consumable);
        return "Success";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\item_con_relation  $item_con_relation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = item_master::find($id);
        return $item->consumables;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\item_con_relation  $item_con_relation
     * @return \Illuminate\Http\Response
     */
    public function edit(item_con_relation $item_con_relation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\item_con_relation  $item_con_relation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item_con_relation $item_con_relation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\item_con_relation  $item_con_relation
     * @return \Illuminate\Http\Response
     */
    public function destroy(item_con_relation $item_con_relation)
    {
        //
    }
    public function add(){
        return 1;
    }
}
