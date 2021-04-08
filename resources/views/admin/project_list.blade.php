@extends('layouts.admin.common')

@section('title')
    Project List
@endsection

@section('css')
    <style>
        .container,
        .page-title,
        .list,
        .message {
            position: relative;
            margin: 15px 0;
        }
        th, tr, td {
            border: 1px solid black;
        }
        td {
            padding: 5px;
        }
        td > a {
            text-decoration: none;
            font-weight: bold;
        }
        .paginate {
            margin: 2rem 20%;

        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>{{ $title }}</h1>
        </div>
        <div class="list">
            @if(count($projs) <= 0)
                <h3>No Projects created yet!</h3>
            @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Posted By</th>
                        <th>User Email</th>
                        <th>Money Required</th>
                        <th>Status</th>
                        <th>Posted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($projs as $proj)
                <tr>
                    <td>{{ $proj->id }}</td>
                    <td>{{ $proj->title }}</td>
                    <td>{{ $proj->user->name }}</td>
                    <td>{{ $proj->user->email }}</td>
                    <td>{{ $proj->req_money }}</td>
                    <td>{{ $proj->status }}</td>
                    <td>{{ $proj->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.project_details', $proj->id) }}">Details</a> |
                        @if($proj->status == 'pending')
                        <a href="{{ route('admin.project_approve', $proj->id) }}">Approve</a> |
                        @endif
                        <a href="{{ route('admin.project_delete', $proj->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="paginate">
                {{ $projs->links() }}
            </div>
            @endif
        </div>
        <div class="message">
            {{ session('msg') }}
        </div>
    </div>
@endsection
