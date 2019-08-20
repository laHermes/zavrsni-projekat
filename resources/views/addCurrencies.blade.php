@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Add Currencies</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <div class="wrapper">
                        <a href="/home">
                            <div class="card bank-buttons">
                                <div class="card-body">
                                    Overview
                                </div>
                            </div>
                        </a>
                        <br>
                        <a href="/addMoney">
                            <div class="card bank-buttons">
                                <div class="card-body">
                                    Increase Funds
                                </div>
                            </div>
                        </a>
                        <br>
                        <a href="/addCurrencies">
                            <div class="card bank-buttons">
                                <div class="card-body">
                                    Currencies
                                </div>

                            </div>
                        </a>
                        <br>
                        <a href="/sendMoney">
                            <div class="card bank-buttons">
                                <div class="card-body">
                                    Transfer Funds
                                </div>
                            </div>
                        </a>
                        <br>
                        <a href="/exchange">
                            <div class="card bank-buttons">
                                <div class="card-body">
                                    Exchange
                                </div>
                            </div>
                        </a>
                        <br>
                        <a href="/history">
                            <div class="card bank-buttons">
                                <div class="card-body">
                                    History
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="curr-wrapp">
                        <form action="/addCurrencies" method="post">
                            @csrf

                            @if(!$users->chf_boolean || !$users->eur_boolean || !$users->usd_boolean ||
                            !$users->gbp_boolean)

                            @if(!$users->chf_boolean)
                            CHF<input type="checkbox" name="chf" id="chf">
                            <br>
                            @endif

                            @if(!$users->eur_boolean)
                            EUR<input type="checkbox" name="eur" id="eur">
                            <br>
                            @endif

                            @if(!$users->usd_boolean)
                            USD<input type="checkbox" name="usd" id="usd">
                            <br>
                            @endif

                            @if(!$users->gbp_boolean)
                            GBP<input type="checkbox" name="gbp" id="gbp">
                            <br>
                            @endif
                            <input type="submit" value="Save">

                            @else
                            <div class="alert alert-success" role="alert">
                            You have all currencies.
                            </div>
                            @endif
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection