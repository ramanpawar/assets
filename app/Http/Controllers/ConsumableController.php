<?php

namespace App\Http\Controllers;

use App\consumable;
use App\category;
use Illuminate\Http\Request;

class ConsumableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumables = consumable::all();
       return view('consumable.index')->with('consumables',$consumables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = category::where('consumable','1')->get();
        return view('consumable.master')->with('categories',$categories);
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
            'name' => ['required','unique:consumables'],
            'category' => ['required','integer'],
        ]);

        $consumable = new consumable();
        $consumable->name = $request['name'];
        $consumable->category = $request['category'];
        if($request->has('balance')){
            $consumable->balance = $request['balance'];
        }else{
            $consumable->balance = 0;
        }
        $consumable->save();
        return redirect('/consumables');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function show(consumable $consumable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function edit($con)
    {
        $categories = category::where('consumable','1')->get();
        $consumable = consumable::find($con);
        return view('consumable.edit')->with('consumable',$consumable)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $con)
    {
        $consumable = consumable::find($con);
        $consumable->name = $request['name'];
        $consumable->balance = $request['balance'];
        $consumable->category = $request['category'];
        $consumable->save();
        return redirect('/consumables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function destroy(consumable $consumable)
    {
        //
    }
}
