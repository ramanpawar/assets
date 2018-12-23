<?php

namespace App\Http\Controllers;

use App\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suppliers = supplier::all();
        return view('suppliers.index')->with('suppliers',$suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
            'gstno' => ['required','unique:suppliers'],
            'mobile' => ['required','digits:10'],
            'email' => ['required','email'],
            'address' => ['required'],
        ]);
        $supplier = supplier::create($request->all());

        return redirect('/supplier');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = supplier::find($id);
        return view('suppliers.edit')->with('supplier',$supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$s)
    {
        $validate = $request->validate([
            'name' => ['required','string'],
            'gstno' => ['required','unique:suppliers'],
            'mobile' => ['required','integer','min:1000000000'],
            'email' => ['required','email'],
            'address' => ['required'],
        ]);

        $supplier = supplier::find($s);
        $supplier->name = $request['name'];
        $supplier->address = $request['address'];
        $supplier->mobile = $request['mobile'];
        $supplier->email = $request['email'];
        $supplier->gstno = $request['gstno'];
        $supplier->save();

        return redirect('/supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplier $supplier)
    {
        //
    }
}
