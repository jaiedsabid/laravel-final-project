@extends('layouts.app')

@section('content')
    <center>
        <h1>Login</h1>
        <form action="" method="POST">
            @csrf
            <label for="email">Email:
                <input type="email" name="email" value="{{ @old('email') }}">
            </label> <br><br>
            <label for="password">Password:
                <input type="password" name="password">
            </label> <br><br>
            <input type="submit" value="login"> | <a href="{{ route('register') }}">Register</a>
            <br> <br> | <a href="{{ route('home') }}">Back</a>
        </form>
        <div class="warning">
            <div>{{ $errors->first('email') }}</div>
            <div>{{ $errors->first('password') }}</div>
            <div>{{ session('error-msg') }}</div>
        </div>
    </center>
@endsection
