@extends('layouts.app')

@section('nav-bar')
    <a href=" {{route('login')}} ">Log in</a> | <a href=" {{route('register')}} " >Register</a>
@endsection

@section('content')

    @foreach ($projs as $proj)
        <h1>{{$proj['title']}} Poster by <small>{{$proj->user->name}}</small></h1>
        <h2><span style="color:blue">Description:</span>  {{$proj['description']}}</h2>
        <h3 style="color:blue">Reqired Money <small style="color: red">{{$proj['req_money']}} $</small></h3>
    @endforeach
@endsection
