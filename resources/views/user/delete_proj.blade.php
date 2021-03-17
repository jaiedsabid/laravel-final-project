@extends('layouts.userlay')

@section('content')
    <center><h1>Delete Project</h1></center>



    <hr>

    Project title: {{$proj['title']}}
    <br><br>
    Project Description: {{$proj['description']}}
    <br><br>
    Project Image : <img src="{{asset('uploads/project_images/'.$proj['image'])}}" alt="" srcset="" width="200px" height="200px">
    <br><br>
    Required Money: {{$proj['req_money']}} $
    <br><br>
    <form action="" method="POST">
        @csrf
        <input type="submit" value="Delete">
    </form>
    <br><br><br>
@endsection
