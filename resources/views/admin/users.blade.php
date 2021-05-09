@extends('layouts.admin.common')

@section('title')
    Users
@endsection

@section('css')
    <style>
        .container {
            display: flex;
            flex-flow: column nowrap;
        }
        .users {
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-evenly;
        }
        .center {
            text-align: center;
        }
        .users > a {
            text-decoration: none;
            color: black;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>Users</h1>
        </div>
        <div class="users">
            <a href="{{ route('admin.admin_list') }}">
                <div class="total-packages center">
                    <h3>Total Admins</h3>
                    <p>{{ $total_admins }}</p>
                </div>
            </a>
            <a href="{{ route('admin.user_list') }}">
                <div class="total-activated center">
                    <h3>Total Users</h3>
                    <p>{{ $total_users }}</p>
                </div>
            </a>
        </div>
    </div>
@endsection
