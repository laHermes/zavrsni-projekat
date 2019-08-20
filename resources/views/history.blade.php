@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">History</div>

                <div class="card-body" >
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
                    WITHDRAWALS
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Details</th>
                            
                            <th scope="col">Withdrawals</th>
                            <th scope="col">Balance</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach ($withdrawal as $withdrawals)
                          <tr>
                            <th>{{ $withdrawals->created_at}}</th>
                            <td>{{ $withdrawals->details}}</td>
                            <td>{{ $withdrawals->withdrawals }} {{ $withdrawals->currency}}</td>
                            <td>{{ $withdrawals->balance }} {{ $withdrawals->currency}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>

                   <br>
                   <br>
                   DEPOSITS
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Details</th>
                            
                            <th scope="col">Deposits</th>
                            <th scope="col">Balance</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach ($deposit as $deposits)
                          <tr>
                            <th>{{ $deposits->created_at}}</th>
                            <td>{{ $deposits->details}}</td>
                            <td>{{ $deposits->deposits }} {{ $deposits->currency}}</td>
                            <td>{{ $deposits->balance }} {{ $deposits->currency}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
