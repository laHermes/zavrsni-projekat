@extends('layouts.app')
@section('title')
Upload a profile photo
@endsection
@section('content')



Requirements:
<hr>
Allowed file types: jpeg,png,jpg,gif,svg
<hr>
Max resolution: 2048px;


<form action="/photoUpload" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="input-group">
        <div class="custom-file">
            <input type="file" name="photo" class="custom-file-input" id="inputGroupFile04">
            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Upload</button>
        </div>
    </div>

</form>
<br>
<div class="photo">


    <img style="max-width: 800px; margin: 0 auto;" height="500px" src="{{asset("storage/photos/" . $users->photo_dir)}}"
        alt="">

</div>

        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif
        
        

</div>
</div>
</div>
</div>
</div>

@endsection