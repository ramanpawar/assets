<?php

namespace App\Http\Controllers;

use App\item_con_relation;
use Illuminate\Http\Request;
use App\consumable;
use App\item_master;
use App\asset_master;

class ItemConRelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = item_master::all();
        return view('relation.index')->with('item',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$item = item_master::find('2');
        $consumable = consumable::find('1');

        $item->consumables()->attach($consumable);
        return "Success";*/
        $items = item_master::all();
        $consumable = consumable::all();
        return view('relation.add')->with('items',$items)->with('consumable',$consumable);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required',
            'consumable' => 'required',
        ]);
            $item = item_master::find($request['item']);
            $item->consumables()->attach($request['consumable']);
            return "All Done";

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
        
        return view('relation.index')->with('item',$item);
        
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
    public function acategory($id)
    {
        $asset = asset_master::find($id);
        $consumables = '';

        foreach ($asset->item->consumables as $consumable) {
            $consumables .= "<option value='".$consumable->id."'>".$consumable->name." ".$consumable->cat->name."</option>";
        }
        return $consumables;
    }
}
