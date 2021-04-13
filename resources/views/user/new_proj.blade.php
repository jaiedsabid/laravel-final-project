@extends('layouts.userlay')

@section('content')

    @if ($user->subscription_id != null )
        @if (count($user->hasproj)<$user->hassub->project_limit)
            <center><h1>Publish New Project</h1></center>
            <center>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Title:
                        <input type="title" name="title" value="{{ @old('title') }}">
                    </label> <br><br>

                    <label for="description">Description:
                        <input type="description" name="description" value="{{ @old('description') }}">
                    </label> <br><br>

                    <label for="image">Image:
                        <input type="file" name="image" value="{{ @old('image') }}">
                    </label> <br><br>

                    <label for="req_money">Required Money:
                        <input type="req_money" name="req_money" value="{{ @old('req_money') }}">
                    </label> <br><br>

                    <input type="submit" value="Publish"> | <a href="{{ route('home') }}">Back</a>
                    <br><br>
                </form>
                <div style="color: red">
                    @foreach($errors->all() as $err)
                    {{$err}} <br>
                @endforeach
                </div>
            </center>
            @else
            <center>
                <h1 style="color: red">Please Upgrade Your Subcription</h1>
            </center>

            @endif

    @else
        <center>
            <h1 style="color: red">Please Upgrade Your Subcription</h1>
        </center>

    @endif

@endsection
