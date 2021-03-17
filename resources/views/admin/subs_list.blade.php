@extends('layouts.admin.common')

@section('title')
    Subscription Packages
@endsection

@section('css')
    <style>
        tr, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 3px 8px;
        }
        td a {
            text-decoration: none;
            font-weight: bold;
        }
        .next-prev {
            margin: 10px 0px 10px 25%;
        }
        .messages {
            margin-top: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>Subscription Package List</h1>
        </div>
        <div class="package-list">
            @if(count($subs) > 0)
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Package Name</th>
                    <th>Info</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Project Limit</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subs as $sub)
                <tr>
                    <td>{{ $sub->id }}</td>
                    <td>{{ $sub->name }}</td>
                    <td>{{ $sub->info }}</td>
                    <td>{{ $sub->price }}</td>
                    <td>{{ $sub->duration }}</td>
                    <td>{{ $sub->project_limit }}</td>
                    <td>{{ $sub->created_at }}</td>
                    <td>{{ $sub->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.subs_view', $sub->id) }}">View</a> |
                        <a href="{{ route('admin.subs_edit', $sub->id) }}">Edit</a> |
                        <a href="{{ route('admin.subs_delete', $sub->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
                <div class="next-prev">
                    {{ $subs->links() }}
                </div>
            @else
            <h4>No subscription package created yet</h4>
            @endif
        </div>
        <div class="messages">
            {{ session('msg') }}
        </div>
    </div>
@endsection
