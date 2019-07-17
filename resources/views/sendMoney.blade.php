@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Money</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                       

                    <form action="/sendMoney" method="post">
                        @csrf
                        <input type="text" name="bank_number" id="bank_num" placeholder="Enter Bank Number">
                        <input type="text" name="amount" id="amo" placeholder="Enter Amount">
                        <input type="submit" value="Send Money">

                    </form>
                        
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
