@extends('layouts.admin.common')

@section('title')
    Edit Subscription Details
@endsection

@section('css')
    <style>
        .container,
        .edit-details,
        .message,
        .errors {
            margin: 32px 0;
        }
        form div {
            margin: 10px 0px;
        }
        .button-group {
            margin-top: 14px;
        }
        .input-group input:nth-child(2) {
            position: absolute;
            left: 150px;
        }
        button a {
            text-decoration: none;
            color: black;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>Create new subscription package</h1>
        </div>
        <div class="edit-details">
            <form action="" method="post">
                @csrf
                <div class="input-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}">
                </div>
                <div class="input-group">
                    <label for="info">Info:</label>
                    <input type="text" name="info" id="info" value="{{ old('info') }}">
                </div>
                <div class="input-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price" id="price" value="{{ old('price') }}">
                </div>
                <div class="input-group">
                    <label for="duration">Duration:</label>
                    <input type="text" name="duration" id="duration" value="{{ old('duration') }}">
                </div>
                <div class="input-group">
                    <label for="project_limit">Project Limit:</label>
                    <input type="text" name="project_limit" id="project_limit" value="{{ old('project_limit') }}">
                </div>
                <div class="button-group">
                    <input type="submit" name="submit" value="Create">
                    <button>
                        <a href="{{ route('admin.subs_list') }}">Cancel</a>
                    </button>
                </div>
            </form>
        </div>
        <div class="message">
            {{ session('msg') }}
        </div>
        <div class="errors">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    </div>
@endsection
