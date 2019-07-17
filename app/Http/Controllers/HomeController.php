<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $final = $first + $second;

        $users->rsd = $final;

        $users->save();

        return view('/addRsd')->with('users', $users);
    }


    public function viewAddRsd()
    {
        $users = Auth::user();
        return view('/addRsd')->with('users', $users);
    }


    public function viewAddCurrencies()
    {
        $users = Auth::user();
        return view('/addCurrencies')->with('users', $users);
    }


    public function addCurrency(Request $request)
    {
        $users = Auth::user();
        $users->rsd_boolean = true;

        $users->save();

        return view('/addCurrencies')->with('users', $users);
    }


    public function viewSendMoney()
    {
        $users = Auth::user();
        return view('/sendMoney')->with('users', $users);
    }

    public function sendMoney(Request $request)
    {
        $users = Auth::user();
        $id= $request->bank_number;
        $amount = $request->amount;

        DB::table('users')
            ->where('id', $id)
            ->update(['rsd' => $amount]);

            return view('/sendMoney')->with('users', $users);
            
    }

}
