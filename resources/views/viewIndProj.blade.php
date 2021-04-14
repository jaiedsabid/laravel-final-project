@extends('layouts.app')

@section('content')
    <div>
        Project Creator:
        <span style="color: red">{{$proj->findUser->name}}</span>

    </div>
    <br>

    <div>
        Title:
        <span style="color: red">{{$proj->title}}</span>
    </div>
    <br>

    <div>
        Description:
        <span style="color: red">{{$proj->description}}</span>
    </div>
    <br>
    <div>
        Image:
        <span style="color: red"><img src="{{asset('uploads/project_images/'.$proj['image'])}}" alt="" height="200px" width="200px"></span>
    </div>
    <br>

    <div>
        Required Money:
        <span style="color: red"> {{$proj->req_money}} $</span>
    </div>
    <br>

    <div>
        {{-- @php
        $totalCash = 0;
            foreach ($proj->findCash as $cash) {
                $totalCash = $totalCash + $cash;
            }
        @endphp --}}
        Earned Money:
        <span style="color: red">
        {{$proj->findCash->sum('amount')}}
        </span>

    </div>
    <br>
    @php
        $id= Crypt::encrypt($proj['id']);
    @endphp
    @if (session()->get('user_type'))
        <center>
            <a href="{{route('projStripe.payment',[$id])}}"><h1 style="color: blue">Fund This Project</h1></a>
        </center>
    @endif

    <br>
    <br>
    <br>
    <center>
        <a href="{{route('home')}}"><h1>Home</h1></a>
    </center>
@endsection
