@extends('layouts.admin.common')

@section('title')
    Edit Profile
@endsection

@section('css')
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        .container {
            width: 620px;
            margin: 50px 0px;
            padding: 0px 10px;
        }
        .page-title {
            margin: 20px 0px;
        }
        .input-group {
            margin-top: 10px;
        }
        .input-group input {
            position: absolute;
            left: 150px;
        }
        .button-group {
            margin-top: 20px;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>Edit Profile Info</h1>
        </div>
        <div class="edit-info">
            <form action="" method="post" enctype="multipart/form-data">
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
                    <input type="password" name="password_confirmation" id="password">
                </div>

                <div class="input-group">
                    <label for="address">Address: </label>
                    <input type="text" name="address" id="address" value="{{ $user->address }}">
                </div>

                <div class="input-group">
                    <label for="image_file">Profile Image: </label>
                    <input type="file" name="image_file" id="image_file" value="{{old('image_file')}}">
                </div>

                <div class="button-group">
                    <input type="submit" name="submit" value="Edit">
                    <input type="reset" name="reset" value="Reset">
                </div>
            </form>
        </div>
        <div class="message">
            {{ session('msg') }}
        </div>
        <div class="errors">
            @foreach($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    </div>
@endsection
