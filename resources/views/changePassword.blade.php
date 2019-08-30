@extends('layouts.app')
@section('title')
Change your password
@endsection
@section('content')

<div class="figma-div table-head">

    <form action="/changePassword" method="post">
        @csrf

        <br>

        <input class="form-control form-control-lg" value="Old Password" type="password" placeholder="Old Password" name="pass1" id="pass1">

        <br>

        <input class="form-control form-control-lg" type="password" placeholder="Repeat old password" name="pass2" id="pass2">

        <br>

        <input class="form-control form-control-lg" type="password" placeholder="Enter new password" name="newPassword" id="newPassword">

        <br>

        <input class="btn btn-primary" type="submit" value="Save">



    </form>



</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection