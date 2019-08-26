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



                </div>
            </div>
        </div>
    </div>
</div>

@endsection