@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">AddRsd</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                       <h1>Dinari
                       </h1>
                       <h2>{{$users->rsd}}</h2>
                   

                        <form action="/addRsd" method="post">
                            @csrf
                            <input type="text" name="rsd" id="rsd" placeholder="rsd">
                            <input type="submit" value="Submit">
        
                        </form>

                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
