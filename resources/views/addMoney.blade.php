@extends('layouts.app')

@section('title')
Increase Funds
@endsection

@section('content')

<div class="figma-div">
    <div class="max-eight">

    @if($users->chf_boolean || $users->eur_boolean || $users->usd_boolean || $users->gbp_boolean)
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
</div>
</div>

<div class="figma-div">
        <div class="max-eight">
<br>
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

        <br><br>
        <input class="btn btn-primary" type="submit" value="Add Funds">
        <br>
    </form>
    <br>
</div>
</div>
<br>
<br>

<div class="figma-div">
    <canvas id="myChart" width="400" height="250"></canvas>
</div>

@else

Please enable a currency.

@endif
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