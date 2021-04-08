@extends('layouts.admin.common')

@section('title')
@endsection

@section('css')
<style>
    .container {
        margin: 3rem;
        width: 1024px;
        display: flex;
        flex-flow: column nowrap;
    }
    .row {
        display: flex;
        flex-flow: row nowrap;
        justify-content: space-evenly;
    }
    .col {
        flex: 1 0 200px;
    }
    div > a {
        text-decoration: none;
        color: #1a202c;
    }

</style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>Projects</h1>
        </div>
        <div class="row">
            <div id="total-proj" class="col">
                <a href="{{ route('admin.project_list') }}">
                    <h3>Total Projects: {{ $status['total'] }}</h3>
                </a>
            </div>
            <div id="pending-proj" class="col">
                <a href="{{ route('admin.project_pending') }}">
                    <h3>Total Pending Projects: {{ $status['pending'] }}</h3>
                </a>
            </div>
            <div id="active-proj" class="col">
                <a href="{{ route('admin.project_active') }}">
                    <h3>Total Active Projects: {{ $status['active'] }}</h3>
                </a>
            </div>
            <div id="close-proj" class="col">
                <a href="{{ route('admin.project_closed') }}">
                    <h3>Total Closed Projects: {{ $status['closed'] }}</h3>
                </a>
            </div>
        </div>
    </div>
@endsection
