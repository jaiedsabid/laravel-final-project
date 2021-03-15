@extends('layouts.app')

@section('nav-bar')
    <ul>
        <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.profile') }}">Profile</a></li>
        <li><a href="#">Add User</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
@endsection
