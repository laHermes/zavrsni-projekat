@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Add Currencies</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                       

                    <form action="/addCurrencies" method="post">
                        @csrf
                        <input type="hidden" name="true" value="true"/>
                        <input type="submit" value="Dodaj Dinare">

                    </form>
                        
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
