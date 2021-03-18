@extends('layouts.admin.common')

@section('title')
    Edit Details
@endsection

@section('css')
    <style>
        .container {
            padding: 32px 0;
        }
        #back a {
            text-decoration: none;
            font-weight: bold;
        }
        .input-group {
            margin: 12px 0px;
        }
        .input-group input, select {
            position: absolute;
            left: 150px;
        }
        .message {
            margin: 15px 0px;
        }
        .errors {
            margin: 15px 0px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div id="back">
            @if(Route::currentRouteName() == 'admin.edit_admin')
                <a href="{{ route('admin.admin_list') }}">Back</a>
            @else
                <a href="{{ route('admin.user_list') }}">Back</a>
            @endif
        </div>
        <div class="page-title">
            <h1>Edit Details</h1>
        </div>
        <div class="edit-details">
            <form action="" method="post">
                @csrf
                <div class="input-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}">
                </div>

                <div class="input-group">
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email" value="{{ $user->email }}">
                </div>

                <div class="input-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Confirm Password: </label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>

                <div class="input-group">
                    <label for="address">Address: </label>
                    <input type="text" name="address" id="address" value="{{ $user->address }}">
                </div>

                <div class="input-group">
                    <label for="address">User Type: </label>
                    <select name="user_type" id="user_type">
                        <option value="user" @if($user->user_type == 'user') selected @endif>User</option>
                        <option value="admin" @if($user->user_type == 'admin') selected @endif>Admin</option>
                    </select>
                </div>

                <div class="button-group">
                    <input type="submit" name="submit" value="Apply">
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
