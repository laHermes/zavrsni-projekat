<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Money
{
    private $users;
    private $setAmt;
    private $first;
    private $second;
    private $curr;

    public function __construct($users, $setAmt, $first, $second, $curr)
    {
        $this->users = $users;
        $this->setAmt = $setAmt;
        $this->first = $first;
        $this->second = $second;
        $this->curr = $curr;
    }

    public function addMoney()
    {

        $currencies = ['chf', 'usd', 'eur', 'gbp'];
        if (is_numeric($this->setAmt)) {

            foreach ($currencies as $currency) {
                if ($currency == $this->curr) {
                    $cur = $this->curr;
                    $final = $this->first + $this->second;
                    $this->users->$cur = $final;
                    $this->users->save();
                }
            }
        }
    }
}
