@extends('layouts.app')
@section('title')
Exchange
@endsection

@section('content')


          <table class="table">
            <thead>
              <tr>
                <th scope="col">EXCHANGE RATES</th>
                <th scope="col">CHF</th>
                <th scope="col">EUR</th>
                <th scope="col">USD</th>
                <th scope="col">GBP</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <th scope="row">1 CHF =</th>
                <td>1</td>
                <td>{{$exchange->CHFtoEUR}}</td>
                <td>{{$exchange->CHFtoUSD}}</td>
                <td>{{$exchange->CHFtoGBP}}</td>
              </tr>

              <tr>
                <th scope="row">1 EUR =</th>
                <td>{{$exchange->EURtoCHF}}</td>
                <td>1</td>
                <td>{{$exchange->EURtoUSD}}</td>
                <td>{{$exchange->EURtoGBP}}</td>
              </tr>

              <tr>
                <th scope="row">1 USD =</th>
                <td>{{$exchange->USDtoCHF}}</td>
                <td>{{$exchange->USDtoEUR}}</td>
                <td>1</td>
                <td>{{$exchange->USDtoGBP}}</td>

              </tr>

              <tr>
                <th scope="row">1 GBP =</th>
                <td>{{$exchange->GBPtoCHF}}</td>
                <td>{{$exchange->GBPtoEUR}}</td>
                <td>{{$exchange->GBPtoUSD}}</td>
                <td>1</td>
              </tr>

            </tbody>
          </table>

          <br>

          <form action="/exchange" method="post">
            @csrf

            Exchange
            <input type="text" class="form-control form-control-lg" name="value" placeholder="Value">
            from
            <select class="browser-default custom-select form-control-lg" name="currencies1">
              <option value="chf">CHF Fr.</option>
              <option value="eur">EUR €</option>
              <option value="usd">USD $</option>
              <option value="gbp">GBP £</option>
            </select>
            to
            <select class="browser-default custom-select form-control-lg" name="currencies2">
              <option value="chf">CHF Fr.</option>
              <option value="eur">EUR €</option>
              <option value="usd">USD $</option>
              <option value="gbp">GBP £</option>
            </select>

            <br> <br>
            <input class="btn btn-primary" type="submit" value="CONVERT">

          </form>
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