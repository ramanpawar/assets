<?php

namespace App\Http\Controllers;

use App\asset_issue;
use Illuminate\Http\Request;
use App\category;
use App\asset_master;
use App\section;

class AssetIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $section = section::all();
        return view('issue.asset')->with('categories',$categories)->with('sections',$section);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $issue = new asset_issue();
        $issue->asset_id = $request['asset'];
        $issue->user_id = $request['user'];
        $issue->date_of_issue = date('Y,m,d');
        $issue->issue = 1;
        $issue->save();
        $asset = asset_master::find($request['asset']);
        $asset->in_stock = 0;
        $asset->save();
        return redirect('/issues/create')->with('message','Asset Issued');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\asset_issue  $asset_issue
     * @return \Illuminate\Http\Response
     */
    public function show(asset_issue $asset_issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\asset_issue  $asset_issue
     * @return \Illuminate\Http\Response
     */
    public function edit(asset_issue $asset_issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\asset_issue  $asset_issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asset_issue $asset_issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asset_issue  $asset_issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(asset_issue $asset_issue)
    {
        //
    }
    public function assets(Request $request)
    {
        $category = $request['category'];
        $assets = asset_master::where('category',$category)->where('in_stock',1)->get();
        $response = '';
        foreach ($assets as $asset) {
            $response .= "<option value='".$asset->id."'>".$asset->asset_no."</option>";
        }
        return $response;
    }
}
