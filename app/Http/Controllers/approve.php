<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\requests;
use App\consumable;
use App\category;
use App\section;
use App\User;

class approve extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumables = requests::where('consumable',1)->get();
        $hardware = requests::where('consumable',0)->get();
        return view('request.approve')->with('consumables',$consumables)->with('hardware',$hardware);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consumables = requests::where('consumable',1)
                            ->where('approved',1)
                            ->get();
        $hardware = requests::where('consumable',0)->where('approved',1)->get();
        return view('request.receive')->with('consumables',$consumables)->with('hardware',$hardware);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve($id)
    {
        $req = requests::find($id);
        $req->approved = 1;
        $req->approval_date = date('Y,m,d');
        $req->save();
        if($req->consumable == 1){
            $consumable = consumable::find($req->item_id);
            $consumable->balance -= 1;
            $consumable->save();
        }
        return redirect('/approve');
    }
    public function reject($id)
    {
        $req = requests::find($id);
        $req->approved = 0;
        $req->save();
        if($req->consumable == 1){
            $consumable = consumable::find($req->item_id);
            $consumable->balance += 1;
            $consumable->save();
        }
        return redirect('/approve');
    }
    public function issue($id)
    {
        
        $req = requests::find($id);
        if ($req->consumable == 0) {
            $categories = category::all();
        $section = section::all();
        $users = User::where('section_id',$req->user->section->id)->get();
        return view('issue.request')->with('categories',$categories)->with('sections',$section)->with('req',$req)->with('users',$users);
        }
        $req->received = 1;
        $req->date_of_receiving = date('Y,m,d');
        $req->save();
        return redirect('/approve/create');
    }

}
