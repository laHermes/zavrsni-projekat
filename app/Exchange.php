<?php

namespace App;


use Illuminate\Support\Facades\DB;

class Exchange
{


    private $users;
    private $value;
    private $curr1;
    private $curr2;


    public function __construct($users = NULL, $value = 0, $curr1 = 0, $curr2 = 0)
    {

        $this->users = $users;
        $this->value = $value;
        $this->curr1 = $curr1;
        $this->curr2 = $curr2;
    }

    public function exchange()
    {
        $currency = $this->curr1;
        $upperCurrency = strtoupper($this->curr1);

        $converted = $this->curr2;
        $upperConverted = strtoupper($this->curr2);

        $current_balance = $this->users->$currency;

        $exchange = DB::table('exchange')->first();
        if ($currency !=  $converted) {
            if ($current_balance >= $this->value) {

                $target_value = $upperCurrency . "to" . $upperConverted;
                $rate = $exchange->$target_value;
                $result = $this->value * $rate;

                $updated_balance = $current_balance - $this->value;
                $this->users->$currency = $updated_balance;
                $this->users->$converted = $this->users->$converted + $result;
                $this->users->save();
                $rsl = $this->value . " " . $upperCurrency . " is converted to " . $result . " " . $upperConverted;
            } else {
                $rsl = "Not enough funds";
            }
        } else {
            $rsl = "Can't convert from and to the same currency!";
        }
        return $rsl;
    }


    public function viewExchange()
    {

        $api_id = 'f53ec1381124cf3ac11a0ac413c7ee76';
        $curr = ['CHF', 'EUR', 'USD', 'GBP'];



        foreach ($curr as $curr1) {

            foreach ($curr as $curr2) {

                if ($curr1 != $curr2) {


                    $url = 'https://api.kursna-lista.info/' . $api_id . '/konvertor/' . $curr1 . '/' . $curr2 . '/' . 1;

                    $content = file_get_contents($url);

                    if (empty($content)) {
                        die('Error downloading data');
                    }

                    $data = json_decode($content, true);

                    if ($data['status'] == 'ok') {
                        $column = $curr1 . "to" . $curr2;
                        $result = $data['result']['value'];

                        DB::table('exchange')->update([$column => $result]);
                    } else {
                        return $msg = "Error: " . $data['code'] . " - " . $data['msg'];
                    }
                }
            }
        }
    }
}
