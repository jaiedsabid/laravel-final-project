@extends('layouts.admin.common')

@section('title')
    Project Details
@endsection

@section('css')
    <style>
        .no-image {
            margin: 20px 0px;
            width: 212px;
            height: 212px;
            background-color: #ff4a3b;
            color: #ffffff;
            text-align: center;
            font-weight: bold;
            font-size: 1.3rem;
        }
        button a {
            text-decoration: none;
            color: black;
        }
        #buttons td {
            padding: 15px 0px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>Project Details</h1>
        </div>
        <div class="details">
            <div id="image">
                @if(isset($proj->image))
                <img src="{{ asset('uploads/project_images/'.$proj->image) }}" alt="Project Image">
                @else
                <div class="no-image">No Image Found!</div>
                @endif
            </div>
            <table>
                <tr>
                    <td>ID:</td>
                    <td>{{ $proj->id }}</td>
                </tr>
                <tr>
                    <td>Title:</td>
                    <td>{{ $proj->title }}</td>
                </tr>
                <tr>
                    <td>Posted By:</td>
                    <td>{{ $proj->user_id }}</td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>{{ $proj->description }}</td>
                </tr>
                <tr>
                    <td>Money Required:</td>
                    <td>{{ $proj->req_money }}</td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td>{{ $proj->status }}</td>
                </tr>
                <tr>
                    <td>Created At:</td>
                    <td>{{ $proj->created_at }}</td>
                </tr>
                <tr id="buttons">
                    <td></td>
                    <td>
                        @if($proj->status == 'pending')
                        <button>
                            <a href="{{ route('admin.project_approve', $proj->id) }}">Approve</a>
                        </button>
                        @endif
                        <button>
                            <a href="{{ route('admin.project_delete', $proj->id) }}">Delete</a>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="message">
            {{ session('msg') }}
        </div>
    </div>
@endsection
