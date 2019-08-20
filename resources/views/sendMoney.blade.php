@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Money</div>

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
                        <form action="/sendMoney" method="post">
                            @csrf

                            <input class="form-control form-control-lg" type="text" name="bank_number" id="bank_num"
                                placeholder="Enter Bank Number">
                            <br>
                            <input class="form-control form-control-lg" type="text" name="amount" id="amo" placeholder="Enter Amount">
                            <br>
                            <select class="browser-default custom-select" name="currencies">

                                <option value="chf">CHF Fr.</option>
                                <option value="eur">EUR €</option>
                                <option value="usd">USD $</option>
                                <option value="gbp">GBP £</option>

                            </select>

                            <br>
                            <br>

                            <input class="btn btn-primary" type="submit" value="Send Money">
                            <br>


                        </form>
                        @if (!empty($msg))
                        <div class="alert alert-success" role="alert">
                            {{$msg}}
                        </div>
                        @endif
                    </div>

                    @yield('side_buttons')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection