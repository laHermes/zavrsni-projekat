@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Increase Funds</div>

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
                    <table class="table">
                        <thead>
                            <tr>
                                @if ($users->chf_boolean == true)
                                <th scope="col">CHF</th>
                                @endif

                                @if ($users->eur_boolean == true)
                                <th scope="col">EUR</th>
                                @endif

                                @if ($users->usd_boolean == true)
                                <th scope="col">USD</th>
                                @endif

                                @if ($users->gbp_boolean == true)
                                <th scope="col">GBP</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                @if ($users->chf_boolean == true)

                                <td>{{$users->chf}} Fr.</td>
                                @endif

                                @if ($users->eur_boolean == true)

                                <td>{{$users->eur}} €</td>
                                @endif

                                @if ($users->usd_boolean == true)

                                <td>{{$users->usd}} $</td>
                                @endif

                                @if ($users->gbp_boolean == true)

                                <td>{{$users->gbp}} £</td>
                                @endif

                            </tr>
                        <tbody>
                    </table>


                    <form action="/addMoney" method="post">
                        @csrf
                        <input class="form-control form-control-lg" type="text" name="amount" id="amo" placeholder="Enter Amount">
                        <br>

                        <select class="browser-default custom-select form-control-lg" name="selectOptions">
                            @if ($users->chf_boolean == true)
                            <option value="chf">CHF Fr.</option>
                            @endif

                            @if ($users->eur_boolean == true)
                            <option value="eur">EUR [€]</option>
                            @endif

                            @if ($users->usd_boolean == true)
                            <option value="usd">USD [$]</option>
                            @endif

                            @if ($users->gbp_boolean == true)

                            <option value="gbp">GBP [£]</option>
                            @endif
                        </select>

                        <br>
                        <br>
                        <input class="btn btn-primary" type="submit" value="Add Funds">
                        <br>
                    </form>
<br>
<br>
                    <div class="container">
                        <canvas id="myChart" width="600" height="400"></canvas>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let myChart = document.getElementById('myChart').getContext('2d');

        let balanceChart = new Chart(myChart, {
            type:'bar',
            data:{

                labels:['CHF', 'EUR', 'USD', 'GBP'],
                datasets: [{
                    label: 'Current Balance',
                    data: [{{$users->chf}}, {{$users->eur}}, {{$users->usd}}, {{$users->gbp}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
</script>
@endsection