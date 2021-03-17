@extends('layouts.app')

@section('nav-bar')
    <ul>
        <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.profile') }}">Profile</a></li>
        <li>
            Users
            <ul>
                <li><a href="{{ route('admin.user_list') }}">User List</a></li>
                <li><a href="{{ route('admin.admin_list') }}">Admin List</a></li>
            </ul>
        </li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
@endsection
