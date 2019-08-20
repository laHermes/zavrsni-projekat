@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header dashboard-table">OVERVIEW {{$ldate = date('Y-m-d')}}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="curr-wrapp">
                        <div class="first-chart">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Currency</th>
                                        <th scope="col">Current Balance</th>
                                        <th scope="col">Code</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($users->chf_boolean)
                                    <tr>
                                        <th width="50%" scope="row">Swiss franc</th>
                                        <td width="50%">{{$users->chf}} Fr.</td>
                                        <td width="50%">CHF</td>
                                    </tr>
                                    @endif

                                    @if ($users->eur_boolean)
                                    <tr>
                                        <th width="50%" scope="row">Euro</th>
                                        <td width="50%">{{$users->eur}} €</td>
                                        <td width="50%">EUR</td>


                                    </tr>
                                    @endif

                                    @if ($users->usd_boolean)
                                    <tr>
                                        <th width="50%" scope="row">United States dollar</th>
                                        <td width="50%">{{$users->usd}} $</td>
                                        <td width="50%">USD</td>


                                    </tr>
                                    @endif
                                    @if ($users->gbp_boolean)
                                    <tr>
                                        <th width="50%" scope="row">Pound sterling</th>
                                        <td width="50%">{{$users->gbp}} £</td>
                                        <td width="50%">GBP</td>


                                    </tr>
                                    @endif
                                </tbody>


                            </table>
                        </div>








                    </div>




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
                            <div class="card bank-buttons ">
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


                    {{-- <br>
                    <a href="/addMoney">Add Money</a>
                    <br>
                    <a href="/exchange">Exchange</a>
                    <br>
                    <a href="/history">History</a> --}}

                    {{-- <div class="container">
                        <canvas id="myChart" width="600" height="400"></canvas>
                    </div> --}}


                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let myChart = document.getElementById('myChart').getContext('2d');
        Chart.defaults.global.defaultFontColor = 'black';

        Chart.defaults.global.defaultFontFamily = 'Merriweather';

            let balanceChart = new Chart(myChart, {
                type:'bar',
                data:{
    
                    labels:['CHF', 'EUR', 'USD', 'GBP'],
                    datasets: [{
                        label: 'Current Balance',
                        data: [{{$users->chf}}, {{$users->eur}}, {{$users->usd}}, {{$users->gbp}}],
                        backgroundColor: [
                            'rgba(213, 43, 30, 0.5)',
                            'rgba(0, 51, 153, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderColor: [
                            'rgba(213, 43, 30, 1)',
                            'rgba(0, 51, 153, 1)',
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