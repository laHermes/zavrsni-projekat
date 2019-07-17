@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <a href="/addRsd">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Dinari</h5>
                          <h6 class="card-subtitle mb-2 text-muted">broj racuna</h6>
                          <p class="card-text">{{$users->rsd}} RSD</p>
                          
                        </div>
                      </div>
                    </a>

                    <a href="/addCurrencies">Add Currencies</a>

                    <a href="/sendMoney">Send Money</a>
                       

                        
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
