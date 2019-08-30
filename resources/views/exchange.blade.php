@extends('layouts.app')
@section('title')
Exchange
@endsection

@section('content')


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

<br>

<div class="figma-div table-head">
  <div class="max-eight">
    <form action="/exchange" method="post">
      @csrf

<div class="margin-20">

  Exchange
</div>

      <input type="text" class="form-control form-control-lg" name="value" placeholder="Amount">
      <div class="margin-20">

        from
      </div>
      <select class="browser-default custom-select form-control-lg" name="currencies1">
        <option value="chf">CHF Fr.</option>
        <option value="eur">EUR €</option>
        <option value="usd">USD $</option>
        <option value="gbp">GBP £</option>
      </select>
      <div class="margin-20">
        to
      </div>
      <select class="browser-default custom-select form-control-lg" name="currencies2">
        <option value="chf">CHF Fr.</option>
        <option value="eur">EUR €</option>
        <option value="usd">USD $</option>
        <option value="gbp">GBP £</option>
      </select>

      <br> <br>
      <input class="btn btn-primary" type="submit" value="CONVERT">
      <br>
      <br>
    </form>
  </div>
</div>
<br>
@if (!empty($rsl))
<div class="alert alert-primary" role="alert">
  {{$rsl}}
</div>
@endif

</div>

</div>
</div>
</div>
</div>
@endsection