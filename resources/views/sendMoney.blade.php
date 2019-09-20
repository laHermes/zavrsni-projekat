@extends('layouts.app')

@section('title')
Transfer
@endsection

@section('content')


<br>
{{-- Currencies Table --}}
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
    @endif
</div>
</div>

{{-- Transfer Funds table --}}
<div class="figma-div table-head">
<div class="max-eight">
<form action="/sendMoney" method="post">
    @csrf
    <br>
    To
    <input class="form-control form-control-lg" type="text" name="bank_number" id="bank_num"
        placeholder="Enter Bank Number">
    <br>
    How much?
    <input class="form-control form-control-lg" type="text" name="amount" id="amo" placeholder="Enter Amount">
    <br>
    Which currency?
    <select class="browser-default custom-select form-control-lg" name="currencies">
        <option value="chf">CHF Fr.</option>
        <option value="eur">EUR €</option>
        <option value="usd">USD $</option>
        <option value="gbp">GBP £</option>
    </select>

    <br>
    <br>

    <input class="btn btn-primary" type="submit" value="Send Money">
    <br>
    <br>


</form>
@if (!empty($msg))
<div class="alert alert-success" role="alert">
    {{$msg}}
    
</div>
<br>
   
</div>
</div>
@endif



</div>
</div>
</div>
</div>
</div>
@endsection