@extends('layouts.admin.common')

@section('title')
    @if(Route::currentRouteName() == 'admin.admin_list')
        Admin List
    @else
        User List
    @endif
@endsection


@section('css')
    <style>
        th, tr, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
        }
        table {
            margin: 32px 0px;
        }
        td > a {
            text-decoration: none;
            color: #010a60;
            text-align: center;
            font-weight: 600;
        }
        .message {
            margin: 32px 0px;
        }
        .search-bar div {
            display: inline-block;
        }
        .next-prev {
            margin-left: 25%;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>
                @if(Route::currentRouteName() == 'admin.admin_list')
                    Admin List
                @else
                    User List
                @endif
            </h1>
        </div>
        <div class="search-user">
            <div class="search-bar">
                <form action="" method="post">
                    @csrf
                    <div class="group-input">
                        <input type="text" name="search" placeholder="example@example.com">
                    </div>
                    <div class="buttons">
                        <input type="submit" name="submit" value="Search">
                    </div>
                </form>
            </div>
        </div>
        <div class="user-list">
            @if(count($users) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        @if(Route::currentRouteName() != 'admin.admin_list')
                        <th>Subscription</th>
                        @endif
                        <th>User Type</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        @if($user->id != session('id'))
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            @if(Route::currentRouteName() != 'admin.admin_list')
                            <td>{{ ($user->subscription_id != null ? 'Active' : 'N/A') }}</td>
                            @endif
                            <td>{{ $user->user_type }}</td>
                            <td>{{ $user->created_at }}</td>
                            @if(Route::currentRouteName() != 'admin.admin_list')
                            <td>
                                <a href="{{ route('admin.view_user', $user->id) }}">View</a> |
                                <a href="{{ route('admin.edit_user', $user->id) }}">Edit</a> |
                                <a href="{{ route('admin.delete_user', $user->id) }}">Delete</a>
                            </td>
                            @else
                                <td>
                                    <a href="{{ route('admin.view_admin', $user->id) }}">View</a> |
                                    <a href="{{ route('admin.edit_admin', $user->id) }}">Edit</a> |
                                    <a href="{{ route('admin.delete_admin', $user->id) }}">Delete</a>
                                </td>
                            @endif
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <div class="next-prev">
                {{ $users }}
            </div>
            @else
            <h3>No Users found</h3>
            @endif
        </div>
        <div class="message">
            {{ session('msg') }}
        </div>
    </div>
@endsection


