<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asset_issue;
use DB;
use Auth;
use App\category;
use App\User;

class RequestController extends Controller
{
    //
    public function index() 
    {
        $assets = DB::table('asset')
                    ->where('section_id',Auth::user()->section_id)->get();

        
        return view('request.request')->with('assets',$assets); 
    }
    public function store(Request $request)
    {
        $req = new Request();
        $req->user_id = Auth::user()->id;
        $req->consumable = 1;
        $req->item_id = $request['category'];
        $req->approved = 0;
        $req->received = 0;
        $req->save();
    }
}
