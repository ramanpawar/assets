<?php

namespace App\Http\Controllers;

use App\item_master;
use App\category;
use App\specification;
use Illuminate\Http\Request;

class ItemMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = item_master::all();
        return view('items.index')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = category::where('consumable','0')->get();
        return view('items.add')->with('category',$category);
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
            'make' => ['required','string'],
            'category' => ['required','integer'],
            'description' => ['required'],
        ]);

        if($request->has('processor')){
            $specification = new specification();
            $specification->processor = $request['processor'];
            $specification->ram = $request['ram'];
            $specification->hdd = $request['hdd'];
            $specification->save();
            $id = $specification->id;
            
            $item = new item_master();
            $item->make = $request['make'];
            $item->category = $request['category'];
            $item->specification = $id;
            $item->description = $request['description'];
            $item->save();
            return redirect('/items');

        }else{
            $item = new item_master();
            $item->make = $request['make'];
            $item->category = $request['category'];
            $item->specification = '0';
            $item->description = $request['description'];
            $item->save();
            return redirect('/items');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\item_master  $item_master
     * @return \Illuminate\Http\Response
     */
    public function show(item_master $item_master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\item_master  $item_master
     * @return \Illuminate\Http\Response
     */
    public function edit($item_master)
    {
        //
        $item = item_master::find($item_master);
        $category = category::all();
        return view('items.edit')->with('category',$category)->with('item',$item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\item_master  $item_master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $item_master)
    {
        //
        $validate = $request->validate([
            'make' => ['required','string'],
            'category' => ['required','integer'],
            'description' => ['required'],
        ]);

        $item = item_master::find($item_master);
        $item->description = $request['description'];
        $item->save();

        if($request->has('processor')){
            $specification = specification::find($item->specification);
            $specification->processor = $request['processor'];
            $specification->ram = $request['ram'];
            $specification->hdd = $request['hdd'];
            $specification->save();
        }
        return redirect('/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\item_master  $item_master
     * @return \Illuminate\Http\Response
     */
    public function destroy(item_master $item_master)
    {
        //
    }
}
