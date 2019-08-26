<?php

namespace App;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\Input;


class SendMoney
{

    private $users;
    private $id;
    private $amount;
    private $current_balance;
    private $currency;
    private $bNumber;


    public function __construct($users, $id, $amount, $current_balance, $currency, $bNumber)
    {
        $this->users = $users;
        $this->id = $id;
        $this->amount = $amount;
        $this->current_balance = $current_balance;
        $this->currency = $currency;
        $this->bNumber = $bNumber;
    }



    public function sendMoney()
    {
        $currency = $this->currency;

        if ($this->bNumber && $this->current_balance > $this->amount && $this->amount > 0 && is_numeric($this->amount)) {

            $data = DB::table('users')->where('id', $this->id)->value('name');

            $results = DB::table('users')->where('id', $this->id)->value($currency);
            $total = $results + $this->amount;

            DB::table('users')->where('id', $this->id)->update([$currency => $total]);
            $this->users->$currency = $this->current_balance - $this->amount;


            $withdrawals = array('details' => $data, 'withdrawals' => $this->amount, 'currency' => $currency, 'to_id' => $this->id, 'from_id' => $this->users->id, 'balance' => $this->users->$currency);
            DB::table('withdrawals')->insert($withdrawals);

            $deposits = array('details' => $this->users->name, 'deposits' => $this->amount, 'currency' => $currency, 'to_id' => $this->id, 'from_id' => $this->users->id, 'balance' => $total);
            DB::table('deposits')->insert($deposits);


            $this->users->save();

            if ($this->users->save()) {
                return $msg = 'Success';
            } else {
                return $msg = 'Fail';
            }
        } else {
            return $msg = 'Fail';
        }
    }
}
