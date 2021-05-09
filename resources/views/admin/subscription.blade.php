@extends('layouts.admin.common')

@section('title')
    Subscription
@endsection

@section('css')
    <style>
        .container {
            display: flex;
            flex-flow: column nowrap;
        }
        .subscription {
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-evenly;
        }
        .center {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>Subscription</h1>
        </div>
        <div class="subscription">
            <div class="total-packages center">
                <h3>Total Active Packages</h3>
                <p>{{ $total_packages }}</p>
            </div>
            <div class="total-activated center">
                <h3>Total Subscribed Users</h3>
                <p>{{ $total_active_users }}</p>
            </div>
            <div class="total-inactive center">
                <h3>Total Free Package Users</h3>
                <p>{{ $total_inactive_users }}</p>
            </div>
        </div>
    </div>
@endsection
