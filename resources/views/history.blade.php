@extends('layouts.app')

@section('title')
History
@endsection

@section('content')

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
@endsection