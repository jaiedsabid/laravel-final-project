@extends('layouts.admin.common')

@section('title')
    User Details
@endsection

@section('css')
    <style>
        img {
            margin: 25px 0px;
            width: 220px;
            height: 220px;
        }
        .no-image {
            margin: 25px 0px;
            width: 220px;
            height: 220px;
            font-weight: bold;
            font-size: 1.2rem;
            text-align: center;
            color: red;
            background-color: #fcd100;
        }
        td {
            padding: 5px 0px;
        }
        td:nth-child(1) {
            font-weight: bold;
        }
        td:nth-child(2) {
            padding-left: 10px;
        }
        button {
            margin-top: 10px;
        }
        button > a {
            text-decoration: none;
            color: black;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>User Details</h1>
        </div>
        <div class="profile-info">
            <div class="profile-img">
                @if(isset($user->image))
                    <img src="{{ asset('uploads/images/'.$user->image) }}" alt="Profile Image">
                @else
                    <div class="no-image">
                        Profile image not set
                    </div>
                @endif
            </div>
            <table>
                <thead></thead>
                <tbody>
                <tr>
                    <td>Name: </td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>{{ $user->password }}</td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    <td>User Type:</td>
                    <td>{{ $user->user_type }}</td>
                </tr>
                @if( Route::CurrentRouteName() != 'admin.view_admin')
                    <tr>
                        <td>Subscription:</td>
                        <td>{{ ($user->subscription != null ? 'Active' : 'N/A') }}</td>
                    </tr>
                @endif
                <tr>
                    <td>Account Created: </td>
                    <td>{{ $user->created_at }}</td>
                </tr>
                @if( Route::CurrentRouteName() != 'admin.view_admin')
                <tr>
                    <td>
                        <button>
                            <a href="{{ route('admin.edit_user', $user->id) }}">Edit Info</a>
                        </button>
                    </td>
                    <td>
                        <button>
                            <a href="{{ route('admin.delete_user', $user->id) }}">Remove User</a>
                        </button>
                    </td>
                </tr>
                @else
                <tr>
                    <td>
                        <button>
                            <a href="{{ route('admin.edit_admin', $user->id) }}">Edit Info</a>
                        </button>
                    </td>
                    <td>
                        <button>
                            <a href="{{ route('admin.delete_admin', $user->id) }}">Remove</a>
                        </button>
                    </td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
