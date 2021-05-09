@extends('layouts.userlay')

@section('content')
    <center><h1>Update Project</h1></center>
    <center><h1>Select Project</h1></center>

    <h1 style="color: blue">{{$user->name}}</h1>
    <hr>

    @foreach ($user->hasproj as $proj)
        <h1>{{$proj['title']}} Poster by <small>{{$proj->user->name}}</small></h1>
        <h2><span style="color:blue">Description:</span>  {{$proj['description']}}</h2>
        <h3 style="color:blue">Reqired Money <small style="color: red">{{$proj['req_money']}} $</small></h3>
        <?php
            $id= Crypt::encrypt($proj['id']);
        ?>
        <a href="{{route('proj.updateProjForm',[$id])}}"><button>Edit</button></a>
        <a href="{{route('proj.deleteProjForm',[$id])}}"><button>Delete</button></a>
    @endforeach

@endsection
