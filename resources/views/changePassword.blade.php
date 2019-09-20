@extends('layouts.app')
@section('title')
Change your password
@endsection
@section('content')

{{-- Change Password Table --}}
<div class="figma-div table-head">
    <div class="max-eight">
        <form action="/changePassword" method="post">
            @csrf
            <br>
            <input class="form-control form-control-lg" value="Old Password" type="password" placeholder="Old Password"
                name="pass1" id="pass1">
            <br>
            <input class="form-control form-control-lg" type="password" placeholder="Enter new password"
                name="newPassword" id="newPassword">
            <br>
            <input class="btn btn-primary" type="submit" value="Save">
        </form>
        <br>
        {{-- Reset Password --}}
        <form action="/changePassword/reset" method="POST">
            @csrf
            <input class="btn btn-primary" type="submit" value="Reset to '12345678'" name="reset">
        </form>

        <br>

        @if($errors->any())
        <h4>{{$errors->first()}}</h4>
        @endif

    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection