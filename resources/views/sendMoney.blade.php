@extends('layouts.app')

@section('title')
Transfer
@endsection

@section('content')
<div class="figma-div table-head">
<div class="max-eight">
<form action="/sendMoney" method="post">
    @csrf
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