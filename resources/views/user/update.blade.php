@extends('layouts.userlay')

@section('title')
    User Update
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
            <h1>User Update</h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" value="{{old('name')}}">
            </div>

            <div class="input-group">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password">
            </div>

            <div class="input-group">
                <label for="con_password">Confirm Password: </label>
                <input type="password" name="con_password" id="password">
            </div>

            <div class="input-group">
                <label for="address">Address: </label>
                <input type="text" name="address" id="address" value="{{old('address')}}">
            </div>

            <div class="button-group">
                <input type="submit" name="submit" value="Update Profile">
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



