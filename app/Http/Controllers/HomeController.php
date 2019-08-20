<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Exchange;
use App\Money;
use App\SendMoney;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\Input;

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
        $time = Carbon::now();
        $time->toDateTimeString();
        return view('home')->with('users', $users)->with('time', $time);
    }

    public function addChf(Request $request)
    {
        $users = Auth::user();
        $first = $users->chf;
        $second = $request->chf;
        $final = $first + $second;
        $users->chf = $final;
        $users->save();
        return view('/addChf')->with('users', $users);
    }


    public function viewAddChf()
    {
        $users = Auth::user();
        return view('/addChf')->with('users', $users);
    }


    public function viewAddCurrencies()
    {
        $users = Auth::user();
        return view('/addCurrencies')->with('users', $users);
    }


    public function addCurrency(Request $request)
    {
        $users = Auth::user();

        if (isset($_POST['chf'])) {
            $users->chf_boolean = true;
        }
        if (isset($_POST['eur'])) {
            $users->eur_boolean = true;
        }
        if (isset($_POST['usd'])) {
            $users->usd_boolean = true;
        }
        if (isset($_POST['gbp'])) {
            $users->gbp_boolean = true;
        }
        $users->save();

        return view('/addCurrencies')->with('users', $users);
    }


    public function viewSendMoney()
    {
        $users = Auth::user();
        $msg = '';
        return view('/sendMoney')->with('users', $users)->with('msg', $msg);
    }

    public function sendMoney(Request $request)
    {
        $users = Auth::user();

        $id = $request->bank_number;
        $amount = $request->amount;
        
        $currency = $request->currencies;
        $current_balance = $users->$currency;
        $bNumber = DB::table('users')->where('id', $id)->value('id');

        $sendMoney = new SendMoney($users, $id, $amount, $current_balance, $currency, $bNumber);
        $msg = $sendMoney->sendMoney();
       
        return view('/sendMoney')->with('users', $users)->with('msg', $msg);
    }


    public function viewAddMoney()
    {
        $users = Auth::user();
        return view('/addMoney')->with('users', $users);
    }

    public function addMoney(Request $request)
    {
        $users = Auth::user();
        $setAmt = $request->amount;
        $curr = $request->selectOptions;
        $first = $users->$curr;
        $second = $request->amount;

        $addMoney = new Money($users, $setAmt, $first, $second, $curr);
        $addMoney->addMoney();
                
        return view('/addMoney')->with('users', $users);
    }

    public function viewExchange()
    {
        $users = Auth::user();

        $viewExchange = new Exchange();
        $msg = $viewExchange->viewExchange();
        $exchange = DB::table('exchange')->where('id', 1)->first();

        $rsl = '';

        return view('/exchange')->with('users', $users)->with('rsl', $rsl)->with('exchange', $exchange)->with('msg', $msg);
    }

    public function exchange(Request $request)
    {
        $users = Auth::user();
        $curr1 = $request->currencies1;
        $curr2 = $request->currencies2;
        $value = $request->value;

        $exchange = new Exchange($users, $value, $curr1, $curr2);
        $rsl = $exchange->exchange();

        $exchange = DB::table('exchange')->where('id', 1)->first();


        return view('/exchange')->with('users', $users)->with('rsl', $rsl)->with('exchange', $exchange);
    }

    public function viewHistory()
    {
        $users = Auth::user();
        $withdrawal = DB::table('transactions')->where('from_id', $users->id)->get();
        $deposit = DB::table('transactions')->where('to_id', $users->id)->get();

        return view('/history')->with('users', $users)->with('withdrawal', $withdrawal)->with('deposit', $deposit);
    }





}
