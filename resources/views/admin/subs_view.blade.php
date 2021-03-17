@extends('layouts.admin.common')

@section('title')
    Package Details
@endsection

@section('css')
    <style>
        button a {
            text-decoration: none;
            color: black;
        }
        tr td {
            padding-top: 5px;
        }
        tr td:nth-child(2) {
            padding-left: 10px;
        }
        tr td:nth-child(1) {
            font-weight: bold;
        }
        #buttons {
            padding-top: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h1>Package Details</h1>
        </div>
        <div class="details">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>{{ $sub->id }}</td>
                </tr>
                <tr>
                    <td>Package Name:</td>
                    <td>{{ $sub->name }}</td>
                </tr>
                <tr>
                    <td>Info:</td>
                    <td>{{ $sub->info }}</td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>{{ $sub->price }}</td>
                </tr>
                <tr>
                    <td>Duration:</td>
                    <td>{{ $sub->duration }}</td>
                </tr>
                <tr>
                    <td>Project Limit:</td>
                    <td>{{ $sub->project_limit }}</td>
                </tr>
                <tr>
                    <td>Created At:</td>
                    <td>{{ $sub->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At:</td>
                    <td>{{ ($sub->updated_at == null ? 'N/A' : $sub->updated_at) }}</td>
                </tr>
                <tr>
                    <td id="buttons">
                        <button><a href="{{ route('admin.subs_edit', $sub->id) }}">Edit</a></button>
                        <button><a href="{{ route('admin.subs_delete', $sub->id) }}">Remove</a></button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
