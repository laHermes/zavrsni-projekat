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
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use File;
use Illuminate\Support\Facades\Hash;
use View;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $users;

    public function __construct()
    {
        $this->middleware('auth');
        $this->users = Auth::user();
        View::share('users', $this->users);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index()
    {
        $time = Carbon::now();
        $time->toDateTimeString();
        $exchange = DB::table('exchange')->where('id', 1)->first();
        //->with('users', $users)
        return view('home')->with('time', $time)->with('exchange', $exchange);
    }


    public function addChf()
    {

        $users = Auth::user();
        $users->chf_boolean = 1;
        $users->save();
        $exchange = DB::table('exchange')->where('id', 1)->first();

        return view('home')->with('users', Auth::user())->with('exchange', $exchange);
    }
    public function addEur()
    {

        $users = Auth::user();
        $users->eur_boolean = 1;
        $users->save();
        $exchange = DB::table('exchange')->where('id', 1)->first();

        return view('home')->with('users', $users)->with('exchange', $exchange);
    }
    public function addUsd()
    {

        $users = Auth::user();
        $users->usd_boolean = 1;
        $users->save();
        $exchange = DB::table('exchange')->where('id', 1)->first();

        return view('home')->with('users', $users)->with('exchange', $exchange);
    }
    public function addGbp()
    {

        $users = Auth::user();
        $users->gbp_boolean = 1;
        $users->save();
        $exchange = DB::table('exchange')->where('id', 1)->first();

        return view('home')->with('users', $users)->with('exchange', $exchange);
    }



    public function viewSendMoney()
    {
        $msg = '';
        return view('/sendMoney')->with('msg', $msg);
    }

    public function sendMoney(Request $request)
    {

        $id = $request->bank_number;
        $amount = $request->amount;

        $currency = $request->currencies;
        $current_balance = Auth::user()->$currency;
        $bNumber = DB::table('users')->where('id', $id)->value('id');

        $sendMoney = new SendMoney(Auth::user(), $id, $amount, $current_balance, $currency, $bNumber);
        $msg = $sendMoney->sendMoney();

        return view('/sendMoney')->with('msg', $msg);
    }


    public function viewAddMoney()
    {
        return view('/addMoney')->with('users', Auth::user());
    }

    public function addMoney(Request $request)
    {
        $setAmt = $request->amount;
        $curr = $request->selectOptions;
        $first = Auth::user()->$curr;
        $second = $request->amount;

        $addMoney = new Money(Auth::user(), $setAmt, $first, $second, $curr);
        $addMoney->addMoney();

        return view('/addMoney');
    }

    public function viewExchange()
    {

        $viewExchange = new Exchange();
        $msg = $viewExchange->viewExchange();
        $exchange = DB::table('exchange')->where('id', 1)->first();

        $rsl = '';

        return view('/exchange')->with('users', Auth::user())->with('rsl', $rsl)->with('exchange', $exchange)->with('msg', $msg);
    }

    public function exchange(Request $request)
    {

        $curr1 = $request->currencies1;
        $curr2 = $request->currencies2;
        $value = $request->value;

        $exchange = new Exchange(Auth::user(), $value, $curr1, $curr2);
        $rsl = $exchange->exchange();
        $exchange = DB::table('exchange')->where('id', 1)->first();

        return view('/exchange')->with('users', Auth::user())->with('rsl', $rsl)->with('exchange', $exchange);
    }

    public function viewHistory()
    {
        $withdrawal = DB::table('withdrawals')->where('from_id', Auth::user()->id)->get();
        $deposit = DB::table('deposits')->where('to_id', Auth::user()->id)->get();

        return view('/history')->with('users', Auth::user())->with('withdrawal', $withdrawal)->with('deposit', $deposit);
    }

    public function viewUploadPhoto()
    {
        $extensions = ['.png', '.jpg', '.gif', '.svg', '.jpeg'];

        foreach ($extensions as $extension) {
            $storagePath = public_path('storage\\photos\\' . Auth::user()->id . $extension);

            if (file_exists($storagePath)) {
                $ext = $extension;
            }
        }


        return view('/photoUpload')->with('users', Auth::user())->with('extensions', $extensions);
    }

    public function uploadPhoto(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = Auth::user()->id . '.' . $image->getClientOriginalExtension();

            if (!is_dir('/photos')) {
                mkdir('/photos');
            }

            $storagePath = public_path('storage\\photos\\' . $name);

            if (file_exists($storagePath)) {
                unlink($storagePath);
            }

            Auth::user()->photo_dir = $name;
            Auth::user()->save();

            $destinationPath = public_path('/storage/photos');
            $image->move($destinationPath, $name);
            return back()->with('msg', 'success');
        }
    }


    public function viewChangePassword()
    {
        return view('/changePassword')->with("users", Auth::user());
    }



    public function changePassword(Request $request)
    {

        $pass1_enc = $request->pass1;
        $old_pass = Auth::user()->password;

        if (Hash::check($pass1_enc, $old_pass)) {

            Auth::user()->password = bcrypt($pass1_enc);
            Auth::user()->save();
        } else {
            return back()->withErrors('errors', 'fail');
        }

        return back();
    }


    public function resetPassword()
    {

        $new_password =  bcrypt('12345678');
        Auth::user()->password = $new_password;
        Auth::user()->save();

        return back();
    }

    public function viewBitcoin()
    {
        $date = date('Y-m-d', strtotime("-1 days"));

        // $url = 'https://index-api.bitcoin.com/api/v0/price/usd';
        // $json = json_decode(file_get_contents($url) , true);

        $url = "https://bitpay.com/api/rates/usd";
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);

        $rate = $data["rate"];
        $usd_price = 10000;     # Let cost of elephant be 10$
        $bitcoin_price = round($usd_price / $rate, 8);

        $url_2 = 'https://api.coindesk.com/v1/bpi/historical/close.json?for=yesterday';
        $json_2 = file_get_contents($url_2);
        $data_2 = json_decode($json_2, true);
        $rate2 = $data_2["bpi"][$date];
        $rate2 = round($rate2 , 2);


        $diff = round(($rate2 - $rate), 2);
        $str = ($rate2 / $rate) - 1;

        $percent = round((float) $str * 100) . '%';


        return view('/bitcoin')->with("users", Auth::user())->with('btc',  $rate)->with('closeBtc', $rate2)->with('percent', $percent)->with('diff', $diff);
    }
}
