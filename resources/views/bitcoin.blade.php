@extends('layouts.app')
@section('title')
Bitcoin
@endsection

@section('content')



<div class="figma-div">

    <div class="max-eight">




        ₿ 1 = $ {{$btc}}
        <br>
    
        Yesterday's closing price = $ {{$closeBtc}} 
        <br>
    
        Percentage change from yesterday~ {{$percent}}
    <br>
    
    Difference: ${{$diff}}
    </div>
</div>










</div>
</div>
</div>
</div>
</div>
@endsection