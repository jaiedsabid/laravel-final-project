@extends('layouts.app')

@section('nav-bar')
<center>
<h1>
    @if (session()->get('user_type'))
    <a href=" {{route('user.home')}} ">Dashboard</a> | <a href=" {{route('logout')}} " >Logout</a>
    @else
    <a href=" {{route('login')}} ">Log in</a> | <a href=" {{route('register')}} " >Register</a>
    @endif
</h1>
</center>
@endsection

@section('content')

    @foreach ($projs as $proj)
        <h1> <span style="color: tomato">{{$proj['title']}}</span>  Posted By <small style="color: blue">
            {{$proj->user->name}} </small>   {{$proj->created_at->diffForHumans()}}
        </h1>
        <h2><span style="color:blue">Description:</span>  {{$proj['description']}}</h2>
        <h3 style="color:blue">Reqired Money : <small style="color: red">{{$proj['req_money']}} $</small></h3>



        @if (session()->get('user_type'))
            @if (!$proj->likedBy(session()->get('id')))
                <form action="{{route('like.store',$proj)}}" method="POST">
                    @csrf
                    <button type="submit">Like</button>
                </form>

            @else

                <form action="{{route('like.destroy',$proj)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Unlike</button>
                </form>
            @endif


        @endif
        <span>{{$proj->likes->count()}} {{Str::plural('like', $proj->likes->count())}} </span>

    @endforeach

    <center>
        {{$projs->links()}}
    </center>
@endsection
