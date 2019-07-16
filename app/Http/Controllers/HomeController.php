<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = Auth::user();

        return view('home')->with('users', $users);
    }

    public function addRsd(Request $request)
    {
        $users = Auth::user();    

        $first = $users->rsd;
        $second = $request->rsd;
        $final = $first+$second;

        $users->rsd = $final;

        $users->save();

        return view('/addRsd')->with('users', $users);
    }


    public function viewAddRsd(){
        $users = Auth::user();
        return view('/addRsd')->with('users', $users);
    }
}
