@extends('layouts.admin.common')

@section('title')
    Profile
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
            <h1>Profile</h1>
        </div>
        <div class="profile-info">
            <div class="profile-img">
                @if(isset($user->image))
                    <img src="{{ asset('asset/image/'.$user->image) }}" alt="Profile Image">
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
                        <td>Address: </td>
                        <td>{{ $user->address }}</td>
                    </tr>
                    <tr>
                        <td>User Type:</td>
                        <td>{{ $user->user_type }}</td>
                    </tr>
                    <tr>
                        <td>Account Created: </td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    <tr>
                        <td>
                            <button>
                                <a href="{{ route('admin.edit_profile') }}">Edit Info</a>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
