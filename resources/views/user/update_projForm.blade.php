@extends('layouts.userlay')

@section('content')
    <center><h1>Publish New Project</h1></center>
    <center>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title:
                <input type="title" name="title" value="{{ $proj['title'] }}">
            </label> <br><br>

            <label for="description">Description:
                <input type="description" name="description" value="{{ $proj['description'] }}">
            </label> <br><br>

            <label for="image">Image:
                <input type="file" name="image" value="{{ @old('image') }}">
            </label> <br><br>

            <label for="req_money">Required Money:
                <input type="req_money" name="req_money" value="{{ $proj['req_money'] }}">
            </label> <br><br>

            <input type="submit" value="Update"> | <a href="{{ route('user.home') }}">Back</a>
            <br><br>
        </form>


        <div style="color: red">
            @foreach($errors->all() as $err)
            {{$err}} <br>
        @endforeach
        </div>
    </center>
@endsection
