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





    // public function viewAddCurrencies()
    // {
    //     $users = Auth::user();
    //     return view('/addCurrencies')->with('users', $users);
    // }


    // public function addCurrency()
    // {
    //     $users = Auth::user();

    //     if (isset($_POST['chf'])) {
    //         $users->chf_boolean = true;
    //     }
    //     if (isset($_POST['eur'])) {
    //         $users->eur_boolean = true;
    //     }
    //     if (isset($_POST['usd'])) {
    //         $users->usd_boolean = true;
    //     }
    //     if (isset($_POST['gbp'])) {
    //         $users->gbp_boolean = true;
    //     }
    //     $users->save();

    //     return view('/addCurrencies')->with('users', $users);
    // }


    public function viewSendMoney()    {
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

            $extensions = ['.png', '.jpg', '.gif', '.svg', '.jpeg'];
            foreach ($extensions as $extension) {

                $storagePath = public_path('storage\\photos\\' . $name);

                if (file_exists($storagePath)) {
                    unlink($storagePath);
                }
            }
            Auth::user()->photo_dir = $name;
            Auth::user()->save();


            $destinationPath = public_path('/storage/photos');

            $image->move($destinationPath, $name);


            return back();
        }
    }


    public function viewChangePassword()
    {




        return view('/changePassword')->with("users", Auth::user());
    }

    public function changePassword(Request $request)
    {
        $pass1 =  Hash::make($request->pass1);
        $pass2 = Hash::make($request->pass2);
        $old = Auth::user()->password;

        if (Hash::check($pass1, $pass2)) {
            if (Hash::check($pass1, $old)) {

                Auth::user()->password = Hash::make($request->password);
                Auth::user()->save();
            }
        }



        return back();
    }
}
