@extends('layouts.app')

@section('nav-bar')
    <h1>User Dashboard</h1>

    <a href="{{ route('user.home') }}">Dashoard</a> | <a href="">Edit Profile</a> | <a href="">Update Subscription</a> | <a href="">New campaign</a>
    | <a href="">Update campaign</a> | <a href="">Log Out</a>

    <br>
    <br>
    <br>
@endsection
