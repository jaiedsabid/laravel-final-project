@extends('layouts.userlay')

@section('content')
    Name : {{$data['name']}}<br><br>
    Email : {{$data['email']}}<br><br>
    Address : {{$data['address']}}<br><br>
    Subscription : @if ($data['subscription_id'] == null)
      <span style="color: red"> Not Subscriberd Yet</span>
    @else

    @endif
    <br><br>
    Profile Picture : <img src="{{asset('uploads/allUsers/'.$data['image'])}}" alt="" height="100px" width="100px"><br><br>

@endsection
