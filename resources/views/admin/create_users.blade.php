@extends('layouts.admin.common')

@section('title')
    Create User Account
@endsection

@section('css')
    <style>
        .container {
            margin: 32px 0px;
        }
        .page-title,
        .errors,
        .message,
        .create-account {
            margin: 12px 0px;
        }
        .button-group {
            margin: 18px 0px;
        }
        .input-group {
            margin: 10px 0px;
        }
        .input-group input, select {
            position: absolute;
            left: 150px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>Create new user account</h1>
        </div>
        <div class="create-account">
            <form action="" method="post">
                @csrf
                <div class="input-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="input-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="input-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" value="{{ old('password') }}">
                </div>
                <div class="input-group">
                    <label for="password_confirmation">Confirm Password: </label>
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                </div>
                <div class="input-group">
                    <label for="address">Address: </label>
                    <input type="text" name="address" value="{{ old('address') }}">
                </div>
                <div class="input-group">
                    <label for="user_type">User Type: </label>
                    <select name="user_type" id="user_type">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="button-group">
                    <input type="submit" name="submit" value="Create">
                    <input type="reset" name="reset" value="Reset">
                </div>
            </form>
        </div>
        <div class="errors">
            @foreach($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
        <div class="message">
            {{ session('msg') }}
        </div>
    </div>
@endsection
