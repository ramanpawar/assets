<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asset_issue;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asset = asset_issue::with([('user:id,name,section_id'),'asset'])->get();
        return $asset;
        return view('home');
    }
}
