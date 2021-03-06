@extends('layouts.app')

@section('nav-bar')
    <ul>
        <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.profile') }}">Profile</a></li>
        <li>
            <a href="{{ route('admin.users') }}">Users</a>
            <ul>
                <li><a href="{{ route('admin.user_list') }}">User List</a></li>
                <li><a href="{{ route('admin.admin_list') }}">Admin List</a></li>
                <li><a href="{{ route('admin.create_users') }}">Create Account</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.subscription') }}">Subscription</a>
            <ul>
                <li><a href="{{ route('admin.subs_list') }}">Subscription Packages</a></li>
                <li><a href="{{ route('admin.subs_create') }}">Create New Package</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.project') }}">Project</a>
            <ul>
                <li><a href="{{ route('admin.project_list') }}">Project List</a></li>
            </ul>
        </li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
@endsection
