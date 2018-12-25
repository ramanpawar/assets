<?php

namespace App\Http\Controllers;

use App\requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\category;
use App\User;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = requests::where('user_id',Auth::user()->id)->get();
        return $requests;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assets = DB::table('asset')
                    ->where('section_id',Auth::user()->section_id)->get();
        $categories = category::all();
        $users = User::where('section_id',Auth::user()->section_id)->get();
        
        return view('request.request')->with('assets',$assets)->with('categories',$categories)->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        

        $req = new requests();
        $req->user_id = Auth::user()->id;
        
        if(!empty($request['consumable'])){
        $req->consumable = 1;
        $req->item_id = $request['consumable'];
        }
        if(!empty($request['category'])){
            $req->consumable = 0;
            $req->item_id = $request['category'];
            $req->remarks = $request['remarks'];
        }
        
        $req->received = 0;
        $req->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\requests  $requests
     * @return \Illuminate\Http\Response
     */
    public function show(requests $requests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\requests  $requests
     * @return \Illuminate\Http\Response
     */
    public function edit(requests $requests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\requests  $requests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, requests $requests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\requests  $requests
     * @return \Illuminate\Http\Response
     */
    public function destroy(requests $requests)
    {
        //
    }
}
