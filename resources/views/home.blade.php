@extends('layouts.app')


@section('title')
OVERVIEW on {{$ldate = date('Y-m-d')}}
@endsection
@section('content')


<br>
<div class="fifty ">
    <div class="figma-div">


        <table class="table table-hover border-0">
            <thead class="table-head">
                <tr>
                    <th class="border-top-left table-head" scope="col">Currency</th>
                    <th class="table-head" scope="col">Current Balance</th>
                    <th class="border-top-right table-head" scope="col">Code</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th class="first-column currencies" width="50%" scope="row">Swiss franc</th>
                    @if ($users->chf_boolean)
                    <td class="current-balance" width="50%">Fr. {{$users->chf}}</td>
                    @else
                    <td width="50%">
                        <form action="/home/chf" method="POST">
                            @csrf
                            <input class="btn btn-primary btn-sm" name="chf" type="submit" value="Enable Swiss Francs">
                        </form>
                    </td>
                    @endif
                    <td class="money-code" width="50%">CHF</td>
                </tr>

                <tr>
                    <th class="first-column currencies" width="50%" scope="row">Euro</th>
                    @if ($users->eur_boolean)
                    <td class="current-balance" width="50%">€ {{$users->eur}}</td>
                    @else
                    <td width="50%">
                        <form action="/home/eur" method="POST">
                            @csrf

                            <input class="btn btn-primary btn-sm" name="eur" type="submit" value="Enable Euros">
                        </form>
                    </td>
                    @endif
                    <td class="money-code" width="50%">EUR</td>
                </tr>

                <tr>
                    <th class="first-column currencies" width="50%" scope="row">United States dollar</th>
                    @if ($users->usd_boolean)
                    <td class="current-balance" width="50%">$ {{$users->usd}}</td>
                    @else
                    <td width="50%">
                        <form action="/home/usd" method="POST">
                            @csrf
                            <input class="btn btn-primary btn-sm" name="usd" type="submit" value="Enable US Dollars">
                        </form>
                    </td>
                    @endif
                    <td class="money-code" width="50%">USD</td>
                </tr>

                <tr>
                    <th class="first-column border-bottom-left currencies" scope="row">Pound sterling</th>
                    @if ($users->gbp_boolean)
                    <td class="current-balance" width="50%">£ {{$users->gbp}}</td>
                    @else
                    <td width="50%">
                        <form action="/home/gbp" method="POST">
                            @csrf

                            <input class="btn btn-primary btn-sm" name="gbp" type="submit"
                                value="Enable British Pounds">
                        </form>
                    </td>
                    @endif
                    <td class="money-code border-bottom-right" width="50%">GBP</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
<br>
<br>
<div class="fifty">
    <div class="figma-div">
        <table class="table table-hover">
            <thead class="table-head">
                <tr>
                    <th class="border-top-left table-head" scope="col">Exchange Rate</th>
                    <th class="align-right table-head" scope="col">CHF</th>
                    <th class="align-right table-head" scope="col">EUR</th>
                    <th class="align-right table-head" scope="col">USD</th>
                    <th class="border-top-right align-right table-head" scope="col">GBP</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th class="first-column currencies" scope="row">1 CHF =</th>
                    <td class="money-code current-balance">1</td>
                    <td class="money-code current-balance">{{$exchange->CHFtoEUR}}</td>
                    <td class="money-code current-balance">{{$exchange->CHFtoUSD}}</td>
                    <td class="money-code current-balance">{{$exchange->CHFtoGBP}}</td>
                </tr>

                <tr>
                    <th class="first-column currencies" scope="row">1 EUR =</th>
                    <td class="money-code current-balance">{{$exchange->EURtoCHF}}</td>
                    <td class="money-code current-balance">1</td>
                    <td class="money-code current-balance">{{$exchange->EURtoUSD}}</td>
                    <td class="money-code current-balance">{{$exchange->EURtoGBP}}</td>
                </tr>

                <tr>
                    <th class="first-column currencies" scope="row">1 USD =</th>
                    <td class="money-code current-balance">{{$exchange->USDtoCHF}}</td>
                    <td class="money-code current-balance">{{$exchange->USDtoEUR}}</td>
                    <td class="money-code current-balance">1</td>
                    <td class="money-code current-balance">{{$exchange->USDtoGBP}}</td>

                </tr>

                <tr>
                    <th class="first-column border-bottom-left currencies" scope="row">1 GBP =</th>
                    <td class="money-code current-balance">{{$exchange->GBPtoCHF}}</td>
                    <td class="money-code current-balance">{{$exchange->GBPtoEUR}}</td>
                    <td class="money-code current-balance">{{$exchange->GBPtoUSD}}</td>
                    <td class="money-code border-bottom-right current-balance">1</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>





</div>

</div>
</div>
</div>
</div>


@endsection