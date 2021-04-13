@extends('layouts.userlay')

@section('title')
    Subscription
@endsection



@section('content')
@if ($data->subscription_id!=null)
    <center>
      <h1 style="color: red">Please Wait Until your subscription is over.</h1>
    </center>
@else
    @foreach ($subs as $sub)
    <div>

        <span style="color: red">{{$sub->name}}</span> Subscription
        <p>Info: <span style="color: red">{{$sub->info}}</span></p>
        <p>Duration: <span style="color: red">{{$sub->duration}}</span></p>
        <p>Price: <span style="color: red">{{$sub->price}}</span></p>
        <p>Project Limit: <span style="color: red">{{$sub->project_limit}}</span></p>
            <?php
                $id= Crypt::encrypt($sub['id']);
            ?>
        <a href={{route('stripe-payment',[$id])}}><button>Buy</button></a>
        <br>
        <hr>
    </div>
    @endforeach
@endif






    <div style="color: red">
        @foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
    </div>
@endsection



