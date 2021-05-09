@extends('layouts.userlay')

@section('title')
    User Image Update
@endsection

@section('css')
    <style>
        *, *::after, *::before {
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        .container {
            padding: 20px;
            width: 680px;
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-content: center;
        }

        .input-group {
            margin: 10px 0px;
        }
        .input-group > input:nth-child(2) {
            position: absolute;
            left: 200px;
        }
        .button-group {
            margin: 20px 0px;
        }
    </style>
@endsection

@section('content')
    <div id="container" class="container">
        <div id="back">
            <a href="{{ route('user.home') }}">Back</a>
        </div>
        <div class="page-title">
            <h1>User Image Update</h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="input-group">
                <label for="image_file">Profile Image: </label>
                <input type="file" name="image_file" id="image_file" >
            </div>

            <div class="button-group">
                <input type="submit" name="submit" value="Change">
                <input type="reset" name="reset" value="Reset">
            </div>
        </form>
    </div>

    <div style="color: red">
        @foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
    </div>
@endsection



